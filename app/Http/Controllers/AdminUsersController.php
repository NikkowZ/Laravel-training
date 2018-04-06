<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::lists('name', 'id')->all();

        Session::flash('create', 'Gebruiker succesvol aangemaakt');

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        $store = $request->all();

            if($request->file('photo_id')){

                $file = $request->file('photo_id');

                $name = $file->getClientOriginalName() . time();

                $file->move('images', $name);

                $photo = Photo::Create(['file_path'=>$name]);

                $store['photo_id'] = $photo['id'];
             }

        $store['password'] = bcrypt($request);

        User::create($store);

        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::FindOrFail($id);
        $roles = Role::lists('name', 'id')->all();

        Session::flash('edit', 'Gebruiker gewijzigd');

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::FindOrFail($id);

        if(trim($request->password) == ''){

            $input = $request->except('password');

        } else {

            $input = $request->all();

            $input['password'] = bcrypt($request->password);
        }

        if($request->file('photo_id')){

            $file = $request->file('photo_id');

            $name = $file->getClientOriginalName() . time();

            $file->move('images', $name);

            $photo = Photo::create(['file_path'=>$name]);

            $input['photo_id'] = $photo->id;
        }

        $user->update($input);

        return redirect('/admin/users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::FindOrFail($id);

        unlink(public_path() . $user->photo->file_path);

        $user->delete();

        Session::flash('deleted', 'Gebruiker verwijderd');

        return redirect('/admin/users');

    }
}
