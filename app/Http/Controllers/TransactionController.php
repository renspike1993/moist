<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TransactionController extends Controller
{


    public function requests()
    {
        $transactions = DB::table('transactions')
            ->join('students', 'transactions.student_id', '=', 'students.id')
            ->select('students.*', 'transactions.*', 'transactions.id as trans_id')
            ->get();



        return view('forms.request_list', compact('transactions'));
    }

    public function store_transaction(Request $request)
    {
        $tracking_id = DB::table('transactions')->insertGetId([
            'tracking_no' => Str::upper(Str::random(10)),
            'student_id' => $request->student_id,
        ]);

        $documents = DB::table('documents')->get();

        return redirect()->route('get_requests', ['id' => $tracking_id, 'documents' => $documents]);
    }

    public function store_request(Request $request)
    {

        DB::table('requests')->insertGetId([
            'copies' => $request->copies,
            'transaction_id' => $request->transaction_id,
            'document_id' => $request->document_id,
            'purpose'   =>$request->purpose,
        ]);

        return redirect()->back()->with('success', 'Added sucessfully.');
    }


    public function get_requests($trans_id)
    {
        $requests = DB::table('requests')
            ->join('transactions', 'requests.transaction_id', '=', 'transactions.id')
            ->join('documents', 'requests.document_id', '=', 'documents.id')
            ->select('transactions.*', 'requests.*', 'documents.*','transactions.student_id as stud_id')
            ->where('transactions.id', '=', $trans_id)
            ->get();

        $documents = DB::table('documents')->get();

        $transaction_id = $trans_id;
        $total_amount = 0;


        $student = DB::table('transactions')
            ->join('students','transactions.student_id','=','students.id')
            ->where('transactions.id',$trans_id)
            ->first();

        foreach($requests as $request){
            $total_amount += $request->fee * $request->copies;
        }

        return view('forms.request', compact('requests', 'transaction_id', 'documents','total_amount','student'));
    }
}
