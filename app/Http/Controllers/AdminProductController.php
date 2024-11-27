<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    public function index()
    {
        $admin_id = Session::get('admin_id');

        if (!$admin_id) {
            return redirect('login');
        }

        $products = DB::table('products')->get();

        return view('admin_products', ['products' => $products]);
    }

    public function store(Request $request)
    {
        $admin_id = Session::get('admin_id');

        if (!$admin_id) {
            return redirect('login');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:20480',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/product_images'), $imageName);

            DB::table('products')->insert([
                'name' => $request->name,
                'price' => $request->price,
                'image' => 'product_images/' . $imageName
            ]);
        }

        return redirect('admin_products');
    }

    public function destroy($id)
    {
        $admin_id = Session::get('admin_id');

        if (!$admin_id) {
            return redirect('login');
        }

        $product = DB::table('products')->where('id', $id)->first();
        if ($product) {
            Storage::disk('public')->delete($product->image);
            DB::table('products')->where('id', $id)->delete();
        }

        return redirect('admin_products')->with('success', 'Product deleted successfully!');
    }

    public function edit($id)
    {
        $admin_id = Session::get('admin_id');

        if (!$admin_id) {
            return redirect('login');
        }

        $product = DB::table('products')->where('id', $id)->first();

        if (!$product) {
            return redirect('admin_products');
        }

        return view('admin_products_edit', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $admin_id = Session::get('admin_id');

        if (!$admin_id) {
            return redirect('login');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:20480',
        ]);

        $product = DB::table('products')->where('id', $id)->first();

        if ($request->hasFile('image')) {
            // Delete old image
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            // Upload new image
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/product_images'), $imageName);

            DB::table('products')->where('id', $id)->update([
                'name' => $request->name,
                'price' => $request->price,
                'image' => 'product_images/' . $imageName
            ]);
        } else {
            DB::table('products')->where('id', $id)->update([
                'name' => $request->name,
                'price' => $request->price
            ]);
        }

        return redirect('admin_products');
    }
}
