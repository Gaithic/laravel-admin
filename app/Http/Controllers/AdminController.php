<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManageUsersValidation;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Auth;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    public function manageUesers(Request $request){
        if($request->ajax()){
            $data = User::query();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="'.route('edit-users', ['id' => $row->id] ).'" class=dit btn btn-primay btn-sm>View</a>';
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


    public function editUsers( $id){
        $user = User::findOrFail($id);
        return view('users.admin.editusers',
        [
            'user' => $user
        ]);
    }

    public function updateUsers(Request $request, $id){
      $user = User::findOrFail($id);
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



        public function adminEditPost(Request $request, $id)
        {
            if($request->hasFile('cover_image')){
                $file = $request->file('cover_image');
                $fileWithExt = $file->getClientOriginalName();
                $filepathinfo  = pathinfo($fileWithExt, PATHINFO_FILENAME);
                $extension = $request->file('cover_image')->getClientOriginalExtension();
                $fileName = $filepathinfo.'_'.time().'.'.$extension;
                $path = $file->move('storage/cover_image', $fileName);
            }else{
                $fileName = 'Noimage.jpg';
            }

            $posts = Post::find($id);
            $posts->title = $request->title;
            $posts->body = $request->body;
            $posts->cover_image = $fileName;
            $posts->user_id = Auth::user()->id;
            $posts->isapproved = 2;
            $res = $posts->save();
            if($res){
                return redirect()->back()->with('success', "Updated Successfully");
            }





        }




}
