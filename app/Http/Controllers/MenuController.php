<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MenuController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("managments.menus.index")->with([
            "menus" => Menu::paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("managments.menus.create")->with([

            "categories" => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $this->validate($request, [
            "title" => "required|min:3|unique:menus,title",
            "description" => "required|min:5",
            "image" => "required|image|mimes:png,jpg,jpeg|max:2048",
            "price" => "required|numeric",
            "category_id" => "required|numeric",
        ]);
        //store data
        if ($request->hasFile("image")) {
            $file = $request->image;
            $imageName = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('images/menus'), $imageName);
            $title = $request->title;
            Menu::create([
                "title" => $title,
                "slug" => Str::slug($title),
                "description" =>  $request->description,
                "price" =>  $request->price,
                "category_id" =>  $request->category_id,
                "image" =>  $imageName,
            ]);
            //redirect user


            return redirect('/menus')->with([
                "success" => "Menu Added Succesfully"
            ]);

            // return redirect()->route("menus.index")->with([
            //     "success" => "menu ajouté avec succés"
            // ]);
        c
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu, $id)
    {

        return view("managments.menus.edit")->with([
            "categories" => Category::all(),
        //     "menu" => Menu::all(),
              "menu" => Menu::findOrFail($id),
        ]);

        // return $menu;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu, $id)
    {
        //
        //validation
        $menu = Menu::find($id);
        $this->validate($request, [
            "title" => "required|min:3|unique:menus,title," . $menu->id,
            "description" => "required|min:5",
            "image" => "image|mimes:png,jpg,jpeg|max:2048",
            "price" => "required|numeric",
            "category_id" => "required|numeric",
        ]);
        //store data
        if ($request->hasFile("image")) {
            unlink(public_path('images/menus/' . $menu->image));
            $file = $request->image;
            $imageName = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('images/menus'), $imageName);
            $title = $request->title;
            Menu::create([
                "title" => $title,
                "slug" => Str::slug($title),
                "description" =>  $request->description,
                "price" =>  $request->price,
                "category_id" =>  $request->category_id,
                "image" =>  $imageName,
            ]);
            //redirect user
            return redirect('/menus')->with([
                "success" => "Menu Saved Succesfully"
            ]);
        } else {
            $title = $request->title;
            $menu->update([
                "title" => $title,
                "slug" => Str::slug($title),
                "description" =>  $request->description,
                "price" =>  $request->price,
                "category_id" =>  $request->category_id
            ]);
            //redirect user
            return redirect('/menus')->with([
                "success" => "Menu Saved Succesfully"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //remove image
        unlink(public_path('images/menus/' . $menu->image));
        $menu->delete();
        //redirect user
        return redirect()->route("menus.index")->with([
            "success" => "menu supprimé avec succés"
        ]);
    }
}
