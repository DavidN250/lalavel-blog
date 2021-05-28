<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class DashboardController extends Controller
{
    public function __construct()
    {
    	$this->middleWare('auth');
    }


    public function index()
    {
    	$user_id = auth()->user()->id;
    	$user = User::find($user_id);
    	return view('dashboard')->with('posts',$user->posts);
    }
}
