<?php

namespace App\Http\Controllers;


use App\Partner;
use App\Utility\StringUtility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnersController extends Controller
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
            $partners = Partner::where('name', 'LIKE', "%$keyword%")
                ->orWhere('website', 'LIKE', "%$keyword%")
                ->orWhere('category', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $partners = Partner::paginate($perPage);
        }

        return view('admin.partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.partners.create');
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


        /** @var Partner $partner */
        $partner = Partner::create([
            'name' => $request->name,
            'category' => $request->category,
            'website' => $request->website
        ]);

        Storage::disk('public')->putFileAs('/uploads/partneri/' . $partner->id, $requestData['logo'], $requestData['logo']->getClientOriginalName());

        $partner->update([
            'logo' => '/uploads/partneri/' . $partner->id . '/' . $requestData['logo']->getClientOriginalName()
        ]);


        return redirect()->route('partners.index')->with('flash_message', 'Partner added!');
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
        $partner = Partner::findOrFail($id);

        return view('admin.partners.show', compact('partner'));
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
        $partner = Partner::findOrFail($id);

        return view('admin.partners.edit', compact('partner'));
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

        $partner = Partner::findOrFail($id);

        if (isset($requestData['logo'])) {
            Storage::disk('public')->delete($partner->logo);
            Storage::disk('public')->putFileAs('/uploads/partneri/' . $id, $requestData['logo'], $requestData['logo']->getClientOriginalName());       
            $requestData['logo'] = '/uploads/partneri/' . $id . '/' . $requestData['logo']->getClientOriginalName();
        } 
        
        $partner->update($requestData);

        return redirect()->route('partners.show', $id)->with('flash_message', 'Partner updated!');
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
        Storage::disk('public')->deleteDirectory('/uploads/partneri/' . $id);

        Partner::destroy($id);

        return redirect()->route('partners.index')->with('flash_message', 'Partner deleted!');
    }
}
