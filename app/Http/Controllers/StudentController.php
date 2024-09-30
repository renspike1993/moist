<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function students()
    {
        $students = DB::table('students')->get();

        return view('student.student', compact('students'));
    }


    public function readCsv()
    {
        // Define the file path
        $filePath = public_path('sample.csv');

        // Open the file for reading
        if (($file = fopen($filePath, 'r')) !== false) {
            $csvData = [];

            // Loop through each row of the file
            while (($row = fgetcsv($file, 1000, ',')) !== false) {
                $csvData[] = $row; // Store each row in the array
            }

            // Close the file after reading
            fclose($file);

            // Return the data (for testing purposes)
            return $csvData; // Or you can return it to a view
        }

        // If file cannot be opened
        return "File not found or unable to open the file.";
    }



    public function store_student(Request $request)
    {
        $id = DB::table('students')->insertGetId([
            'folder_id' => $request->folder_id,
            'lname' => $request->lname,
            'fname' => $request->fname,
            'midname' => $request->midname,
            'course' => $request->course,
            // All other fields set to null
            'extname' => null,
            'sex' => null,
            'birth' => null,
            'year' => null,
            'major' => null,
            'contact' => null,
            'email' => null,
            'civil' => null,
            'student_id' => null,
            'password' => null,
            'acc_status' => null,
            'address' => null,
            'guardian' => null,
            'guardiancon' => null,
            'mother' => null,
            'father' => null,
            'sla' => null,
            'sla_section' => null,
            'sla_year' => null,
            'vaccination' => null,
            'employment' => null,
            'company' => null,
            'comlocation' => null,
            'scholarship' => null,
            'status' => null,
            'disability' => null,
            'cause' => null,
            'en_stat' => null,
            'sem' => null,
            'nationality' => null,
            'school_year' => null,
            'registered_by' => null,
            'evaluated_by1' => null,
            'assesed_by' => null,
            'validated_by1' => null,
            'exam_res' => null,
            'ex_score' => null,
            'date_registered' => null,
            'date_enrolled' => null,
            'record_status' => null,
            'curr_yr' => null,
            'birthplace' => null,
            'city_address' => null,
            'inter_school' => null,
            'inter_year' => null,
            'primary_school' => null,
            'primary_year' => null,
            'hs_school' => null,
            'hs_year' => null,
            'college_school' => null,
            'college_year' => null,
            'date_graduation' => null,
            'nstp_no' => null,
            'nstp_grad' => null,
            'approval' => null
        ]);

        DB::table('student_requirements')->insert([
            'student_id' => $id,
            'pre_add_form' => $request->has('pre_add_form') ? 1 : 0,
            'psa' => $request->has('psa') ? 1 : 0,
            'report_card' => $request->has('report_card') ? 1 : 0,
            'good_moral' => $request->has('good_moral') ? 1 : 0,
            'pic' => $request->has('pic') ? 1 : 0,
            'entrance_exam' => $request->has('entrance_exam') ? 1 : 0,
            'enrollment_form' => $request->has('enrollment_form') ? 1 : 0,
            'honorable_dismissal' => $request->has('honorable_dismissal') ? 1 : 0,
            'permanent_record' => $request->has('permanent_record') ? 1 : 0,
            'form_137' => $request->has('form_137') ? 1 : 0,
            'promissory_note' => $request->has('promissory_note') ? 1 : 0,
            'medical_records' => $request->has('medical_records') ? 1 : 0,
        ]);


        return redirect()->back()->with('success', 'Students added to folder successfully.');
    }

    public function destroy_student($id)
    {
        DB::table('students')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Deleted successfully.');
    }
}
