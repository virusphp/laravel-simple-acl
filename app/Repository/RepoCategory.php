<?php
namespace App\Repository;
use App\Category;
use App\Post;
use DB;
class RepoCategory
{
    protected $limit = 5;
    public function getCategory($req)
    {
        $category = Category::with('posts')->where(function ($query) use ($req) {
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
    public function categoryCount()
    {
        $category = Category::count();
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
            if(!$id) {
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
    public function delete($id)
    {
        DB::beginTransaction();
        try
        {
            Post::where('category_id', $id)->update(['category_id' => config('cms.default_category_id')]);
            $delete = Category::destroy($id);
            DB::commit();
            if ($delete) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }
    public function getPesan($nilai)
    {
        switch ($nilai) {
            case 'create' :
                $notif = [
                    'alert-type' => 'success',
                    'message' => 'Kategori berhasil di buat!'
                ];
                break;
            case 'update' :
                $notif = [
                    'alert-type' => 'success',
                    'message' => 'Kategori berhasil di update!'
                ];
                break;
            case 'delete' :
                $notif = [
                    'alert-type' => 'success',
                    'message' => 'Kategori berhasil di Hapus!'
                ];
                break;
            case 'error' :
                $notif = [
                    'alert-type' => 'warning',
                    'message' => 'Terjadi kesalahan silahkan ulangi!'
                ];
                break;
            default :
                $notif = false;
                break;
        }
        return $notif;
    }
}