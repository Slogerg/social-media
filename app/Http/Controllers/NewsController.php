<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Collection;

class NewsController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        //get all related and owns
        $related = DB::table('users_related')->where('user_id', $id)->get();
        $posts = collect();

        foreach ($related as $user) {
            if(is_null(Post::query()->where('user_id',$user->related_id)->first())) {
                continue;
            }
            $posts->push(Post::query()->where('user_id',$user->related_id)->first());
        }
//        dd($posts);
        $posts->push(Post::query()->where('user_id',$id)->first());
        $posts = $posts->sortBy([
           ['created_at','desc']
        ]);

        return view('news',['items' => $posts]);
    }
}
