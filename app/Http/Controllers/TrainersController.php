<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrainersController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
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
            $trainers = Trainer::where('name', 'LIKE', "%$keyword%")
                ->orWhere('about', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $trainers = Trainer::paginate($perPage);
        }

        return view('admin.trainers.index', compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.trainers.create');
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
        
        $trainer = Trainer::create([
            'name' => $request->name,
            'about' => $request->about,
        ]);

        Storage::disk('public')->putFileAs('/uploads/treneri/' . $trainer->id, $requestData['image'], $requestData['image']->getClientOriginalName());

        $trainer->update([
            'image' => '/uploads/treneri/' . $trainer->id . '/' . $requestData['image']->getClientOriginalName()
        ]);


        return redirect()->route('trainers.index')->with('flash_message', 'Trainer added!');
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
        $trainer = Trainer::findOrFail($id);

        return view('admin.trainers.show', compact('trainer'));
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
        $trainer = Trainer::findOrFail($id);

        return view('admin.trainers.edit', compact('trainer'));
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
        
        $trainer = Trainer::findOrFail($id);

        if (isset($requestData['image'])) {
            Storage::disk('public')->delete($trainer->image);
            Storage::disk('public')->putFileAs('/uploads/treneri/' . $id, $requestData['image'], $requestData['image']->getClientOriginalName());       
            $requestData['image'] = '/uploads/treneri/' . $id . '/' . $requestData['image']->getClientOriginalName();
        } 
        
        $trainer->update($requestData);

        return redirect()->route('trainers.show', $id)->with('flash_message', 'Trainer updated!');
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
        Storage::disk('public')->deleteDirectory('/uploads/treneri/' . $id);

        Trainer::destroy($id);

        return redirect('admin/trainers')->with('flash_message', 'Trainer deleted!');
    }
}
