<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function userDashboard(Request $request){
        $title = 'Dashoard';
        $posts = Post::all();
        $posts = Post::where('user_id','=', Auth::id())->get();
        $pending = Post::where('isapproved', '=', 2);
        $reject = Post::where('isapproved', '=', 3);

      
            return view('users.status',
            [
                'title' => $title,
                'posts' => $posts,
                'pending' => $pending,
                'reject' => $reject
            ]
            );
        

        
    }




    public function viewAllUserPost(Request $request){
        $title = "All Personal Post";
        $posts = Post::all();
        $posts = Post::where('user_id','=', Auth::id())->get();
        $posts = Post::where('id', '=', $posts->id());
        return view('users.user.personal', 
        [
            'title' => $title,
            'posts' => $posts
        ]);
    }


    public function editOwnPost(){
        $title = 'Edit Post';
        $posts = Post::all();
        $posts = Post::where('user_id', '=', Auth::id())->get();
        return view('posts.editpost', 
        [
            'titl' => $title,
            'posts' => $posts
            
        ]);
    }
}
