<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getByUser($id)
    {
        Post::where('user_id',Auth::id())->get();
        //todo вьюха для відображення всіх постів
//        return view('')
    }
}
