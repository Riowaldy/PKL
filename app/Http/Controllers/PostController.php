<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
use App\Task;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
	public function index()
	{
		$posts = Post::latest()->paginate(3);

		return view('post.index', compact('posts'));
	}
    public function calendar(){
        $posts = Post::all();

        return view('post.calendar', compact('posts'));
    }
	public function notification(){
        $tasks = Task::where('user_id',Auth::user()->id)->get();
        return view('post.notification', compact('tasks'));
	}
    public function portfolio(){
        $tasks = Task::where('status','sudah selesai')->get();
        return view('post.portfolio', compact('tasks'));
    }
    public function task()
    {
        $tasks = Task::latest()->paginate(3);
        return view('post.task', compact('tasks'));
    } 
    public function searchcontent(){
        $query = request::get('cari');
        $tasks = Task::where('judul_task', 'LIKE', '%'.query.'%')->get();
        return view('post.searchcontent', compact('tasks', 'query'));
    }
    public function member(){
        $users = User::all();

        return view('post.member', compact('users'));
    }
	
    public function profil(){
        $ulog = Auth::admin();
        return view('post.profil', compact('ulog'));
    }

    public function updatepro(Request $request){
      $updatee = \DB::table('admins')->select('id')->where('id', $request->input('id'));
      $updatee->update(['name' => $request->input('name')]);
      $updatee->update(['email' => $request->input('email')]);
      return back()->with('success', 'Profil Berhasil Diubah');
    }

    public function update3(Request $request){
      $updatee = \DB::table('posts')->select('id')->where('id', $request->input('id'));
      $updatee->update(['title' => $request->input('title')]);
      $updatee->update(['content' => $request->input('content')]);
      return back()->with('success', 'Project Berhasil Diubah');
    }

    public function update1(Request $request){
      $updatee = \DB::table('tasks')->select('id')->where('id', $request->input('id'));
      $updatee->update(['judul_task' => $request->input('judul_task')]);
      $updatee->update(['status' => $request->input('status')]);
      $updatee->update(['isi_task' => $request->input('isi_task')]);
      $updatee->update(['due_date' => $request->input('due_date')]);
      return back()->with('success', 'Project Berhasil Diubah');
    }

    public function update2(Request $request){
      $updatee = \DB::table('users')->select('id')->where('id', $request->input('id'));
      $updatee->update(['name' => $request->input('name')]);
      $updatee->update(['status' => $request->input('status')]);
      $updatee->update(['email' => $request->input('email')]);
      return back()->with('success', 'Project Berhasil Diubah');
    }

    public function update4(Request $request)
    {
      $updatee = \DB::table('tasks')->select('id')->where('id', $request->input('id'));
      $updatee->update(['status' => $request->input('status')]);
      return back()->with('success');
    }

    public function create()
    {
    	$categories = Category::all();

    	return view('post.create', compact('categories'));
    }

    public function store()
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

    	return redirect() -> route('post.index')->with('success');
    }
    public function taskstore()
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
        return back()->with('success', 'Task Berhasil Ditambahkan');
    }

    public function createtask(Post $post)
    {   
        
        $users = User::all();
        return view('post.createtask', compact('users', 'post'));
    }

    public function show(Post $post)
    {
    	return view('post.show', compact('post'));
    }

    public function showtask(Task $task)
    {
        return view('post.showtask', compact('task'));
    }  

    public function destroy(Request $request)
    {
      $delete = \DB::table('posts')->select('id')->where('id', $request->input('id'));

      $delete->delete();
      return back()->with('success');
    }

    public function destroytask(Request $request)
    {
      $delete = \DB::table('tasks')->select('id')->where('id', $request->input('id'));

      $delete->delete();
      return back()->with('success');
    }

    public function destroyuser(Request $request)
    {
      $delete = \DB::table('users')->select('id')->where('id', $request->input('id'));

      $delete->delete();
      return back()->with('success');
    }
}
