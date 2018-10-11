<?php
namespace App\Repository;

use App\Category;

class RepoCategory 
{
    protected $limit = 5;

    public function getData($req)
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

        return $category;
    }
}