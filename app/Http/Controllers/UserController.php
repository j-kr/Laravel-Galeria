<?php

namespace App\Http\Controllers;

use App\User;
use App\Image;
use App\Gallery;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function viewUserList()
    {

        $users = User::all();


        return view('user.user-list')
            ->with('users', $users);
    }


    public function editUser($id)
    {
        $user = User::findOrFail($id);


        return view('user.user-edit')
            ->with('user', $user);
    }

    public function doEdit(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->input('name_edit');
        $user->email = $request->input('email_edit');

        $user->save();
        return redirect('/users/list');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        
        $user->gallery()->delete();
        $user->delete();
        return redirect()->back();

    }


}
