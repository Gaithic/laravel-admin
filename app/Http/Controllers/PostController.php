<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateValidation;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Ramsey\Uuid\v1;

class PostController extends Controller
{
    public function createPost(){
        $title = "To Create Post's";
        $user  = Auth::user();
        return view('posts.create',
        [
            'title' => $title,
            'user'  => $user
        ])->with('success', 'Lets Create something!');
    }


    public function savePost(PostCreateValidation $request){
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
        $res = $posts->save();

        if($res){
            return redirect()->intended(route('/'))->with('success', 'Blog is created Wait admin approval for publish');
        }
        return redirect()->intended(route('create-post'))->with('error', 'Oops something Went wrong Try agai later!');


    }


    public function editPost($id){
        $post = Post::find($id);
        return view('posts.edit',
        [
            'post' => $post
        ]);
    }

    public function updatePost(Request $request, $id){
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

        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->cover_image = $fileName;
        $post->user_id = Auth::user()->id;
        $res = $post->save();

        if($res){
            return redirect()->intended(route('edit-post', ['id' => $post->id]))->with('success', 'updated successfully');
        }

    }

}
