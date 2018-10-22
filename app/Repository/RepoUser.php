<?php
namespace App\Repository;

use App\User;
use DB;

class RepoUser
{
    protected $limit = 5;
    
    public function user()
    {
        return new User;
    }

    public function getUser($req)
    {
        $user = User::where(function ($query) use ($req) {
            if (($term = $req->get("term"))) {
                $keywords = '%' . $term . '%';
                $query->orWhere('name', 'LIKE', $keywords);
                // $query->orWhere('slug', 'LIKE', $keywords);
            }
        })
        ->terbaru()
        ->paginate($this->limit);

        $user->appends($req->only('term'));

        return $user;
    }

    public function userCount()
    {
        $user = User::count();
        return $user;
    }

    public function saveUser($req, $id=null)
    {
        // dd($req->all(), $id);
        DB::beginTransaction();
        try
        {
            $params = [
                '_token' => $req->_token,
                'name' => $req->name,
                'email' => $req->email,
                'slug' => $req->slug,
                'password' => $req->password,
                'password_confirmation' => $req->password_confirmation
            ];

            if(!$id) {
                $user = User::create($req->all());
            } else {
                $user = User::find($id);
                // dd($user);
                if (!is_null($user)) {
                    $user = $user->update($req->all());
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
                    'message' => 'User berhasil di buat!'
                ];
                break;
            case 'update' :
                $notif = [
                    'alert-type' => 'success',
                    'message' => 'User berhasil di update!'
                ];
                break;
            case 'delete' :
                $notif = [
                    'alert-type' => 'success',
                    'message' => 'User berhasil di Hapus!'
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
