<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products=DB::table('products')->get();
        return view("products.index")->with('products', $products);
    }

    public function create(Request $request)
    {
        return view("products.register");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'stock' => ['required', 'numeric'],
            'image' => ['image', 'mimes:jpeg,png,svg', 'size:2048'],
        ]);

        $fileName = '';

        if($request->hasFile('img'))
        {
            $fileName = $request->getSchemeAndHttpHost() . '/productsImg/' . time() . '.' . $request->img->extension();

            $request->img->move(public_path('/productsImg/'), $fileName);
        }

        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'imgPath' => $fileName ,
        ]);

        // $products=DB::table('products')->get();
        // return view("products.index")->with('products', $products);
        return redirect('/products', 201)
        ->with('success','Product has been registered.')
        ->with('file', $product);
    }

    public function show(Request $request)
    {
        $product=DB::table('products')->find($request->id);
        return view("products.update")->with('product', $product);
    }

    public function update(Request $request)
    {
        $product=DB::table('products')->find($request->id);

        Product::where('id', $request->id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'imgPath' => $request->imgPath,
        ]);

        return redirect()->route('products')
        ->with('success','Product has been updated.');
    }

    public function delete(Request $request)
    {
        $product=Product::where('id', $request->id)->delete();
        
        return redirect()->route('products')
        ->with('success','Product has been deleted.');
    }
}
