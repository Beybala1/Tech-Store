<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRoleRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserRoleAdminController extends Controller
{
    public function index()
    {
        admin_abort();
        $users = User::where('isAdmin',1)->latest()->get();
        return view('backend.user-and-roles.index',get_defined_vars());
    }

    public function create()
    {
        admin_abort();
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
                ->with('success', __('messages.success'));
        } catch (\Exception $e) {
            return back()->with('warning', __('messages.fail'));
        }
    }

    public function show($id)
    {
        admin_abort();  
        $user = User::findOrFail($id);
        return view('backend.user-and-roles.show',get_defined_vars());
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return back()
            ->with('success', 'Əməliyyat uğurla həyata keçirildi');
    }

    public function storeRole(Request $request)
    {
        try {
            $user = User::find($request->id);   
            $role = Role::find($request->roles);
            $user->syncRoles($role);
            return redirect(route('user-and-roles.index'))  
                ->with('success', __('messages.success'));
        } catch (\Exception $e) {
            return back()->with('warning', __('messages.fail'));
        }
    }
}
