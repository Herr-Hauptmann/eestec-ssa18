<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use App\Kontakt;
use Illuminate\Http\Request;

class KontaktController extends Controller
{
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
            $kontakt = Kontakt::where('pozicija', 'LIKE', "%$keyword%")
                ->orWhere('ime', 'LIKE', "%$keyword%")
                ->orWhere('prezime', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $kontakt = Kontakt::paginate($perPage);
        }

        return view('admin.kontakt.index', compact('kontakt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.kontakt.create');
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
        
        Kontakt::create($requestData);

        return redirect('admin/kontakt')->with('flash_message', 'Kontakt added!');
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
        $kontakt = Kontakt::findOrFail($id);

        return view('admin.kontakt.show', compact('kontakt'));
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
        $kontakt = Kontakt::findOrFail($id);

        return view('admin.kontakt.edit', compact('kontakt'));
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
        
        $kontakt = Kontakt::findOrFail($id);
        $kontakt->update($requestData);

        return redirect('admin/kontakt')->with('flash_message', 'Kontakt updated!');
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
        Kontakt::destroy($id);

        return redirect('admin/kontakt')->with('flash_message', 'Kontakt deleted!');
    }
    
    public function sendMail(Request $request)
    {

        $request->validate([
            'ime' => 'required|min:3',
            'email' => 'required|email',
            'poruka' => 'required'
        ]);

        $primi = 'info@softskillsacademy.ba';

        $subject = '[SSA] Kontakt forma';
        $eol = PHP_EOL;

        $message = '<html><body>';
        $message .= 'Od '.$request->ime.'<br />';
        $message .= 'Email: '.$request->email.'<br /><br />';
        $message .= $request->poruka;
        $message .= '</body></html>';

        $headers = 'From: softskillsacademy.ba <noreply@softskillsacademy.ba> ' . "\r\n" .
                        'Reply-To: softskillsacademy.ba <noreply@softskillsacademy.ba>' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=\"UTF-8\"".$eol;
        $headers .= "Content-Transfer-Encoding: 8bit".$eol.$eol;

        
        mail($primi, $subject, $message, $headers);

        return back()->with('success', 'Hvala što ste nas kontaktirali. Naš tim će nastojati da u što kraćem roku odgovori na Vašu poruku.');
    }
}
