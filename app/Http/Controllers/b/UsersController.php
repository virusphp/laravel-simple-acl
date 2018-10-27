<?php

namespace App\Http\Controllers\b;

use Illuminate\Http\Request;
use App\Http\Controllers\b\BackendController;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserDestroyRequest;
use App\Repository\RepoUser;
use App\User;

class UsersController extends BackendController
{
    protected $repo;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->repo = new RepoUser;
    }

    public function index(Request $req)
    {
        $users = $this->repo->getUser($req);
        $userCount = $this->repo->UserCount();
        return view('b.users.index', compact('users', 'userCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = $this->repo->user();
        return view('b.users.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        if ($this->repo->saveUser($request)) {
            $notif = $this->repo->getPesan('create');
            return redirect()->route('users.index')->with($notif);
        } else {
            $notif = $this->repo->getPesan('error');
            return redirect()->route('users.create')->with($notif);
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
        $user = User::findOrFail($id);
        if (!is_null($user)) {
            return view('b.users.edit', compact('user'));
        } else {
            return redirect()->route('users.index');
        }
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email|required|unique:users,email,' . $id,
            'password' => 'required_with:password_confirmation|confirmed'
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());
        if ($user) {
            $notif = $this->repo->getPesan('update');
        } else {
            $notif = $this->repo->getPesan('error');
        }
        return redirect()->route('users.index')->with($notif);

    //     if ($this->repo->saveUser($request, $id)) {
    //         $notif = $this->repo->getPesan('update');
    //         return redirect()->route('users.index')->with($notif);
    //    } else {
    //         $notif = $this->repo->getPesan('error');
    //         return redirect()->route('users.edit', $id)->with($notif);
    //    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDestroyRequest $request, $id)
    {
        if (!empty($id)) {
            if ($this->repo->delete($id)) {
                $notif = $this->repo->getPesan('delete');
            } else {
                $notif = $this->repo->getPesan('error');
            }
        }

        return redirect()->route('users.index')->with($notif);
    }
}
