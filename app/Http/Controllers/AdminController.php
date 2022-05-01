<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class AdminController extends Controller
{
    public function mangePost(){
        $title = "Manage Post";
        $users  = User::all();
        $posts = Post::all();
        return view('users.admin.managepost' ,
        [
            'title' => $title,
            'posts' => $posts,
            'users'  => $users
        ])->with("success", "Let's approve the pending Post");
    }

    public function manageUsers(){
        $users = User::all();
        return view('users.admin.manageusers',
        [
            'users' => $users
        ]);
    }

    public function editUsers($id){
        $users = User::find($id);
        return view('users.admin.editusers',
        [
            'users' => $users
        ]);
    }
}
