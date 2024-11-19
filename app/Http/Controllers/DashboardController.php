<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function summary()
    {

        $summary = DB::table('documents')
            ->get();


        foreach ($summary as $s) {

            $for_signature = DB::table('requests')
                ->where('status', '=', 1)
                ->where('document_id', $s->id)
                ->count();

            $on_process = DB::table('requests')
                ->where('status', '=', 2)
                ->where('document_id', $s->id)
                ->count();

            $checking_verification = DB::table('requests')
                ->where('status', '=', 3)
                ->where('document_id', $s->id)
                ->count();

            $ready_to_pick_up = DB::table('requests')
                ->where('status', '=', 4)
                ->where('document_id', $s->id)
                ->count();

            $claimed = DB::table('requests')
                ->where('status', '=', 5)
                ->where('document_id', $s->id)
                ->count();


            $copies = DB::table('requests')
            ->select(DB::raw('count(requests.copies) as total_copies'))
            ->where('document_id', $s->id)
            ->first();

            $s->for_signature = $for_signature;
            $s->on_process = $on_process;
            $s->checking_verification = $checking_verification;
            $s->ready_to_pick_up = $ready_to_pick_up;
            $s->claimed = $claimed;
            $s->copies = (int)$copies->total_copies ?? 0;
        }
        return view('dashboard.dashboard', compact('summary'));
    }

    // public function 

}
