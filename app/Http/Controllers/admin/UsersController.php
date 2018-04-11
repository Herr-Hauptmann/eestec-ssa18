<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Spatie\Permission\Models\Permission;

class UsersController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware(['role:root'])->except('show');
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
            $users = User::paginate($perPage);
        } else {
            $users = User::paginate($perPage);
        }

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.users.create');
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
        
        User::create($requestData);

        return redirect('admin/users')->with('flash_message', 'User added!');
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
        /** @var User $user */
        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user'));
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
        /** @var User $user */
        $user = User::findOrFail($id);

        $permissions = Permission::all()->pluck('name')->toArray();

        $directPermissions = $user->getPermissionsViaRoles()->pluck('name');

        // $permissions = $permissions->diff($user->getPermissionsViaRoles())->pluck('name')->toArray();

        //Uredimo malo po tipu permisije
        foreach ($permissions as $i => $permission) {
            if (stripos($permission, 'prijav')) {
                $permissions['Prijave'][] = $permission;
            } else if (stripos($permission, 'novost')) {
                $permissions['Novosti'][] = $permission;
            } else if (stripos($permission, 'medij')) {
                $permissions['Mediji'][] = $permission;
            } else if (stripos($permission, 'partner')) {
                $permissions['Partneri'][] = $permission;
            } else if (stripos($permission, 'trener')) {
                $permissions['Treneri'][] = $permission;
            } else if (stripos($permission, 'trening')) {
                $permissions['Treninzi'][] = $permission;
            } else if (stripos($permission, 'kontakt')) {
                $permissions['Kontakti'][] = $permission;
            } else if (stripos($permission, 'participant')) {
                $permissions['Participanti'][] = $permission;
            }

            unset($permissions[$i]);
        }

        return view('admin.users.edit', compact('user', 'permissions', 'directPermissions'));
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

        /** @var User $user */
        $user = User::findOrFail($id);

        $user->syncRoles($request->role);

        $user->syncPermissions($user->getPermissionsViaRoles());

        // moramo ukiniti iz $requestData niza kako ne bi pokusalo u DB spasiti na pogresnu lokaciju
        unset($requestData['role']);

        $user->update($requestData);

        return redirect('admin/users')->with('flash_message', 'User updated!');
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
        User::destroy($id);

        return redirect('admin/users')->with('flash_message', 'User deleted!');
    }

    ###########################################################################
    ##################### USER PERMISSION MODIFICATIONS #######################
    ###########################################################################

    public function changePermissions(Request $request, User $user)
    {
        $user->syncPermissions($request->has('permissions') ? array_keys($request->permissions) : []);

        return back();
    }

    public function changeDirectPermissions(Request $request, User $user)
    {
        abort(404, 'Work in progress');
    }


    /**
     * Returns only the permissions that the given user does not have
     *
     * @param Request $request
     */
    public function getMissingPermissions(Request $request)
    {

    }
}
