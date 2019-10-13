<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Category;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::where('created_at', '>', now()->firstOfMonth())
                    ->groupBy('date')
                    ->orderBy('date')
                    ->get(array(
                        DB::raw('Date(created_at) as date'),
                        DB::raw('COUNT(*) as "user"')
                    ));
        $posts = Post::join('categories', 'posts.category_id', '=', 'categories.id')
                ->groupBy('category_id')
                ->get(array(
                    DB::raw('name as name'),
                    DB::raw('COUNT(*) as "count"')
                ));
        $dates = [];
        $countUsers = [];
        $nameCategories = [];
        $countPosts = [];
        foreach ($users as $user) {
            array_push($dates, date_format(date_create($user->date), 'd/m/y'));
            array_push($countUsers, $user->user);
        }
        foreach ($posts as $post) {
            array_push($nameCategories, $post->name);
            array_push($countPosts, $post->count);
        }
        $dates = json_encode($dates);
        $countUsers = json_encode($countUsers);
        $nameCategories = json_encode($nameCategories);
        $countPosts = json_encode($countPosts);
        return view('admin.dashboard', compact('dates', 'countUsers', 'nameCategories', 'countPosts'))->with('posts_count',Post::all()->count())
                                    ->with('trashed_count',Post::onlyTrashed()->get()->count())
                                    ->with('users_count',User::all()->count())
                                    ->With('categories_count',Category::all()->count());
    }

    public function users(Request $request)
    {
        $startDay = $request->startDay;
        $endDay = $request->endDay;
        $users = User::select(DB::raw('Date(created_at) as date'), DB::raw('COUNT(*) as "user"'))
                        ->whereBetween('created_at', [$startDay, $endDay])
                        ->groupBy('date')
                        ->orderBy('date', 'ASC')
                        ->get();
        $dates = [];
        $countUsers = [];
        foreach ($users as $user) {
            array_push($dates, date_format(date_create($user->date), 'd/m/y'));
            array_push($countUsers, $user->user);
        }
        $data['dates'] = json_encode($dates);
        $data['countUsers'] = json_encode($countUsers);
        
        return $data;
    }

    public function getUsers()
    {
            $users = User::where('created_at', '>', now()->firstOfMonth())
                ->groupBy('date')
                ->orderBy('date')
                ->get(array(
                    DB::raw('Date(created_at) as date'),
                    DB::raw('COUNT(*) as "user"')
                ));

        $dates = [];
        $countUsers = [];

        foreach ($users as $user) {
            array_push($dates, date_format(date_create($user->date), 'd/m/y'));
            array_push($countUsers, $user->user);
        }

        $data['dates'] = json_encode($dates);
        $data['countUsers'] = json_encode($countUsers);

        return $data;
    }
}
