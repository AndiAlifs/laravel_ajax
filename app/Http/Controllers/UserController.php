<?php

namespace App\Http\Controllers;

use App\Http\Resources\indexNameResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $allUser = User::all();
        return indexNameResource::collection($allUser);
    }

    public function store(Request $request){
        $newUser = User::create([
            'name' => $request->name
        ]);
        return new indexNameResource($newUser);
    }

    public function delete(Request $request){
        $deleteUser = User::find($request->index);
        $deleteUser -> delete();
        return 'deletion success';
    }

    public function update(Request $request){
        $updateUser = User::find($request->index);
        $updateUser->name = $request->name;
        $updateUser->save();
        return $updateUser;
    }
}
