<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('user_id', auth()->id())->get();
        return view('dashboard.blog.post',compact('posts'));
    }


    public function merchantHome()
    {
        $posts = Post::all();
        return view('dashboard.blog.post',compact('posts'));
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.blog.addPost');
    }


    public function postValidate($data)
    {
      return $data->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->postValidate($request);

        $status = 0;
        if($request->published_at){
            $status = 1;
        }

        $imageUrl = null;

        if ($request->file('image')) {
            $imageName = time().'.'.$request->file('image')->getClientOriginalExtension();
            $imageUrl = 'images/'.$imageName;
            
            $request->file('image')->move(public_path('images'), $imageName);
    
        }

        $postData = [
            'user_id' => auth()->user()->id,
            'image' => $imageUrl,
            'title' => $request->title,
            'content' => $request->content,
            'published_at' => $status,
        ];


        $post = Post::create($postData);

        if($post){
            return redirect()->route('user.post.index')->with('success','Data Added Successfully..!');
        }else{
            return back()->with('error','Something Went Wrong...!');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
       // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.blog.editPost',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->postValidate($request);

        $status = 0;
        if($request->published_at){
            $status = 1;
        }

        $imageUrl = $post->image;

        if($request->file('image')){

            if($post->image){
                unlink(public_path($post->image));
            }

            
            if ($request->file('image')->isValid()) {
                $imageName = time().'.'.$request->file('image')->getClientOriginalExtension();
                $imageUrl = 'images/'.$imageName;
                
                $request->file('image')->move(public_path('images'), $imageName);
        
            }
        }

        $postData = [
            'title' => $request->title,
            'image' => $imageUrl,
            'content' => $request->content,
            'published_at' => $status,
        ];

        $post->update($postData);

        if($post){
            return redirect()->route('user.post.index')->with('success','Data Added Successfully..!');
        }else{
            return back()->with('error','Something Went Wrong...!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        if($post){
            return redirect()->route('user.post.index')->with('success','Data Deleted Successfully..!');
        }else{
            return back()->with('error','Something Went Wrong...!');
        }
    }
}
