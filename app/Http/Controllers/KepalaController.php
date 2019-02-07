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
use DB;
use PDF;
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

    // METHOD CETAK PDF PROJECT
    function indexProjectPDF()
    {
     $posts = $this->get_post_data_project();
     return view('dynamic_pdf')->with('posts', $posts);
    }

    function get_post_data_project()
    {
     $posts = DB::table('posts')
         ->limit(10)
         ->get();
     return $posts;
    }

    function pdfProjectPDF()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_post_data_project_to_html());
     return $pdf->stream();
    }

    function convert_post_data_project_to_html()
    {
     $posts = $this->get_post_data_project();
     $output = '
     <h3 align="center">Data Project</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px; text-align:center;" width="10%">Judul Project</th>
    <th style="border: 1px solid; padding:12px; text-align:center;" width="20%">Isi Project</th>
    <th style="border: 1px solid; padding:12px; text-align:center;" width="10%">Created at</th>
   </tr>
     ';  
     foreach($posts as $post)
     {
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$post->title.'</td>
       <td style="border: 1px solid; padding:12px; text-align:justify;">'.$post->content.'</td>
       <td style="border: 1px solid; padding:12px; text-align:center;">'.$post->created_at.'</td>

      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }
    // AKHIR METHOD CETAK PDF PROJECT

    // METHOD CETAK PDF TASK

    // AKHIR METHOD CETAK PDF TASK

    // METHOD CETAK PDF LAPORAN
    function indexLaporanPDF()
    {
     $laporans = $this->get_post_data_laporan();
     return view('dynamic_pdf')->with('laporans', $laporans);
    }

    function get_post_data_laporan()
    {
     $laporans = DB::table('laporans')
         ->limit(10)
         ->get();
     return $laporans;
    }

    function pdfLaporanPDF()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_post_data_laporan_to_html());
     return $pdf->stream();
    }

    function convert_post_data_laporan_to_html()
    {
     $laporans = $this->get_post_data_laporan();
     $output = '
     <h3 align="center">Data Keluhan</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px; text-align:center;" width="10%">Subjek Keluhan</th>
    <th style="border: 1px solid; padding:12px; text-align:center;" width="10%">Lokasi</th>
    <th style="border: 1px solid; padding:12px; text-align:center;" width="20%">Isi Keluhan</th>
    <th style="border: 1px solid; padding:12px; text-align:center;" width="10%">Created at</th>
   </tr>
     ';  
     foreach($laporans as $laporan)
     {
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$laporan->subjek.'</td>
       <td style="border: 1px solid; padding:12px; text-align:justify;">'.$laporan->lokasi.'</td>
       <td style="border: 1px solid; padding:12px; text-align:justify;">'.$laporan->isi.'</td>
       <td style="border: 1px solid; padding:12px; text-align:center;">'.$laporan->created_at.'</td>

      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }
    // AKHIR METHOD CETAK PDF LAPORAN



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
