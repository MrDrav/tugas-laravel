<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminUserController extends Controller
{
    public function index()
    {
        $admin_id = Session::get('admin_id');

        if (!$admin_id) {
            return redirect('login');
        }

        $users = DB::table('users')->get();

        return view('admin_users', ['users' => $users]);
    }

    public function destroy($id)
    {
        $admin_id = Session::get('admin_id');

        if (!$admin_id) {
            return redirect('login');
        }

        DB::table('users')->where('id', $id)->delete();

        return redirect('admin_users')->with('success', 'User deleted successfully!');
    }

    public function edit($id)
    {
        $admin_id = Session::get('admin_id');

        if (!$admin_id) {
            return redirect('login');
        }

        $user = DB::table('users')->where('id', $id)->first();

        if (!$user) {
            return redirect('admin_users');
        }

        return view('admin_users_edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $admin_id = Session::get('admin_id');

        if (!$admin_id) {
            return redirect('login');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));

        DB::table('users')->where('id', $id)->update([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);

        return redirect('admin_users')->with('success', 'User updated successfully!');
    }
}
