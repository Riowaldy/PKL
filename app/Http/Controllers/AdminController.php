<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
use App\Admin;
use App\Task;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
// Controller view
    public function index()
    {
        return view('admin');
    }

    public function AdminProject()
    {
        $posts = Post::latest()->paginate(3);
        $categories = Category::all();

        return view('post.AdminProject', compact('posts','categories'));
    }

    public function AdminShow(Post $post)
    {
        $tasks = Task::latest()->paginate(3);
        return view('post.AdminShow', compact('post','tasks'));
    }

    public function AdminTask()
    {
        $tasks = Task::latest()->paginate(3);
        return view('post.AdminTask', compact('tasks'));
    }

    public function AdminShowTask(Task $task)
    {
        return view('post.AdminShowTask', compact('task'));
    }

    public function AdminCalendar(){
        $posts = Post::all();

        return view('post.AdminCalendar', compact('posts'));
    }

    public function AdminNotification(Task $task){
        $tasks = Task::latest()->paginate(6);
        return view('post.AdminNotification', compact('tasks'));
    }

    public function AdminMember(){
        $users = User::all();

        return view('post.AdminMember', compact('users'));
    }

    public function AdminProfil(){
        $ulog = Auth::user();
        return view('post.AdminProfil', compact('ulog'));
    }

    public function DetailTask(Request $request){
      $select = \DB::table('tasks')->select('id')->where('id', $request->input('id'));
      return back()->with('success');
    }

// Controller create

    public function AdminStore()
    {
        $this->validate(request(), [
            'title' => 'required',
            'content' => 'required|min:10'
        ]);

        Post::create([
            'title' => request('title'),
            'slug' => str_slug(request('title')),
            'content' => request('content'),
            'category_id' => request('category_id')
        ]);

        return redirect() -> route('post.AdminProject')->with('success');
    }

    public function AdminTaskStore()
    {
        $this->validate(request(), [
            'judul_task' => 'required',
            'isi_task' => 'required|min:10',
            'due_date' => 'required'
        ]);
        Task::create([
            'post_id' => request('post_id'),
            'user_id' => '1',
            'judul_task' => request('judul_task'),
            'status' => 'belum selesai',
            'due_date' => request('due_date'),
            'slug' => str_slug(request('judul_task')),
            'isi_task' => request('isi_task')
        ]);
        return back()->with('success');
    }

// Controller update
    public function AdminUpdatePost(Request $request){
      $updatee = \DB::table('posts')->select('id')->where('id', $request->input('id'));
      $updatee->update(['title' => $request->input('title')]);
      $updatee->update(['content' => $request->input('content')]);
      return back()->with('success');
    }

    public function AdminUpdateTask(Request $request){
      $updatee = \DB::table('tasks')->select('id')->where('id', $request->input('id'));
      $updatee->update(['judul_task' => $request->input('judul_task')]);
      $updatee->update(['status' => $request->input('status')]);
      $updatee->update(['isi_task' => $request->input('isi_task')]);
      $updatee->update(['due_date' => $request->input('due_date')]);
      return back()->with('success');
    }

    public function AdminUpdateUser(Request $request){
      $updatee = \DB::table('users')->select('id')->where('id', $request->input('id'));
      $updatee->update(['name' => $request->input('name')]);
      $updatee->update(['status' => $request->input('status')]);
      $updatee->update(['email' => $request->input('email')]);
      return back()->with('success');
    }

    public function AdminUpdate(Request $request){
      $updatee = \DB::table('admins')->select('id')->where('id', $request->input('id'));
      $updatee->update(['name' => $request->input('name')]);
      $updatee->update(['email' => $request->input('email')]);
      return back()->with('success');
    }

// Controller delete
    public function AdminDestroyProject(Request $request)
    {
      $delete = \DB::table('posts')->select('id')->where('id', $request->input('id'));

      $delete->delete();
      return back()->with('success');
    }

    public function AdminDestroyTask(Request $request)
    {
      $delete = \DB::table('tasks')->select('id')->where('id', $request->input('id'));

      $delete->delete();
      return back()->with('success');
    }
    
    public function AdminDestroyUser(Request $request)
    {
      $delete = \DB::table('users')->select('id')->where('id', $request->input('id'));

      $delete->delete();
      return back()->with('success');
    }

}
