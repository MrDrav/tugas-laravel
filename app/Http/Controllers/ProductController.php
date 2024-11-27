<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getTotalProducts()
    {
        $totalProducts = DB::table('products')->count();

        return view('products.total', compact('totalProducts'));
    }
}