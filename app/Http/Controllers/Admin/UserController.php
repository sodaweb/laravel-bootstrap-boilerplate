<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends AdminController
{

    /**
     * Show the form for editing the user's password.
     *
     * @return Response
     */
    public function editPassword()
    {
        $user = \Auth::user();

        return view('admin.users.password')->withUser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function updatePassword(Request $request)
    {
        $user = \Auth::user();

        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|alpha_num|min:6|max:32',
            'password_confirmation' => 'required|min:6|max:32|same:password'
        ]);

        if(!\Hash::check($request->current_password, \Auth::user()->password)){
            return redirect()->back()->withErrors('Current password typed incorrectly.');
        }

        $input = [
            'password' => bcrypt($request->password)
        ];

        $user->fill($input)->save();

        \Session::flash('status', 'Password updated successfully.');

        return redirect()->route('admin.home.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = \App\User::orderBy('id','DESC')->paginate(15);
        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'required|alpha_num|min:6|max:32',
            'password_confirmation' => 'required|min:6|max:32|same:password'
        ]);
        $input = [
            'email' => $request->email,
            'name' => $request->name,
            'admin' => $request->admin == "on" ? true : false,
            'password' => bcrypt($request->password)
            // 'password' => $request->password
        ];

        \App\User::create($input);

        \Session::flash('status', 'User added successfully.');

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = \App\User::findOrFail($id);

        return view('admin.users.show')->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = \App\User::findOrFail($id);

        return view('admin.users.edit')->withUser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $user = \App\User::findOrFail($id);

        $this->validate($request, [
            'name' => 'required',
        ]);

        $input = [
            'name' => $request->name,
            'admin' => $request->admin == "on" ? true : false,
        ];

        $user->fill($input)->save();

        \Session::flash('status', 'User updated successfully.');

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        // var_dump(\Auth::user()->id); exit;

        if($id == \Auth::user()->id){
            return redirect()->back()->withErrors('You can not remove your own user account.');
        }

        $user = \App\User::findOrFail($id);

        $user->delete();

        \Session::flash('status', 'User removed successfully.');

        return redirect()->route('admin.users.index');
    }
}
