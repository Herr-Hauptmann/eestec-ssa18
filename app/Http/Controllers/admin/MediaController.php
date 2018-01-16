<?php

namespace App\Http\Controllers;


use App\Medium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
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
            $media = Medium::where('name', 'LIKE', "%$keyword%")
                ->orWhere('category', 'LIKE', "%$keyword%")
                ->orWhere('website', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $media = Medium::paginate($perPage);
        }

        return view('admin.media.index', compact('media'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.media.create');
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
        
        /** @var Medium $media */
        $media = Medium::create([
            'name' => $request->name,
            'category' => $request->category,
            'website' => $request->website
        ]);

        Storage::disk('public')->putFileAs('/uploads/mediji/' . $media->id, $requestData['logo'], $requestData['logo']->getClientOriginalName());

        $media->update([
            'logo' => '/uploads/mediji/' . $media->id . '/' . $requestData['logo']->getClientOriginalName()
        ]);


        return redirect()->route('media.index')->with('flash_message', 'Medium added!');
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
        $media = Medium::findOrFail($id);

        return view('admin.media.show', compact('media'));
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
        $media = Medium::findOrFail($id);

        return view('admin.media.edit', compact('media'));
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
        
        /** @var Medium $media */
        $media = Medium::findOrFail($id);

        if (isset($requestData['logo'])) {
            Storage::disk('public')->delete($media->logo);
            Storage::disk('public')->putFileAs('/uploads/mediji/' . $id, $requestData['logo'], $requestData['logo']->getClientOriginalName());       
            $requestData['logo'] = '/uploads/mediji/' . $id . '/' . $requestData['logo']->getClientOriginalName();
        } 
        
        $media->update($requestData);

        return redirect()->route('media.show', $id)->with('flash_message', 'Medium updated!');
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
        Storage::disk('public')->deleteDirectory('/uploads/mediji/' . $id);

        Medium::destroy($id);

        return redirect()->route('media.index')->with('flash_message', 'Medium deleted!');
    }
}
