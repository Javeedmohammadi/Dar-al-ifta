<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{

    public function notAdmin()
    {
        return view('notAdmin.not_admin');
    }

    public function create()
    {
        return view('system_users.create');
    }

    public function store_create(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string'],
        ]);

        User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]
        );

        Alert::success('پاملرنه!', '.نوی کارونکی اضافه شو');
        return to_route('show.system.users', app()->getLocale());
    }

    public function index()
    {
        $system_users = User::paginate(3);
        return view('system_users.index', compact('system_users'));
    }

    public function edit($lang, $id)
    {
        $user = User::findOrFail($id);
        return view('system_users.edit', compact('user'));
    }

    public function store($lang, $user, Request $request)
    {
        $request->validate([
            'system_username' => ['required', 'string', 'max:255', 'min:3'],
            'system_user_role' => ['required', 'string'],
            'system_useremail' => ['required', 'string', 'email', 'max:255'],
            // 'system_userpassword' => ['required', 'string', 'password', 'min:8', 'max:64'],
        ]);

        $user = User::findOrFail($user);
        $user->update(
            [
                'name' => $request->system_username,
                'role' => $request->system_user_role,
                'email' => $request->system_useremail,
                // 'password' => $request->system_userpassword,
            ]
        );

        Alert::success('پاملرنه!', '.د کارونکی معلومات نوی شول');
        return to_route('show.system.users', app()->getLocale());
    }

    public function destroy($lang, $id)
    {

        $system_users = User::findOrFail($id);
        $system_users->delete();

        Alert::error('پاملرنه!', '.کارونکی له منځه لاړ');
        return to_route('show.system.users', app()->getLocale());
    }
}
