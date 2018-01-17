<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Training;
use App\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrainingsController extends Controller
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
            $trainings = Training::where('title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $trainings = Training::paginate($perPage);
        }

        return view('admin.trainings.index', compact('trainings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $trainers = Trainer::all();
        return view('admin.trainings.create', compact('trainers'));
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


        
        $training = Training::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        Trainer::findOrFail($request->trainer_id)->training()->save($training);

        Storage::disk('public')->putFileAs('/uploads/treninzi/' . $training->id, $requestData['image'], $requestData['image']->getClientOriginalName());

        $training->update([
            'image' => '/uploads/treninzi/' . $training->id . '/' . $requestData['image']->getClientOriginalName()
        ]);


        return redirect()->route('trainings.index')->with('flash_message', 'Training added!');
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
        $training = Training::findOrFail($id);

        return view('admin.trainings.show', compact('training'));
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
        $training = Training::findOrFail($id);
        $trainers = Trainer::all();

        return view('admin.trainings.edit', compact('training', 'trainers'));
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
        
        $training = Training::findOrFail($id);
        
        if (isset($requestData['image'])) {
            Storage::disk('public')->delete($training->image);
            Storage::disk('public')->putFileAs('/uploads/treninzi/' . $id, $requestData['image'], $requestData['image']->getClientOriginalName());       
            $requestData['image'] = '/uploads/treninzi/' . $id . '/' . $requestData['image']->getClientOriginalName();
        } 
        
        $training->update($requestData);

        Trainer::findOrFail($request->trainer_id)->training()->save($training);

        return redirect()->route('trainings.show', $id)->with('flash_message', 'Partner updated!');
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
        Storage::disk('public')->deleteDirectory('/uploads/treninzi/' . $id);

        Training::destroy($id);

        return redirect('admin/trainings')->with('flash_message', 'Training deleted!');
    }
}
