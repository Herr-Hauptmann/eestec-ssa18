<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participant;
use App\Faculty;
use Illuminate\Support\Facades\DB;

class PrijavaController extends Controller
{
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

        if (!empty($keyword)) {
//            $ = ::paginate($perPage);
        } else {
//            $ = ::paginate($perPage);
        }

        return view('.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
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

        // poslati mail potvrde prijave

        return back()->with('success', 'Prijava je uspješno pohranjena.');
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
//        $ = ::findOrFail($id);

        return view('.show', compact(''));
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
}
