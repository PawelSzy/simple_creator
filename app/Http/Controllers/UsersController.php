<?php
namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use App\Http\Controllers\Controller;
use Session;


class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['edit', 'edit_user', 'add', 'add_user', 'delete']]);
    }
    /*
     * @return Response
     */
    public function show_all()
    {
        $users = User::all();
        return view('users')->with('users', $users);
    }


    /**
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user')->with('user', $user);
    }

    /**
    * @param  int  $id
    * @return Response
    */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user')->with('user', $user);
    }

    public function edit_user(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect('/');
    }

    public function add()
    {
        return view('add_user');
    }

    public function add_user(UserRequest $request)
    {
        $input = User::create($request->all());
        return redirect('/');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        Session::flash('flash_message', 'Uzytkownik zostal skasowany!');

        return redirect('/');
    }
}