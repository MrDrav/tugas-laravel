<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminPageController extends Controller
{
    public function index()
    {
        $admin_id = Session::get('admin_id');

        if (!$admin_id) {
            return redirect('login');
        }

        $total_pendings = DB::table('orders')->where('payment_status', 'pending')->sum('total_price');
        $total_completed = DB::table('orders')->where('payment_status', 'completed')->sum('total_price');
        $number_of_orders = DB::table('orders')->count();
        $number_of_products = DB::table('products')->count();
        $number_of_users = DB::table('users')->where('user_type', 'user')->count();
        $number_of_admins = DB::table('users')->where('user_type', 'admin')->count();
        $number_of_account = DB::table('users')->count();
        $number_of_messages = DB::table('messages')->count(); // Perbarui nama tabel di sini

        return view('admin_page', compact(
            'total_pendings', 'total_completed', 'number_of_orders', 'number_of_products',
            'number_of_users', 'number_of_admins', 'number_of_account', 'number_of_messages'
        ));
    }
}
