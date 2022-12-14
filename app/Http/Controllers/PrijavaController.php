<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participant;
use App\Faculty;
use App\Point;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Notifications\PrijavaUspjesna;
use Carbon\Carbon;

class PrijavaController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('create', 'store');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        // ovo radi za 1 ssa godisnje
        // $participants = Participant::whereYear('created_at', date('Y'));

        // Dodano za SSA LITE - Summer 2020
        $participants = null;
        if (!empty($keyword)) {
            $participants = Participant::whereBetween('created_at', array('2021-01-01', '2021-12-31'))
                    ->where('ime', 'LIKE', "%$keyword%")
                    ->orWhere('prezime', 'LIKE', "%$keyword%")
                    ->orWhere('email', 'LIKE', "%$keyword%")
                    ->groupby('motivaciono')
                    ->orderBy('id')
                    ->paginate($perPage);
        } 
        else
        {
            $participants = Participant::whereBetween('created_at', array('2021-01-01', '2021-12-31'))
                            ->where('ime', 'not like', '%test%')
                            ->groupby('motivaciono')
                            ->orderby('id')
                            ->paginate($perPage);
        
        }

        foreach ($participants as $key => $participant) {
            $glasano = Point::where('participant_id', $participant->id)
                    ->where('user_id', Auth::user()->id)->count() ? true : false;
            if ($request->has('hide_scored') && $glasano) {
                $participants->forget($key);
            } else {
                $participant->glasano = $glasano;
            }
        }

        return view('prijava.index', compact('participants', 'perPage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if (! config('ssa.prijave_otvorene')) {
            return redirect('/')->with('closed', 'Prijave su zatvorene');
        }

        $fakulteti = Faculty::all();
        return view('prijava.create', compact('fakulteti'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        if (! config('ssa.prijave_otvorene')) {
            abort(403, 'Prijave su zatvorene');
        }

        $request->validate([
            'ime' => 'required',
            'prezime' => 'required',
            'datum' => 'required|date|before:today',
            'email' => 'required|email',
            'pismo' => 'required|filled'
        ]);
        
        $data = $request->all();

        $participant = Participant::create([
            'ime' => $request->ime,
            'prezime' => $request->prezime,
            'datum_rodjenja' => $request->datum,
            'broj_telefona' => $request->telefon,
            'email' => $request->email,
            'velicina_majice' => $request->majica,
            'engleski_govor' => $request->govor,
            'engleski_razumijevanje' => $request->raz,
            'motivaciono' => $request->pismo,
            'ranije_ucesce_na_ssa' => $request->ranije === 'DA',
            'kako_ste_saznali' => $request->kakostesaznali,
            'radno_iskustvo' => $request->radno,
            'trenutno_zaposlenje' => $request->trenutno === 'DA',
            'ucesce_na_treninzima' => $request->softUcesce,
            'ucesce_na_seminarima' => $request->seminari,
            'nvo_iskustvo' => $request->nvo,
            'dodatne_napomene' => $request->dodatne,
            ###### naknadno odraditi za user_id #######
        
        ]);

        foreach ($request->fakulteti as $fakultet) {
            DB::table('fakultet_participant')->insert([
                'participant_id' => $participant->id,
                'fakultet_id' => Faculty::where('naziv', 'LIKE', $fakultet['naziv'])->first()->id,
                'godina' => $fakultet['godina'],
                'odsjek' => $fakultet['odsjek'],
            ]);
        }

        // $participant->notify(new PrijavaUspjesna());

        return redirect()->route('home')->with('alert', 'Prijava je uspje??no pohranjena.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Request $request, Participant $participant)
    {
        // ako nije jos dozvoljeno bodovanje samo odkomentarisati ovo ispod
        // if (\Auth::user()->cant('zatvori prijave')) {
        //     return back()->with('flash_message', 'Jo?? malo ...');    
        // }
        

        $participant->datum_rodjenja = Carbon::createFromFormat('Y-m-d', $participant->datum_rodjenja)
            ->toFormattedDateString();

        $postojiPrijava = $this->hasAppliedBefore($participant->email);

        // sluzi samo za uslova ispod, da se ne bi bodovanje registrovalo opet slucajno

        $glasanoBefore = Point::where('participant_id', $participant->id)->where('user_id', \Auth::user()->id)->first();

        if ($postojiPrijava !== null && $postojiPrijava->accepted == '1' && $glasanoBefore === null) {
            $this->boduj($request, $participant, true);
        }

        // sluzi za view
        $glasano = Point::where('participant_id', $participant->id)->where('user_id', \Auth::user()->id)->first();

        return view('prijava.show', compact('participant', 'glasano', 'postojiPrijava'));
    }

    public function boduj(Request $request, Participant $participant, $automaticDiscard = false)
    {
        $glasano = Point::where('participant_id', $participant->id)->where('user_id', \Auth::user()->id)->first();

        if ($glasano !== null && ! $automaticDiscard) {
            return back()->with('flash_message', 'Vec si bodovao/la');
        }



        $requestData = $request->all();

        $requestData['participant_id'] = $participant->id;
        $requestData['user_id'] = \Auth::user()->id;

        $old = $this->hasAppliedBefore($participant->email);

        $hasAppliedBefore = $old !== null;

        if ($hasAppliedBefore && $old->accepted == '1') {
            
            unset($requestData['trenutno_zaposlenje'], $requestData['engleski'],
                    $requestData['motivaciono'], $requestData['ucesce_na_seminarima'],
                    $requestData['ucesce_na_treninzima'], $requestData['nvo_iskustvo']);

            // dakle, ako je vec prisustvovao/la na SSA odma je diskvalifikovan/na
            $participant->accepted = 0;
        } else {
            $requestData['bodovi'] = $requestData['engleski'] + $requestData['motivaciono']
                + $requestData['trenutno_zaposlenje'] + $requestData['ucesce_na_treninzima']
                + $requestData['ucesce_na_seminarima'] + $requestData['nvo_iskustvo'];

            if ($request->has('asterix')) {
                $requestData['asterix'] = '1';
            }
        }

        // ako se vec prijavljivao a odbijen/a
        if ($hasAppliedBefore && $old->accepted != '1') {
            $requestData['bodovi']++;
        }

        Point::create($requestData);

        $pointsPerUser = Point::where('participant_id', $participant->id)->get();

        $sumOfPoints = 0;

        $pointsCount = $pointsPerUser->count();

        foreach ($pointsPerUser as $p) {
            $sumOfPoints += $p->bodovi;
        }

        $participant->ukupno_bodova = $sumOfPoints / $pointsCount;
        $participant->glasali_count = $pointsCount;

        if ($request->has('asterix') && ! $participant->asterix) {
            $participant->asterix = '1';
        }
        $participant->save();

        // dd($requestData, $pointsPerUser, $sumOfPoints, $pointsCount);
        if ($automaticDiscard) {
            redirect()->route('prijava.index');
        }
        else {
            return redirect()->route('prijava.index')->with('flash_message', 'Bodovi uspjesno spaseni');
        }
    }

    public function bodovi(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        $participants = Participant::whereBetween('created_at', array('2021-01-01', '2021-12-31'))
                ->orderBy('ukupno_bodova', 'DESC');

        if ($request->has('show_with_asterix')) {
            $participants = $participants->where('asterix', '1');
        }

        if (!empty($keyword)) {
            $participants = $participants
                    ->where('ime', 'LIKE', "%$keyword%")
                    ->orWhere('prezime', 'LIKE', "%$keyword%"); 
        }

        $participants = $participants->paginate($perPage);

        $points = Point::select('participant_id', 'user_id')->get();

        // dd($points->where('participant_id', '4'));

        foreach ($participants as $participant) {
            $participantPoints = $points->where('participant_id', $participant->id);
            foreach ($participantPoints as $p) {
                $participant->glasali .= explode(' ', $p->user->name)[0] . ', ';
            }

            $participant->glasali = substr($participant->glasali, 0, -2);
        }

        return view('prijava.rank-list', compact('participants', 'perPage'));
    }

    protected function hasAppliedBefore($email)
    {
        return \DB::table('old_applications')->where('email', '=', $email)->get()->last();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
//        $ = ::findOrFail($id);

        return view('.edit', compact(''));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
//        $ = ::findOrFail($id);
//        $->update($requestData);

        return redirect('')->with('flash_message', ' updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
//        ::destroy($id);

        return redirect('')->with('flash_message', ' deleted!');
    }

    public function zatvoriPrijave()
    {
        if (! Auth::user()->hasDirectPermission('zatvori prijave') && ! Auth::user()->hasRole('root')) {
            return back()->with('permission_missing', 'Treba ti jos pure');
        }

        // prvo smjestimo sve prijave u old_applications tabelu

        $svePrijave = Participant::select(\DB::raw('CONCAT(ime, \' \', prezime) AS name'), 'email', 'created_at', 'accepted')
            ->get()->toArray();

        \DB::table('old_applications')->insert($svePrijave);

        $data = file(config_path('ssa.php'));

        foreach ($data as &$item) {
            if (($pos = stripos($item, '\'prijave_otvorene\' => ')) !== FALSE) {
                $item = str_replace('true', 'false', $item);
            }
        }
        file_put_contents(config_path('ssa.php'), $data);
        return back();
    }

    public function otvoriPrijave()
    {
        if (! Auth::user()->hasDirectPermission('otvori prijave') && ! Auth::user()->hasRole('root')) {
            return back()->with('permission_missing', 'Treba ti jos pure');
        }

        $data = file(config_path('ssa.php'));

        foreach ($data as &$item) {
            if (($pos = stripos($item, '\'prijave_otvorene\' => ')) !== FALSE) {
                $item = str_replace('false', 'true', $item);
            }
        }
        file_put_contents(config_path('ssa.php'), $data);
        return back();
    }

    public function mailParticipantima()
    {
        if (\Auth::user()->cant('zatvori prijave')) {
            return back()->with('flash_message', 'Samo par ljudi mo??e koristiti ovu funkcionalnost');    
        }

        return view('prijava.mail');
    }

    public function sendMail(Request $request)
    {
        if (\Auth::user()->cant('zatvori prijave')) {
            return back()->with('flash_message', 'Samo par osoba mo??e koristiti ovu funkcionalnost');    
        }

        
    }
}
