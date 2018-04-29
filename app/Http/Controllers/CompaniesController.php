<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // $keyword = $request->get('search');
        // $perPage = 25;

        // if (!empty($keyword)) {
        //     $ = ::paginate($perPage);
        // } else {
        //     $ = ::paginate($perPage);
        // }

        return view('participants.platform.company.index');
    }

    public function profile(Request $request)
    {
        // $keyword = $request->get('search');
        // $perPage = 25;

        // if (!empty($keyword)) {
        //     $ = ::paginate($perPage);
        // } else {
        //     $ = ::paginate($perPage);
        // }

        return view('participants.platform.company.profil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    // public function show($id)
    // {
    //     $ = ::findOrFail($id);

    //     return view('.show', compact(''));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    // public function edit($id)
    // {
    //     $ = ::findOrFail($id);

    //     return view('.edit', compact(''));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    // public function update(Request $request, $id)
    // {
        
    //     $requestData = $request->all();
        
    //     $ = ::findOrFail($id);
    //     $->update($requestData);

    //     return redirect('')->with('flash_message', ' updated!');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    // public function destroy($id)
    // {
    //     ::destroy($id);

    //     return redirect('')->with('flash_message', ' deleted!');
    // }
}
