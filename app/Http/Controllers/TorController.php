<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TorController extends Controller
{

    public function list_tor()
    {
        $records = DB::table('etl')
            ->select('fullname', DB::raw('count(fullname) as cnt'))   // Count fullname occurrences and alias as 'cnt'
            ->groupBy('fullname')
            ->orderBy('cnt', 'desc')
            ->get();

        return view('tor.student', compact('records'));

        // echo $transcripts;
        // return view('tor.student', compact('records'));
    }


    public function view_tor($fullname)
    {
        $fname = urldecode($fullname);

        $records = DB::table('etl')
            ->select('*')
            ->where('fullname',  $fname)
            ->get();

        $data = [];


        for ($i = 0; $i < count($records); $i++) {
            $cnt = 0;
            if (($records[$i]->subA != "")) {

                $data[] = [
                    "ay" => $records[$i]->semester . ' Sem',
                    "semester" => $records[$i]->semester,
                    "subject" => $records[$i]->subA,
                    "descriptive" => $this->get_sub($records[$i]->subA),
                    "grade" => $records[$i]->gradeA,
                    "unit" => $records[$i]->unitA,
                ];
            }

            if (($records[$i]->subB != "")) {
                $data[] = [
                    "ay" => $records[$i]->ay . '-' . $records[$i]->ay + 1,
                    "semester" => '',
                    "subject" => $records[$i]->subB,
                    "descriptive" => $this->get_sub($records[$i]->subB),
                    "grade" => $records[$i]->gradeB,
                    "unit" => $records[$i]->unitB,
                ];
            }

            if (($records[$i]->subC != "")) {
                $data[] = [
                    "ay" => '',
                    "semester" => '',
                    "subject" => $records[$i]->subC,
                    "descriptive" => $this->get_sub($records[$i]->subC),
                    "grade" => $records[$i]->gradeC,
                    "unit" => $records[$i]->unitC,
                ];
            }

            if (($records[$i]->subD != "")) {
                $data[] = [
                    "ay" => '',
                    "semester" => '',
                    "subject" => $records[$i]->subD,
                    "descriptive" => $this->get_sub($records[$i]->subD),
                    "grade" => $records[$i]->gradeD,
                    "unit" => $records[$i]->unitD,
                ];
            }

            if (($records[$i]->subE != "")) {
                $data[] = [
                    "ay" => '',
                    "semester" => '',
                    "subject" => $records[$i]->subE,
                    "descriptive" => $this->get_sub($records[$i]->subE),
                    "grade" => $records[$i]->gradeE,
                    "unit" => $records[$i]->unitE,
                ];
            }

            if (($records[$i]->subF != "")) {
                $data[] = [
                    "ay" => '',
                    "semester" => '',
                    "subject" => $records[$i]->subF,
                    "descriptive" => $this->get_sub($records[$i]->subF),
                    "grade" => $records[$i]->gradeF,
                    "unit" => $records[$i]->unitF,
                ];
            }

            if (($records[$i]->subG != "")) {
                $data[] = [
                    "ay" => '',
                    "semester" => '',
                    "subject" => $records[$i]->subG,
                    "descriptive" => $this->get_sub($records[$i]->subG),
                    "grade" => $records[$i]->gradeG,
                    "unit" => $records[$i]->unitG,
                ];
            }

            if (($records[$i]->subH != "")) {
                $data[] = [
                    "ay" => '',
                    "semester" => '',
                    "subject" => $records[$i]->subH,
                    "descriptive" => $this->get_sub($records[$i]->subH),
                    "grade" => $records[$i]->gradeH,
                    "unit" => $records[$i]->unitH,
                ];
            }

            if (($records[$i]->subI != "")) {
                $data[] = [
                    "ay" => '',
                    "semester" => '',
                    "subject" => $records[$i]->subI,
                    "descriptive" => $this->get_sub($records[$i]->subI),
                    "grade" => $records[$i]->gradeI,
                    "unit" => $records[$i]->unitI,
                ];
            }

            if (($records[$i]->subJ != "")) {
                $data[] = [
                    "ay" => '',
                    "semester" => '',
                    "subject" => $records[$i]->subJ,
                    "descriptive" => $this->get_sub($records[$i]->subJ),
                    "grade" => $records[$i]->gradeJ,
                    "unit" => $records[$i]->unitJ,
                ];
            }
        }


        $data[] = [
            "ay" => 'closed',
            "semester" => '',
            "subject" => '',
            "descriptive" => '',
            "grade" => '',
            "unit" => '',
        ];


        $pages[] = null;

        $temp2[] = null;

        $cnter = 0;

        $total_row = count($data);
        $row_per_pages = 34;
        $remainder = $total_row % $row_per_pages;

        $total_pages = ($total_row - $remainder) / $row_per_pages;

        // echo "total pages : " . $total_pages . "<br>remainder : " . $remainder;


        // for ($pages = 0; $pages < $total_pages; $pages++) {
        //     for ($p = $pages * $row_per_pages; $p < ($pages * $row_per_pages) * $pages; $p++) {
        //         $data[] = $data[$p]['subject'];
        //     }
        // }

        if ($remainder > 0) {
            $total_pages++;
        }
        $add_cell = $total_pages *  $row_per_pages - count($data);


        for ($xtra_cell = 0; $xtra_cell < $add_cell; $xtra_cell++) {
            $data[] = [
                "ay" => '-',
                "semester" => '',
                "subject" => '',
                "descriptive" => '',
                "grade" => '',
                "unit" => '',
            ];
        }



        $pages = array_chunk($data, $row_per_pages);

        // for($xtra_cell = count($data) ;$xtra_cell < $row_per_pages * $total_pages;$xtra_cell ++){
        //     $data[] = [
        //         "ay" => '-',
        //         "semester" => '-',
        //         "subject" => '-',
        //         "grade" => '-',
        //         "unit" => '-',
        //     ];
        //  }

        // echo $row_per_pages * count($pages) - count($data) ;



        // echo $row_per_pages * count($pages)."<br>".count($data);
        // echo json_encode($pages);
        return view('tor.tor', compact('pages'));
    }


    public function get_sub($sub)
    {
        $subject = DB::table('subject')
            ->where('subject', $sub)
            ->select('descriptive')
            ->first();

        return $subject ? $subject->descriptive : 'N/A';
    }
}
