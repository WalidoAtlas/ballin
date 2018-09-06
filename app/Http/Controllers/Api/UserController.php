<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){

    	$users = User::all();

    	return response()->json($users);
    }


	public function store(request $request){

		$user = User::create($request->all());

		return $user;
	}

	public function destroy($id){

		$user = User::find($id);

		$user->delete();

		return response()->json('okkkkk');
	}

}
