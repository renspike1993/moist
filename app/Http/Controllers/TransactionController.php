<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TransactionController extends Controller
{


    public function transactions()
    {
        $transactions = DB::table('transactions')
            ->join('students', 'transactions.student_id', '=', 'students.id')
            ->select('students.*', 'transactions.*', 'transactions.id as trans_id')
            ->get();

        $students = DB::table('students')
            ->select('students.id', 'students.lname', 'students.fname', 'students.midname', 'students.course')
            ->orderBy('students.lname')
            ->get();

        return view('forms.request_list', compact('transactions', 'students'));
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

    public function update_transaction(Request $request)
    {
        DB::table('transactions')
            ->where('id', $request->transaction_id)
            ->update(
                [
                    'or_num' => $request->or_number,
                    'or_date' => $request->or_date
                ],
            );

        return redirect()->back()->with('success', 'Paid Sucessfully.');
    }

    public function store_request(Request $request)
    {

        DB::table('requests')->insertGetId([
            'copies' => $request->copies,
            'transaction_id' => $request->transaction_id,
            'document_id' => $request->document_id,
            'purpose'   => $request->purpose,
        ]);

        return redirect()->back()->with('success', 'Added sucessfully.');
    }


    public function get_requests($trans_id)
    {
        $requests = DB::table('requests')
            ->join('transactions', 'requests.transaction_id', '=', 'transactions.id')
            ->join('documents', 'requests.document_id', '=', 'documents.id')
            ->select('transactions.*', 'requests.*', 'documents.*', 'transactions.student_id as stud_id')
            ->where('transactions.id', '=', $trans_id)
            ->get();

        $documents = DB::table('documents')->get();

        $transaction  = DB::table('transactions')
            ->where('id', $trans_id)
            ->first();

        $transaction_id = $trans_id;
        $total_amount = 0;


        $student = DB::table('transactions')
            ->join('students', 'transactions.student_id', '=', 'students.id')
            ->where('transactions.id', $trans_id)
            ->first();

        foreach ($requests as $request) {
            $total_amount += $request->fee * $request->copies;
        }

        return view('forms.request', compact('requests', 'transaction_id', 'documents', 'total_amount', 'student'));
    }


    public function request_dates()
    {
        $requests = DB::table('transactions')
            ->select('transactions.or_date')
            ->where('transactions.or_date', '!=', null)
            ->groupBy('transactions.or_date')
            ->orderBy('transactions.or_date', 'desc')
            ->get();

        foreach ($requests as $req) {

            $for_signature = DB::table('requests')
                ->join('transactions', 'requests.transaction_id', '=', 'transactions.id')
                ->where('transactions.or_date', $req->or_date)
                ->where('requests.status', '=', 1)
                ->count();

            $on_process = DB::table('requests')
                ->join('transactions', 'requests.transaction_id', '=', 'transactions.id')
                ->where('transactions.or_date', $req->or_date)
                ->where('requests.status', '=', 2)
                ->count();

            $checking_verification = DB::table('requests')
                ->join('transactions', 'requests.transaction_id', '=', 'transactions.id')
                ->where('transactions.or_date', $req->or_date)
                ->where('requests.status', '=', 3)
                ->count();

            $ready_to_pick_up = DB::table('requests')
                ->join('transactions', 'requests.transaction_id', '=', 'transactions.id')
                ->where('transactions.or_date', $req->or_date)
                ->where('requests.status', '=', 4)
                ->count();

            $claimed = DB::table('requests')
                ->join('transactions', 'requests.transaction_id', '=', 'transactions.id')
                ->where('transactions.or_date', $req->or_date)
                ->where('requests.status', '=', 5)
                ->count();

            $req->for_signature = $for_signature;
            $req->on_process = $on_process;
            $req->checking_verification = $checking_verification;
            $req->ready_to_pick_up = $ready_to_pick_up;
            $req->claimed = $claimed;
        }


        // echo $requests;
        return view('requests.list', compact('requests'));
    }

    public function get_request_by_status($d, $status)
    {
        // echo $d;

        $requests = DB::table('transactions')
            ->join('requests', 'transactions.id', '=', 'requests.transaction_id')
            // ->join('transactions','requests.transaction_id','=','requests.transaction_id')
            ->join('documents', 'requests.document_id', '=', 'documents.id')
            ->join('students', 'transactions.student_id', '=', 'students.id')
            ->select('requests.*', 'documents.*', 'transactions.*', 'students.fname', 'students.lname', 'requests.id as req_id')
            ->where('transactions.or_date', $d)
            ->where('requests.status', $status)
            ->where('or_date', '!=', null)
            ->get();

        // echo $requests;
        return view('requests.request_status', compact('requests'));
    }

    public function update_request_status(Request $request)
    {

        $stat = 1;

        ($request->button == "Processing") ? $stat = 2 : '';
        ($request->button == "Checking") ? $stat = 3 : '';
        ($request->button == "Releasing") ? $stat = 4 : '';

        foreach ($request->reqs as $r) {
            DB::table('requests')
                ->where('id', $r)
                ->update(['status' => $stat]);
        }

        return redirect()->route('request_dates')->with('success', 'Updated successfully.');


    }
}
