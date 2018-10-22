<?php

namespace App\Http\Controllers\b;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        $userCount = count($users);
        return view('b.users.index', compact('users', 'userCount'));
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
    public function store(Request $request)
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
        $userCount = count($users);
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
    public function destroy($id)
    {
        $delete = User::findOrFail($id);
        $delete->delete();
        return redirect(route('users.index'));
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
}
