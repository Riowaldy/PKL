<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
use App\Member;
use App\Task;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:member');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

// Controller view
    public function indexMember()
    {
        return view('member');
    }
    public function MemberProject()
    {
        $posts = Post::latest()->paginate(3);

        return view('post.MemberProject', compact('posts'));
    }
    public function MemberShow(Post $post)
    {
        return view('post.MemberShow', compact('post'));
    }
    public function MemberCalendar(){
        $posts = Post::all();

        return view('post.MemberCalendar', compact('posts'));
    }
    public function MemberNotification(){
        $tasks = Task::all();
        return view('post.MemberNotification', compact('tasks'));
    }
    public function MemberShowTask(Task $task)
    {
        return view('post.MemberShowTask', compact('task'));
    }
    public function MemberProfil(){
        $ulog = Auth::user();
        return view('post.MemberProfil', compact('ulog'));
    }

// Controller create

// Controller update
    public function MemberStatus(Request $request)
    {
      $updatee = \DB::table('tasks')->select('id')->where('id', $request->input('id'));
      $updatee->update(['status' => $request->input('status')]);
      return back()->with('success');
    }
    public function MemberUpdate(Request $request){
      $updatee = \DB::table('members')->select('id')->where('id', $request->input('id'));
      $updatee->update(['name' => $request->input('name')]);
      $updatee->update(['email' => $request->input('email')]);
      return back()->with('success');
    }
// Controller delete
}
