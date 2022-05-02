<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    // public function mangePost(){
    //     $title = "Manage Post";
    //     $users  = User::all();
    //     $posts = Post::all();
    //     return view('users.admin.managepost' ,
    //     [
    //         'title' => $title,
    //         'posts' => $posts,
    //         'users'  => $users
    //     ])->with("success", "Let's approve the pending Post");
    // }

    // public function manageUsers(){
    //     $users = User::all();
    //     return view('users.admin.manageusers',
    //     [
    //         'users' => $users
    //     ]);
    // }

    // public function editUsers($id){
    //     $users = User::find($id);
    //     return view('users.admin.editusers',
    //     [
    //         'users' => $users
    //     ]);
    // }


    public function manageUesers(Request $request){
        if($request->ajax()){
            $data = User::query();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="'.route('edit-users', ['id' => $row->id]).'" class=dit btn btn-primay btn-sm>View</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);

        }
        return view('users.index');
    }

    public function managePost(Request $request){
        if($request->ajax()){
            $data = Post::query();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="'.route('edit-post', ['id' => $row->id]).'" class=dit btn btn-primary btn-sm>view</a>';
                return $btn;
            })
            ->editColumn('cover_image', function($row){
                if($row->cover_image){
                    return '<img src="/storage/cover_image/'.$row->cover_image .'" class="img-fluid" alt="'.$row->title.'">';
                }
            })
         
            ->rawColumns(['cover_image', 'action', 'body'])
            ->make(true);

        }
        return view('posts.index');
    }


    public function editUsers($id){
        $user = User::find($id);
        return view('users.admin.editusers',
        [
            'user' => $user
        ]);
    }

    public function saveUsers(Request $request, $id){
      $user = User::find($id);
      $user->username = $request->username;
      $user->email  = $request->email;
      $user->contact = $request->contact;
      $res = $user->save();
      if($res){
          return redirect()->intended(route('edit-users', ['id' => $user->id]))->with('success', 'User Updated Successfully');
      }else{
          return redirect()->intended(route('edit-users', ['id' => $user->id]))->with('error', 'Oops Something Went Wrong');
      }

    }
}
