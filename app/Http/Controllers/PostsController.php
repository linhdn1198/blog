<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Session;
use Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        if($categories->count() == 0 || $tags->count() == 0){
            Session::flash('error', 'You must have some categories or tags before attempting to create a post.');
            return redirect()->route('home');
        }
        return view('admin.posts.create')->with('categories',$categories)->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
                [
                    'title' => 'required|min:2',
                    'featured' => 'required|image',
                    'content' => 'required|min:5',
                    'tags' => 'required'
                ],
                [
                    
                ]);
                    
        $post = new Post;
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->slug = str_slug($request->title);
        $post->content = $request->content;
        $post->user_id = Auth::id();
        
        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts',$featured_new_name);
        $post->featured = 'uploads/posts/'.$featured_new_name;
        $post->save();

        $post->tags()->attach($request->tags);
 
        $request->session()->flash('success', 'You successfully created a post!');
        return redirect()->route('post.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $post = Post::withTrashed()->where('id',$id)->first();
        return view('admin.posts.edit')
                    ->with('tags',$tags)
                    ->with('categories',$categories)
                    ->with('post',$post);

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
        $this->validate($request,
                        [
                            'title' => 'required|min:2',
                            'content' => 'required|min:5'
                        ],
                        [
                            
                        ]);
        $post = Post::withTrashed()->where('id',$id)->first();
        if ($request->hasFile('featured')) {
            $featured = $request->featured;

            $featured_new_name = time().$featured->getClientOriginalName();

            $featured->move('uploads/posts',$featured_new_name);

            $post->featured = $featured_new_name;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->user_id = Auth::id();
        $post->save();

        $post->tags()->sync($request->tags);

        Session::flash('success','You successfully updated the post!');

        return redirect()->route('post.edit',['id'=>$id]);
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
        Session::flash('success','You successfully trashed the post!');
        return redirect()->route('post.index');
    }

    public function trashed(){
        $posts = Post::onlyTrashed()->get();
        
        return view('admin.posts.trashed')->with('posts',$posts);
    }

    public function restore($id){
        $post = Post::withTrashed()->where('id',$id)->first();

        $post->restore();

        Session::flash('success', 'You successfully restored the post!');
        return redirect()->route('post.trash');
    }

    public function kill($id){
        $post = Post::withTrashed()->where('id',$id)->first();

        $post->forceDelete();

        Session::flash('success', 'You successfully delete the post!');
        return redirect()->route('post.trash');
    }
    
}
