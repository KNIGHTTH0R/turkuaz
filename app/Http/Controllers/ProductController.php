<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;

class ProductController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Product $product) {
        $products = $product->all();

        return view('products.index', [
            'products' => $products,
        ]);
    }

    public function detail($id) {
        $p = Product::find($id);
        return view('products.detail', ['product' => $p]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'photo' => 'required|image',
            'name' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        $destination = base_path() . '/assets/images/products/';
        $image = $request->file('photo');
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $request->file('photo')
            ->move($destination, strtolower($image_name));

        $request->user()->products()->create([
            'photo' => $image_name,
            'name' => $request->name,
            'description' => $request->description,
        ]);
        $request->session()->flash('status', 'success');
        $request->session()->flash('content', 'Продукт успешно добавлен!');
        return redirect('/products');
    }

    public function destroy(Product $product) {
        $product->delete();

        return redirect('/products');
    }

    public function edit($id) {
        $p = Product::find($id);
        return view('products.edit', ['product' => $p]);
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
        ]);
        $image_name = $request->image;
        if($request->hasFile('photo')) {
            $destination = base_path() . '/assets/images/products/';
            $image = $request->file('photo');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $request->file('photo')
                ->move($destination, strtolower($image_name));
        }

        Product::find($id)->update([
            'photo' => $image_name,
            'name' => $request->name,
            'description' => $request->description,
        ]);
        $request->session()->flash('status', 'success');
        $request->session()->flash('content', 'Продукт успешно отредактирован!');
        return redirect('/products');
    }

    public function catalog(Product $product) {
        $products = $product->all();

        return view('pages.catalog', [
            'products' => $products,
        ]);
    }
}
