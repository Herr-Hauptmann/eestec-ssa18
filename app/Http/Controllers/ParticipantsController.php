<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Participant;
use App\User;
use App\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $participant = Participant::findOrFail($id);

        return view('participants.edit', compact('participant'));
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
        
        $participant = Participant::findOrFail($id);
        $participant->update($requestData);

        return redirect('admin/participants')->with('flash_message', 'Participant updated!');
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
    public function showLoginFormParticipant()
    {
        return view('participants.platform.login');
    }

    public function loginParticipant(Request $request)
    {
        // get user by email
        // $user = User::where('email', $request->email)->first();
        // Auth::login($user);
        return $this->login($request);
        // dd($request->all());

    }

    public function profile()
    {
        $faculties = Faculty::pluck('naziv', 'id');
        return view('participants.platform.profile', compact('faculties'));
    }
}
