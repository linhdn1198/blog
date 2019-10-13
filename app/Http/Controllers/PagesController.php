<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;
use App\Post;
use App\Tag;
class PagesController extends Controller
{
    function __construct(){
        view()->share('settings',Setting::first());
        view()->share('tags',Tag::all());
    }
    public function index(){
        return view('layouts.page')
                            ->with('categories',Category::all())
                            ->with('posts',Post::orderBy('created_at','desc')->get());

    }

    public function singlePost($slug){

        $post = Post::where('slug',$slug)->first();
        $next_id = Post::where('id','>',$post->id)->min('id');
        $prev_id = Post::where('id','<',$post->id)->max('id');

        $next = Post::find($next_id);
        $prev = Post::find($prev_id);

        return view('single')->with('post',$post)
                            ->with('next',$next)
                            ->with('prev',$prev)
                            ->with('categories',Category::take(5)->get());
    }

    public function category($id){
        $category = Category::find($id);
    
        return view('category')->with('category',$category)
                                ->with('categories',Category::take(5)->get());
    }

    public function tag($id){
        $tag = Tag::find($id);

        return view('tag')->with('tag',$tag);
    }
}
