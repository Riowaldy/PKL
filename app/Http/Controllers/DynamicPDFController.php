<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class DynamicPDFController extends Controller
{
    function indexProjectPDF()
    {
     $posts = $this->get_post_data();
     return view('dynamic_pdf')->with('posts', $posts);
    }

    function get_post_data()
    {
     $posts = DB::table('posts')
         ->limit(10)
         ->get();
     return $posts;
    }

    function pdfProjectPDF()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_post_data_to_html());
     return $pdf->stream();
    }

    function convert_post_data_to_html()
    {
     $posts = $this->get_post_data();
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
}