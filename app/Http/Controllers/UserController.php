<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function userDashboard()
    {
        $posts = Post::where('is_active',1)->paginate(2);
        return view('user.index',compact('posts'));
    }
}
