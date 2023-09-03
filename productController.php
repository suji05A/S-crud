<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class productController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('products.index',compact('products'));
    }
    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description'=>'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('products'),$imageName);
                   
        $product = new Product;
        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();
        return back()->withwow('Product Created!!!!');
    }
    public function edit($id){
        $product = Product::where('id',$id)->first();
        return view('products.edit',['product'=>$product]);

    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'description'=>'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000',
        ]);
        $product = Product::where('id',$id)->first();

        if(isset($request->image)){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('products'),$imageName);
            $product->image = $imageName;
        }
        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();
        return back()->withwow('Product Updated!!!!');
    }
    public function destroy($id){
        $product = Product::where('id',$id)->first();
        $product->delete();
        return back()->withwow('Product Deleted!!!!');
    }
}     
