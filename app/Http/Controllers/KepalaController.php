<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
use App\Member;
use App\Skpd;
use App\Kepala;
use App\Task;
use Illuminate\Support\Facades\Auth;

class KepalaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:kepala');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
// Controller view
    public function index()
    {
        return view('kepala');
    }

    public function KepalaProject()
    {
        $posts = Post::latest()->paginate(3);
        $categories = Category::all();

        return view('post.KepalaProject', compact('posts','categories'));
    }

    public function KepalaShow(Post $post)
    {
        $tasks = Task::latest()->paginate(3);
        return view('post.KepalaShow', compact('post','tasks'));
    }

    public function KepalaTask()
    {
        $tasks = Task::latest()->paginate(3);
        return view('post.KepalaTask', compact('tasks'));
    }

    public function KepalaMember(){
        $users = User::all();

        return view('post.KepalaMember', compact('users'));
    }

    public function KepalaProfil(){
        $ulog = Auth::user();
        return view('post.KepalaProfil', compact('ulog'));
    }

    public function DetailTask(Request $request){
      $select = \DB::table('tasks')->select('id')->where('id', $request->input('id'));
      return back()->with('success');
    }

// Controller create


// Controller update
    public function KepalaUpdate(Request $request){
      $updatee = \DB::table('kepalas')->select('id')->where('id', $request->input('id'));
      $updatee->update(['name' => $request->input('name')]);
      $updatee->update(['email' => $request->input('email')]);
      return back()->with('success');
    }

// Controller delete
}
