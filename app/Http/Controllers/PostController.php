<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateValidation;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            $path = $file->move(public_path('public/cover_images'), $fileName);
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


    }


}
