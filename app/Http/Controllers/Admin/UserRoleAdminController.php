<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRoleRequest;
use App\Models\User;

class UserRoleAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->get();
        return view('backend.user_and_roles',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.create.user_and_roles_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRoleRequest $request)
    {
        dd(User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'isAdmin'=>1,
        ]));
        /* try {
            $request->validated();
            User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
                'isAdmin'=>1,
            ]);
            return redirect(route('user-and-roles.index'))
                ->with('success', 'Əməliyyat uğurla həyata keçirildi');
        } catch (\Exception $e) {
            return back()->with('warning', 'Əməliyyat uğursuz oldu');
        } */
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user = User::findOrFail($user);
        return view('backend.show.user_and_roles_show',get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $user = User::findOrFail($user);
        return view('backend.show.user_and_roles_show',get_defined_vars());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return back()
            ->with('success', 'Əməliyyat uğurla həyata keçirildi');
    }
}
