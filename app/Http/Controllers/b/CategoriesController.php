<?php

namespace App\Http\Controllers\b;

use Illuminate\Http\Request;
use App\Http\Controllers\b\BackendController;
use App\Http\Requests\CategoryRequest;
use App\Repository\RepoCategory;
use App\Category;

class CategoriesController extends BackendController
{
    protected $repo;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->repo = new RepoCategory;
    }

    public function index(Request $req)
    {
        $categories = $this->repo->getCategory($req);
        return view('b.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('b.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
       Category::create($request->all());

       $notif = [
           'alert-type' => 'success',
           'message' => 'Kategori berhasil di buat!'
       ];

       return redirect()->route('categories.index')->with($notif); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('b.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $data = $request->only('name', 'slug');
        $category->update($data);

        $notif = [
            'alert-type' => 'success',
            'message' => 'Kategori berhasil di update!'
        ];

        return redirect()->route('categories.index')->with($notif); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        $notif = [
            'alert-type' => 'success',
            'message' => 'Kategori berhasil di hapus!'
        ];

        return redirect()->route('categories.index')->with($notif);
    }
}
