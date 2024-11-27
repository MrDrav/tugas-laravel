<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $user = DB::table('users')->where('email', $email)->first();

        if ($user && password_verify($password, $user->password)) {
            Session::regenerate();

            if ($user->user_type == 'admin') {
                Session::put('admin_name', $user->name);
                Session::put('admin_email', $user->email);
                Session::put('admin_id', $user->id);
                return redirect('admin_page');
            } elseif ($user->user_type == 'user') {
                Session::put('user_name', $user->name);
                Session::put('user_email', $user->email);
                Session::put('user_id', $user->id);
                return redirect('home');
            }
        } else {
            return back()->withErrors(['email' => 'Incorrect email or password!']);
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('login');
    }

    public function getTotalPendingOrders()
    {
        $totalPendingOrders = DB::table('orders')
            ->where('payment_status', 'pending')
            ->sum('total_price');

        return view('orders.total_pending', compact('totalPendingOrders'));
    }
}
