<?php


namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        //
        return view("managments.categories.index")->with([
            "categories" => Category::paginate(5)
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
        return view("managments.categories.create");
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
            "title" => "required|min:3"
        ]);
        //store data
        $title = $request->title;
        Category::create([
            "title" => $title,
            "slug" => Str::slug($title)
        ]);
        //redirect user

        return redirect('/categories')->with('message', 'category added succesfully!');

        // return redirect()->route("categories.index")->with([
        //     "success" => "catégorie ajoutée avec succés"
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    // public function edit(Category $category)
    public function edit($id)
    {
        //
        return view("managments.categories.edit")->with([
            "category" => Category::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, $id)
    {
        //validation
        $category = Category::find($id);
        $this->validate($request, [
            "title" => "required|min:3"
        ]);
        //store data
        $title = $request->title;
        $category->update([
            "title" => $title,
            "slug" => Str::slug($title)
        ]);
        //redirect user


        return redirect('/categories')->with('message', 'Category updated succesfully!');

        // return redirect()->route("categories.index")->with([
        //     "success" => "catégorie modifiée avec succés"
        // ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, $id)
    {
        $category = Category::findOrFail($id);
        //delete category
        $category->delete();
        //redirect user


        return redirect('/categories')->with('message', 'Category deleted succesfully!');

        // return redirect()->route("categories.index")->with([
        //     "success" => "catégorie supprimée avec succés"
        // ]);
    }
}
