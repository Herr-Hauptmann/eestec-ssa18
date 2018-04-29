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
use Illuminate\Support\Facades\Validator;

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
        // $user = User::where('email', $request->email)->first();
        // Auth::login($user);
        return $this->login($request);
        // dd($request->all());

    }

    public function showRegistrationFormParticipant()
    {
        return view('participants.platform.register');
    }

    public function registerParticipant(Request $request)
    {
        $messages = [
            'required' => 'Polje \':attribute\' je obavezno.',
            'max' => ':attribute ne smije sadržavati više od :max znakova.',
            'email.unique' => 'Već postoji korisnik sa ovom email adresom. ' . '<a href="' . route('participant.login.show') . '"> Login?</a>',
            'password.confirmed' => 'Unesene šifre se ne podudaraju.',
            'password.min' => 'Šifra mora sazdržavati minimalno :min znakova.',
            'name.required' => 'Polje \'Ime i prezime\' je obavezno.'
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
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
        session()->flush('emailRemembered');

        /** @var User $user */
        $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $participant = Participant::where('email', $request->email)->first();
        $participant->update(['user_id' => $user->id]);

        $user->assignRole('participant');

        Auth::login($user, true);

        return redirect('participant/profil');
    }

    public function emailCheck(Request $request)
    {
        $participant = Participant::select('email', \DB::raw('CONCAT(ime, \' \', prezime) as ime'))
                ->where('email', $request->get('email'))->first();

        // TODO: Dodati provjeru da li je prihvacena aplikacija bila (accepted kolona)

        if ($participant) {
            session(['emailRemembered' => true]);
        }

        return response()->json($participant ?? ['error' => 'Email adresa ne zadovoljava kriterije']);
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
        $user = \Auth::user();
        $participant = $user->participant;
        $experiences = $participant->experiences;
        $faculties = Faculty::pluck('naziv', 'id');

        // dd($id);
        return view('participants.platform.edit', compact('faculties', 'user', 'participant', 'experiences'));
    }
}
