<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormsupdateValidation;
use App\Http\Requests\ManageUsersValidation;
use App\Http\Requests\PostCreateValidation;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as DB;
use Symfony\Component\Console\Input\Input;
use Yajra\DataTables\Facades\DataTables;

use function Ramsey\Uuid\v1;

class PostController extends Controller
{
    public function createUserPost (){
        $title = "To Create Post's";
        $user  = Auth::user();
        $posts = Post::all();
        return view('posts.create',
        [
            'title' => $title,
            'user'  => $user,
            'posts' =>$posts
        ])->with('success', 'Lets Create something!');
    }


 
    public function savePost(PostRequest $request){
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

        $posts = new Post();
        $posts->title = $request->title;
        $posts->body = $request->body;
        $posts->cover_image = $fileName;
        $posts->user_id = Auth::user()->id;
        $posts->isapproved = 2;
        $res = $posts->save();

        if($res){
            return redirect()->intended(route('/'))->with('success', 'Blog is created Wait admin approval for publish');
        }
        return redirect()->intended(route('create-post'))->with('error', 'Oops something Went wrong Try agai later!');


    }

    /**
     * user edit view page link function
     */

    public function postView(Request $request, ){
        $title = 'title';
        $posts = Post::all();
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

    public function editPost($id){
        $posts = Post::find($id);

        return view('users.admin.editpost',
        [
            'posts' => $posts,

        ]);
    }


    public function updatePost(PostRequest $request, $id){
        $posts = Post::find($id);
        if($request->hasFile('cover_image')){
            $file = $request->file('cover_image');
            $fileWithExt = $file->getClientOriginalName();
            $filepathinfo  = pathinfo($fileWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileName = $filepathinfo.'_'.time().'.'.$extension;
            $path = $file->move('storage/cover_image', $fileName);
            $posts->cover_image = $fileName;
        }
     
        $posts->title = $request->title;
        $posts->body = $request->body;
        $posts->user_id = Auth::user()->id;
        $posts->isapproved = 2;
        $res = $posts->save();

        if($res){
            return redirect()->intended(route('user-post'))->with('success', 'Blog is updated successfully!');
        }
        return redirect()->intended(route('create-post'))->with('error', 'Oops something Went wrong Try again later!');


    }



    public function delete($id){
        $res = DB::delete('delete from posts where id = ?',[$id]);
        if($res){
            return redirect()->back()->with('message', 'user Deleted Successfully');
        }

    }


}
