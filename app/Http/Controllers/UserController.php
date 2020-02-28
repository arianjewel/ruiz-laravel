<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function userShow(){
    	$users = User::latest()->get()->all();
    	return view('admin.user.users',[
    		'users' => $users,
    	]);
    }

    public function userDelete($id){
    	$user = User::findOrFail($id);
    	$user->delete();

    	return back()->with('message', 'User deleted successfully!');
    }

    public function userUpdate(Request $request){
    	$user = User::findOrFail($request->id);
    	$user->role = $request->role;
    	$user->save();

    	return back()->with('message', 'User Role Successfully Updated!');
    }
}
