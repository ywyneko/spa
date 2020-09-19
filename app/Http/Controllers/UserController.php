<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users =  User::orderBy('id','desc')->get();
        return response()->json(compact('users'));
    }


    public function store(Request $request)
    {
        $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->name),
        ]);

        return response()->json(compact('user'));
    }


    public function show($id)
    {
         User::find($id);
    }


    public function update(Request $request, $id)
    {
        return User::find($id)->update($request->all());
    }


    public function destroy($id)
    {
        return User::find($id)->delete();
    }
}
