<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
use App\Member;
use App\Skpd;
use App\Admin;
use App\Kepala;
use App\Task;
use App\Laporan;
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

    public function search(Request $request){
        $search = $request->get('search');
        $posts = DB::table('posts')->where('title', 'like', '%'.$search.'%')->paginate(5);
        return view ('post.KepalaProject', ['posts' => $posts]);
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

    public function KepalaLaporan()
    {
        $laporans = Laporan::latest()->paginate(3);
        return view('post.KepalaLaporan', compact('laporans'));
    }

    public function KepalaMember(){
        $admins = Admin::all();
        $members = Member::all();
        $skpds = Skpd::all();

        return view('post.KepalaMember', compact('skpds','members','admins'));
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
    public function KepalaUpdateAdmin(Request $request){
      $updatee = \DB::table('admins')->select('id')->where('id', $request->input('id'));
      $updatee->update(['name' => $request->input('name')]);
      $updatee->update(['status' => $request->input('status')]);
      $updatee->update(['email' => $request->input('email')]);
      return back()->with('success');
    }
    public function KepalaUpdateMember(Request $request){
      $updatee = \DB::table('members')->select('id')->where('id', $request->input('id'));
      $updatee->update(['name' => $request->input('name')]);
      $updatee->update(['status' => $request->input('status')]);
      $updatee->update(['email' => $request->input('email')]);
      return back()->with('success');
    }
    public function KepalaUpdateSkpd(Request $request){
      $updatee = \DB::table('skpds')->select('id')->where('id', $request->input('id'));
      $updatee->update(['name' => $request->input('name')]);
      $updatee->update(['status' => $request->input('status')]);
      $updatee->update(['email' => $request->input('email')]);
      return back()->with('success');
    }

// Controller delete
    public function KepalaDestroyAdmin(Request $request)
    {
      $delete = \DB::table('admins')->select('id')->where('id', $request->input('id'));

      $delete->delete();
      return back()->with('success');
    }
    public function KepalaDestroyMember(Request $request)
    {
      $delete = \DB::table('members')->select('id')->where('id', $request->input('id'));

      $delete->delete();
      return back()->with('success');
    }
    public function KepalaDestroySkpd(Request $request)
    {
      $delete = \DB::table('skpds')->select('id')->where('id', $request->input('id'));

      $delete->delete();
      return back()->with('success');
    }
}
