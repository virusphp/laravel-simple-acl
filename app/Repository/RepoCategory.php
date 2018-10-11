<?php
namespace App\Repository;

use App\Category;
use DB;

class RepoCategory 
{
    protected $limit = 5;

    public function getCategory($req)
    {
        $category = Category::where(function ($query) use ($req) {
            if (($term = $req->get("term"))) {
                $keywords = '%' . $term . '%';
                $query->orWhere('name', 'LIKE', $keywords);
                $query->orWhere('slug', 'LIKE', $keywords);
            }
        })
        ->terbaru()
        ->paginate($this->limit);

        $category->appends($req->only('term'));

        return $category;
    }

    public function saveCategory($req, $id=null)
    {
        DB::beginTransaction();
        try
        {
            $params = [
                'name' => $req->name,
                'slug' => $req->slug
            ];

            if(!id) {
                $category = Category::create($params);
            } else {
                $category = Category::findOrFail($id);
                if (!is_null($category)) {
                    $category = $category->update($params);
                } else {
                    DB::rollback();
                    return false;
                }
            }

            DB::commit();
            return true;
            
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }  
    }
}