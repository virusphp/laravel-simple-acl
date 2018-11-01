<?php

namespace App\Http\Controllers\b;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserDestroyRequest;
use App\Http\Requests\UserRequest;
use App\User;
use App\Role;

class UserController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('posts')->orderBy('name', 'asc')
            ->whereNotBetween('id', [1, 2])
            ->paginate($this->limit);
        $userCount = User::count();
        $role = Role::where('id', '!=', 1)->pluck('name', 'id');
        return view('b.users.index', compact('users', 'userCount', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $role = User::create($data);
        $role->roles()->attach($request->role_id);
        return redirect(route('users.index'));
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
        $edit = User::findOrFail($id);
        $users = User::paginate(10);
        $userCount = User::count();
        return view('b.users.index', compact('users', 'userCount', 'edit'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $users = User::find($id);
        $data = $request->all();
        $users->update($data);
        $users->roles()->sync($request->role_id);
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDestroyRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $delOption = $request->delete_option;
        $selectUser = $request->selected_user;

        if ($delOption == "delete") {
            // hapus tulisan
            $user->posts()->withTrashed()->forceDelete();
            $notif = $this->notif('success_delete');
            // hapus userk
        } else if($delOption == "attribute") {
            $user->posts()->update(['user_id' => $selectUser]);
            $notif = $this->notif('success_attribute');
        }
        $user->delete();
        return redirect(route('users.index'))->with($notif);
    }

    public function confirm($id)
    {
        $user = User::findOrFail($id);
        $users = User::where('id','!=', $user->id)->pluck('name', 'id');
        return view('b.users.confirm', compact('user', 'users'));
    }

    public function password($id)
    {
        $password = User::findOrFail($id);
        $users = User::paginate(10);
        $userCount = count($users);
        return view('b.users.index', compact('users', 'userCount', 'password'));
    }

    public function gantiPassword(Request $request, $id)
    {
        $password = User::find($id);
        $data['password'] = bcrypt($request->password);
        $password->update($data);
        return redirect(route('users.index'));
    }

    public function notif($nilai)
    {
        if ($nilai == 'success_delete') {
            return [
                'alert-type' => 'warning',
                'message' => 'Konten dan user di hapus semua' 
            ];
        } else {
            return [
                'alert-type' => 'warning',
                'message' => 'Konten telah di pindahkan ke user terpilih' 
            ];
        }
    }
}
