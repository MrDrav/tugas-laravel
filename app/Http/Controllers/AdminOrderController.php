<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminOrderController extends Controller
{
    public function index()
    {
        $admin_id = Session::get('admin_id');

        if (!$admin_id) {
            return redirect('login');
        }

        $orders = DB::table('orders')->get();

        return view('admin_orders', ['orders' => $orders]);
    }

    public function update(Request $request)
    {
        $admin_id = Session::get('admin_id');

        if (!$admin_id) {
            return redirect('login');
        }

        $order_update_id = $request->input('order_id');
        $update_payment = $request->input('update_payment');

        DB::table('orders')->where('id', $order_update_id)->update(['payment_status' => $update_payment]);

        return redirect('admin_orders')->with('success', 'Payment status has been updated!');
    }

    public function destroy($id)
    {
        $admin_id = Session::get('admin_id');

        if (!$admin_id) {
            return redirect('login');
        }

        DB::table('orders')->where('id', $id)->delete();

        return redirect('admin_orders')->with('success', 'Order deleted successfully!');
    }
}
