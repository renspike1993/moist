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
}
