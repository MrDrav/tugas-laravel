<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminContactController extends Controller
{
    public function index()
    {
        $admin_id = Session::get('admin_id');

        if (!$admin_id) {
            return redirect('login');
        }

        // Use 'messages' instead of 'message'
        $messages = DB::table('messages')->get();

        return view('admin_contacts', ['messages' => $messages]);
    }

    public function delete($id)
    {
        DB::table('message')->where('id', $id)->delete();
        return redirect('admin_contacts');
    }
}
