<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleWare('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->get();
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image'=>'image|nullable|max:1999'
        ]);

        #handle Image

        if ($request->hasFile('cover_image')) {
            #Get file name with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            #Get just file name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);

            #Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            #Upload image

            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);


        } else {
            $fileNameToStore ='noimage.jpg';
        }
        


       #create Post

       $post = new Post;

       $post->title = $request->input('title');
       $post->body = $request->input('body');
       $post->user_id = auth()->user()->id;
       if ($request->hasFile('cover_image')) {
            $post->cover_image = $fileNameToStore;
        }
       $post->save();

       return redirect('/posts')->with('success','Post Created Successifully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post',$post);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        if (auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('error','You can edit only your posts');
        }
        return view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

       $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

       $post = Post::find($id);
               #handle Image

        if ($request->hasFile('cover_image')) {
            #Get file name with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            #Get just file name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);

            #Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            #Upload image

            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);


        } else {
            $fileNameToStore ='noimage.jpg';
        }

       $post->title = $request->input('title');
       $post->body = $request->input('body');
       $post->cover_image = $fileNameToStore;
       $post->save();

       return redirect('/posts/'.$id)->with('success','Post Updated Successifully !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $post = Post::find($id);
       $post->delete();

       if (auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('error','You can delete only your posts');
        }

       return redirect('/posts')->with('success','Post Deleted Completely !!');
    }
}
