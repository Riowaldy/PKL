<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
use App\Membertask;
use App\Member;
use App\Admin;
use App\Skpd;
use App\Task;
use App\Laporan;
use DB;
use Calendar;
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
        $members = Member::all();
        return view('post.AdminShow', compact('post','tasks','members'));
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
        $events = Task::get();
        $event_list = [];
        foreach ($events as $key => $event) {
          $event_list[] = Calendar::event(
          $event->judul_task,
          true,
          new \DateTime($event->start),
          new \DateTime($event->due_date.'+1 day')
          );
        }
        $calendar_details = Calendar::addEvents($event_list);
        
        return view('post.AdminCalendar', compact('calendar_details'));
    }

    public function AdminNotification(Task $task){
        $tasks = Task::latest()->paginate(6);
        return view('post.AdminNotification', compact('tasks'));
    }

    public function AdminMember(){
        $members = Member::all();
        $skpds = Skpd::all();

        return view('post.AdminMember', compact('skpds','members'));
    }

    public function AdminProfil(){
        $ulog = Auth::user();
        return view('post.AdminProfil', compact('ulog'));
    }

    public function AdminLaporan()
    {
        $laporans = Laporan::latest()->paginate(3);
        return view('post.AdminLaporan', compact('laporans'));
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
            'judul_task' => request('judul_task'),
            'status' => 'belum selesai',
            'start' => request('start'),
            'due_date' => request('due_date'),
            'slug' => str_slug(request('judul_task')),
            'isi_task' => request('isi_task')
        ]);
        return back()->with('success');
    }

    public function AdminAddStore()
    {
        $this->validate(request(), [
            'member_id' => 'required',
            'task_id' => 'required'
        ]);
        Membertask::create([
            'member_id' => request('member_id'),
            'task_id' => request('task_id')
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
      $updatee->update(['start' => $request->input('start')]);
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
