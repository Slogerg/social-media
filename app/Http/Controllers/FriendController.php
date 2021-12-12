<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FriendController extends Controller
{
    public function index()
    {
        $id = Auth::id();
//        $users = DB::select("SELECT * FROM users_related WHERE user_id = $id");
        $related = DB::table('users_related')->where('user_id', $id)->get();
        $users = collect();
        foreach ($related as $user) {
            $users->push(User::query()->where('id',$user->related_id)->first());
        }

        $suggested = User::query()->where('id','!=',Auth::id())->get();
        return view('friends',[
            'suggested' => $suggested,
            'users'     => $users,
            ]);
    }

    public function addFriend(Request $request)
    {
        $id = Auth::id();
        DB::insert("insert into users_related (user_id,related_id) values ($id,$request->user_id)");
        return redirect()->route('friends');
    }

    public function removeFriend(Request $request)
    {
        $id = Auth::id();
        DB::table('users_related')->where('related_id',$request->user_id)->where('user_id',$id)->delete();
        return redirect()->route('friends');
    }

    public function getByUser($id)
    {
        $posts = Post::where('user_id',$id)->get();
        $user = User::where('id',$id)->first();
        return view('user-posts',['items' => $posts, 'user' => $user]);
    }
}
