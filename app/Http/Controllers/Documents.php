<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Documents extends Controller
{
  public function get_documents()
  {
       $documents = DB::table('documents')->get();

       return view('documents.document',compact('documents'));
  }
}
