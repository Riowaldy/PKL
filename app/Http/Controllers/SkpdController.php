<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
use App\Admin;
use App\Skpd;
use App\Laporan;
use App\Task;
use Illuminate\Support\Facades\Auth;

class SkpdController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:skpd');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

// Controller view
    public function index()
    {
        return view('skpd');
    }
    public function SkpdLaporan()
    {
        return view('post.SkpdLaporan');
    }
    public function SkpdProfil(){
        $ulog = Auth::user();
        return view('post.SkpdProfil', compact('ulog'));
    }

// Controller create
    public function SkpdStore()
    {
        $this->validate(request(), [
            'subjek' => 'required',
            'lokasi' => 'required',
            'isi' => 'required'
        ]);
        $skpd = Auth::user()->id;
        Laporan::create([
        	'skpd_id' => $skpd,
            'subjek' => request('subjek'),
            'lokasi' => request('lokasi'),
            'isi' => request('isi')
        ]);

        return back()->with('success', 'Pengaduan berhasil dikirim');
    }

// Controller update
    public function SkpdUpdate(Request $request){
      $updatee = \DB::table('skpds')->select('id')->where('id', $request->input('id'));
      $updatee->update(['name' => $request->input('name')]);
      $updatee->update(['email' => $request->input('email')]);
      return back()->with('success');
    }

// Controller delete
}
