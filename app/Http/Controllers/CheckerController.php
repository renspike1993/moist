<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CheckerController extends Controller
{
    //

    public function get_checker_requests()
    {
        $requests = DB::table('requests')
            ->join('transactions', 'requests.transaction_id', '=', 'transactions.id')
            ->join('students','transactions.student_id','=','students.id')
            ->join('files','requests.id','=','files.request_id')
            ->select('requests.*','transactions.*','students.*','files.*','files.id as fid')
            ->where('document_id', 5)
            ->get();

        return view('checker.request_list',compact('requests'));        
    }
}
