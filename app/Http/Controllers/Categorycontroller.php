<?php

namespace App\Http\Controllers;

use App\Models\Guns;
use Illuminate\Http\Request;

class Categorycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guns = Guns::all();
        return view('admin.category.index')->with('categories', $guns);;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>"required",
            'image'=>"required|mimes:jpg,png,jpeg,gif,svg|max:2028"
        ]);
        $file_name = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $file_name);
        Guns::create([
            'name' => $request->name,
            'image' => $file_name
        ]);
        return redirect()->route('category.index')->with('flash_message', "Kayıt Etme Başarılı Şekilde Gerçekleşmiştir !!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(string $id)
    {

        $item = Guns:: find($id);
        return view('admin.category.edit')->with('item', $item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>"required",
        ]);


        $item = Guns:: find($id);
        $params = [
            'name'=>$request->name,
        ];

        if ($request->hasFile('image')){
            $file_name = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $file_name);
            unlink(public_path('/images/'.$item->image));
            $params['image'] = $file_name;
        }

        $item->update($params);

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Guns:: find($id);
        $item->delete();
        return redirect()->route('category.index');
    }
}

