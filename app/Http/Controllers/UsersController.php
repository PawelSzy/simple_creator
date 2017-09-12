<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{

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

    public function add()
    {
        return view('add_user');
    }
}