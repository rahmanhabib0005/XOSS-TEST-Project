<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->where('published_at',1)->orderBy('id','desc')->limit(6)->get();
        return view('frontend.home.home',compact('posts'));
    }


    public function blog(Request $request)
    {
        if($request->has('search')){
            $posts = Post::where('title','Like',"%$request->search%")->orWhere('content','Like', "%$request->search%")->where('published_at',1)->orderBy('id','desc')->paginate();
        }else{
            $posts = Post::with('user')->where('published_at',1)->paginate(6);
        }
        return view('frontend.blog.blog',compact('posts'));
    }


    public function blog_details($id)
    {
        $blog = Post::with('comments')->find($id);
        return view('frontend.blog.blogDetails',compact('blog'));
    }

    public function postComment(Request $request)
    {
        $request->validate([
            'post_id' => 'required',
            'name' => 'required',
            'comment' => 'required',
        ]);

        $commentData = [
            'post_id' => $request->post_id,
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
        ];

        Comment::create($commentData);
         
        return back()->with(['success' => 'Comment Added Successfully...!']);

    }

}
