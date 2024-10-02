<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EncoderController extends Controller
{
    public function get_encoder_request()
    {
        $requests = DB::table('requests')
            ->join('transactions', 'requests.transaction_id', '=', 'transactions.id')
            ->join('students', 'transactions.student_id', '=', 'students.id')
            ->join('documents','requests.document_id','=','documents.id')
            ->select('requests.*','transactions.*','students.*','documents.*','requests.id as req_id')
            ->get();



        return view('encoder.request_list', compact('requests'));
    }
}
