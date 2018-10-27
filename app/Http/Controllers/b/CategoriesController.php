<?php
namespace App\Http\Controllers\b;

use Illuminate\Http\Request;
use App\Http\Controllers\b\BackendController;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryDestroyRequest;
use App\Repository\RepoCategory;

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
        $categoryCount = $this->repo->categoryCount();
        return view('b.categories.index', compact('categories', 'categoryCount'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = $this->repo->category();
        return view('b.categories.create', compact('category'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        if ($this->repo->saveCategory($request)) {
            $notif = $this->repo->getPesan('create');
            return redirect()->route('categories.index')->with($notif);
        } else {
            $notif = $this->repo->getPesan('error');
            return redirect()->route('categories.create')->with($notif);
        }
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
        $category = \App\Category::findOrFail($id);
        if (!is_null($category)) {
            return view('b.categories.edit', compact('category'));
        } else {
            return redirect()->route('categories.index');
        }
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
        if ($this->repo->saveCategory($request, $id)) {
            $notif = $this->repo->getPesan('update');
            return redirect()->route('categories.index')->with($notif);
        } else {
            $notif = $this->repo->getPesan('error');
            return redirect()->route('categories.edit', $id)->with($notif);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryDestroyRequest $request, $id)
    {
        if (!empty($id)) {
            if ($this->repo->delete($id)) {
                $notif = $this->repo->getPesan('delete');
            } else {
                $notif = $this->repo->getPesan('error');
            }
        }
        return redirect()->route('categories.index')->with($notif);
    }
}
