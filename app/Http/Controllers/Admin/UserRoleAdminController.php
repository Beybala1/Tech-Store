<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRoleRequest;
use App\Models\User;

class UserRoleAdminController extends Controller
{
    public function index()
    {
        $users = User::where('isAdmin',1)->latest()->get();
        return view('backend.user-and-roles.index',get_defined_vars());
    }

    public function create()
    {
        return view('backend.user-and-roles.create');
    }

    public function store(UserStoreRoleRequest $request)
    {
        try {
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
        }
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('backend.user-and-roles.show',get_defined_vars());
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return back()
            ->with('success', 'Əməliyyat uğurla həyata keçirildi');
    }
}
