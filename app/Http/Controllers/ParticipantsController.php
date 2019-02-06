<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Participant;
use App\User;
use App\Faculty;
use App\Experience;
use App\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Utility\StringUtility;

class ParticipantsController extends Controller
{
    use AuthenticatesUsers;
    
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/participant/profil';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        

        if (!empty($keyword)) {
            $participants = Participant::whereYear('created_at', date('Y'))->paginate($perPage);
        } else {
            $participants = Participant::whereYear('created_at', date('Y'))->paginate($perPage);
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
        return view('participants.create');
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
        
        $requestData = $request->all();
        
        Participant::create($requestData);

        return redirect('admin/participants')->with('flash_message', 'Participant added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $participant = Participant::findOrFail($id);

        return view('participants.show', compact('participant'));
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
        Participant::destroy($id);

        return redirect('admin/participants')->with('flash_message', 'Participant deleted!');
    }

    ######## PLATFORMA ########
    ######## PLATFORMA ########
    ######## PLATFORMA ########
    ######## PLATFORMA ########
    ######## PLATFORMA ########
    ######## PLATFORMA ########
    ######## PLATFORMA ########
    ######## PLATFORMA ########
    ######## PLATFORMA ########
    ######## PLATFORMA ########
    ######## PLATFORMA ########

    public function showLoginFormParticipant()
    {
        return view('participants.platform.login');
    }

    public function loginParticipant(Request $request)
    {
        // get user by email
        $user = User::where('email', $request->email)->first();
        if($user === null || $user->participant === null) {
            $request->session()->flash('flash_message', 'Moraš se registrovati kao participant da bi koristio platformu.');
            return redirect()->route('participant.register.show');
        }
        return $this->login($request);
        // dd($request->all());

    }

    public function showRegistrationFormParticipant()
    {
        session()->forget('emailRemembered');
        return view('participants.platform.register');
    }

    public function registerParticipant(Request $request)
    {
        // provjera
        $participant = $this->validateEmail($request->email);
        if ($participant === null) {
            $request->session()->flash('flash_message', 'Ne postoji participant sa ovom email adresom.');
            return back();
        }
        if (! $participant->accepted) {
            $request->session()->flash('flash_message', 'Pravo na pristup ostvaruju samo učesnici radionice.');
            return back();
        }

        // provjera u kojoj se tabeli nalazi prijava
        // ukoliko je u  'old_applications' trebamo napraviti Participanta u tabeli 'participanti'
        // sa odgovarajucim podacima
        if (! Participant::where('email', $participant->email)->first()) {
            $old_participant = \DB::table('old_applications')
                                    ->where('email', $participant->email)->first();
            // prebacujemo u array jer metoda create zahtjeva array
            $old_participant = (array)$old_participant;
            $old_participant['ime'] = explode(' ', $old_participant['name'])[0];
            $old_participant['prezime'] = explode(' ', $old_participant['name'])[1];
            $participant = Participant::create((array)$old_participant);
        }

        $messages = [
            'required'           => 'Polje \':attribute\' je obavezno.',
            'max'                => ':attribute ne smije sadržavati više od :max znakova.',
            'email.unique'       => 'Već postoji korisnik sa ovom email adresom. ' . '<a href="' . route('participant.login.show') . '"> Login?</a>',
            'password.confirmed' => 'Unesene šifre se ne podudaraju.',
            'password.min'       => 'Šifra mora sazdržavati minimalno :min znakova.',
            'name.required'      => 'Polje \'Ime i prezime\' je obavezno.'
        ];

        $validator = Validator::make($request->all(), [
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|string|email|max:255|unique:users',
            'password'              => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ], $messages);

        // dd($validator->fails());

        if ($validator->fails()) {
            if (! session()->has('emailRemembered')) {
                session()->put('emailRemembered', $request->email);    
            }
            
            return redirect('participant/register')
                        ->withErrors($validator)
                        ->withInput();
        }
        session()->forget('emailRemembered');

        /** @var User $user */
        $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $participant->update(['user_id' => $user->id]);

        $user->assignRole('participant');

        Auth::login($user, true);

        return redirect('participant/profil');
    }

    public function emailCheck(Request $request)
    {
        $participant = $this->validateEmail($request->get('email'));
        return response()->json(['participant' => $participant]);
        if ($participant) {
            if ($participant->accepted) {
                session(['emailRemembered' => true]);
            } else {
                return response()->json(['error' => 'Pravo na pristup ostvaruju samo učesnici radionice.']);
            }
        }

        return response()->json($participant ?? ['error' => 'Email adresa ne zadovoljava kriterije']);
    }

    private function validateEmail($email) {
        $firstQuery = Participant::select('email', 'accepted', \DB::raw('CONCAT(ime, \' \', prezime) as ime'))
                ->where('email', 'LIKE', "%$email%");

        // $participant = Participant::select('email', \DB::raw('CONCAT(ime, \' \', prezime) as ime'))
        //         ->where('email', $email)->first();


        $participant = \DB::table('old_applications')->select('email', 'accepted', \DB::raw('name as ime'))
                ->where('email', 'LIKE', "%$email%")
                ->union($firstQuery)
                ->first();
                
        // TODO: Dodati provjeru da li je prihvacena aplikacija bila (accepted kolona)
        return $participant;
    }

    public function logoutParticipant() {
        \Auth::logout();
        return redirect('/');
    }

    public function profile()
    {
        $user = \Auth::user();
        $participant = $user->participant;
        $experiences = $participant->experiences;
        $faculties = Faculty::pluck('naziv', 'id');
        return view('participants.platform.profile', compact('faculties', 'experiences', 'participant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        // $arr = range(date('Y'), 1990);
        // array_walk($arr, function($key, &$value) {
        //     // var_dump($key, $value);
        //     $value = $key;
        // });

        // dd($arr);

        $user = \Auth::user();
        $participant = $user->participant;
        $experiences = $participant->experiences;
        // dd(\DateTime::createFromFormat('Y-m-d', $experiences->first()->from_month));
        $faculties = Faculty::pluck('naziv', 'id');

        //$participant->fakulteti()->detach();
        // dd($id);
        return view('participants.platform.edit', compact('faculties', 'user', 'participant', 'experiences'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        
        $requestData = $request->all();
        
        // dd($requestData);

        $participant = $user->participant;
        $experiences = $participant->experiences;

        $participant->update($request->except(['fakulteti', 'radno_iskustvo', 'internship', 'slika']));
        $participant->status = config('platforma.statusi')[$requestData['status']];
        
        // @TODO: Testirati
        //dd($requestData);
        if ($request->has('fakulteti') && ! empty($requestData['fakulteti'])) {
            $participant->fakulteti()->sync($requestData['fakulteti']);
        }

        $user->name = $participant->ime . ' ' . $participant->prezime;
        $user->save();

        if ($request->has('slika') && $requestData['slika']) {
            // delete old
            Storage::disk('public')->delete($participant->slika);
            // store new
            $path = Storage::disk('public')->putFile(
                '/user_upload/user_id-' . $user->id . '/profilna', 
                $requestData['slika']
            );            
            // , 
            //     // kreiramo unikatan naziv
            //     StringUtility::generateRandomString(20) . '.' . $requestData['slika']->clientExtension()
            $participant->slika = $path;
        }
        
        $participant->save();

        if (isset($requestData['radno_iskustvo'])) {
            $iskustva = $requestData['radno_iskustvo'];
            if (isset($requestData['nvo'])) {
                $iskustva = array_merge($iskustva, $requestData['nvo']);
            }
            if (isset($requestData['extra_educations'])) {
                $iskustva = array_merge($iskustva, $requestData['extra_educations']);
            }
            if (isset($requestData['internship'])) {
                $iskustva = array_merge($iskustva, $requestData['internship']);
            }

            // dd($iskustva);

            foreach ($iskustva as $item) {
                // dd($request->all());
                if (isset($item['method'])) {
                    if (isset($item['present'])) {
                        $item['to_month'] = null;
                        $item['to_year'] = null;
                    }

                    if ($item['method'] === 'new') {

                        if (! isset($item['certifikat']) && $item['type'] === 'extra_educations') {
                            $request->session()->flash('flash_message', 'Svaka dodatna edukacija mora sadržavati certifikat.');
                            break;
                        } else {
                            $newExperience = new Experience($item);
                            $participant->experiences()->save($newExperience);
                            
                            if ($item['type'] === 'extra_educations') {
                                $path = Storage::disk('public')
                                    ->putFileAs(
                                        '/user_upload/user_id-' . $user->id . '/certifikati', 
                                        $item['certifikat'], 
                                        $item['certifikat']->getClientOriginalName()
                                    );

                                $certificate = Certificate::create([
                                    'title'=> $item['certifikat']->getClientOriginalName(), 
                                    'location' => $path, 
                                    'experience_id' => $newExperience->id
                                ]);
                            }
                            
                        }

                    } else if($item['method'] === 'update' && isset($item['id'])) {
                        $exp = Experience::find($item['id']);
                        $exp->update($item);

                        if (isset($item['certifikat']) && $item['type'] === 'extra_educations') {
                            
                            $currentCert = $exp->certificate;

                            // delete old
                            Storage::disk('public')->delete($currentCert->location);

                            // store new
                            $path = Storage::disk('public')->putFileAs('/user_upload/user_id-' . $user->id . '/certifikati', $item['certifikat'], $item['certifikat']->getClientOriginalName());

                            $currentCert->update([
                                'title'=> $item['certifikat']->getClientOriginalName(), 
                                'location' => $path
                            ]);
                            // Certificate::create(['title'=> $item['certifikat']->getClientOriginalName(), 'location' => $path, 'experience_id' => $item['id']]);
                        }
                    } else if($item['method'] === 'delete' && isset($item['id'])) {
                        $exp = Experience::find($item['id']);

                        if ($item['type'] === 'extra_educations') {
                            $currentCert = $exp->certificate;
                            // delete old
                            Storage::disk('public')->delete($currentCert->location);
                        }
                        $exp->delete();
                    }
                }
            }
        }

        if (! $request->session()->has('flash_message')) {
            $request->session()->flash('flash_message', 'Podaci uspješno spašeni.');
        }
        return redirect()->route('participant.edit');
    }

}
