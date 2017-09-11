<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show_all()
    {
        var_dump('test');
//        return view('user.profile', ['user' => User::findOrFail($id)]);
    }


    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
        $user = ['firstname' => "Paweł", 'surname' => 'Szymanski', 'email' =>'pawelszyman@gmail.com'];

        return view('user')->with('user', $user);
    }

    public function add()
    {

    }
}