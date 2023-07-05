<?php

namespace App\Http\Controllers;

use App\Models\Guns;
use App\Models\Product;
use Illuminate\Http\Request;

class Gunscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guns = Product::all();
        return view('admin.products.index')->with('products', $guns);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Guns::all();
        return view('admin.products.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'=>"required",
            'image'=>"required|mimes:jpg,png,jpeg,gif,svg|max:2028",
            'price'=>"required",
            'category'=>'required'
        ]);
        $file_name = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $file_name);
        Product::create([
            'name' => $request->name,
            'image' => $file_name,
            'price'=>$request->price,
            'category_id'=>$request->category
        ]);
        return redirect()->route('product.index')->with('flash_message', "Kayıt Etme Başarılı Şekilde Gerçekleşmiştir !!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Guns::all();
        $item = Product:: find($id);
        return view('admin.products.edit')->with([
            'item'=> $item,
            'categories'=>$categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>"required",
            'price'=>"required"
        ]);


        $item = Product:: find($id);
        $params = [
            'name'=>$request->name,
            'price'=>$request->price,
        ];

        if ($request->hasFile('image')){
            $file_name = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $file_name);
            unlink(public_path('/images/'.$item->image));
            $params['image'] = $file_name;
        }

        $item->update($params);

        return redirect()->route('product.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Product:: find($id);
        $item->delete();
        return redirect()->route('product.index');
    }
}
