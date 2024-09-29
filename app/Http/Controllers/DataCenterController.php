<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DataCenterController extends Controller
{
    public function get_cabinets()
    {
        $cabinets = DB::table('cabinets')->get();
        return view('data_center.cabinet', compact('cabinets'));
    }

    public function get_folders()
    {
        $folders = DB::table('folders')
            ->join('cabinets', 'folders.cabinet_id', '=', 'cabinets.id')
            ->select('cabinets.*', 'folders.*')
            ->get();

        $cabinets = DB::table('cabinets')->get();

        return view('data_center.folder', compact('folders', 'cabinets'));
    }


    public function get_specific_cabinet()
    {
    }

    public function get_specific_folder()
    {
    }

    public function get_folder_student($id)
    {
        $students = DB::table('students')
            ->select('id', 'lname', 'fname', 'course')
            ->get();
        $folder_id = $id;

        return view('data_center.folder_student', compact('students', 'folder_id'));
    }


    public function add_student_to_folder(Request $request)
    {
        $request->validate([
            'folder_id' => 'required|integer',
            'selected_students' => 'required|array',
        ]);

        // Perform a bulk update using the selected IDs
        DB::table('students')
            ->whereIn('id', $request->selected_students)
            ->update(['folder_id' => $request->folder_id]);

        // Optionally, you can redirect or return a response
        return redirect()->back()->with('success', 'Students added to folder successfully.');
    }

    public function open_folder($id)
    {

        $students = DB::table('students')
            ->join('folders', 'students.folder_id', '=', 'folders.id')
            ->where('folders.id', $id)
            ->get();

        $folder = DB::table('folders')
            ->where('id', $id)
            ->first();

        return view('data_center.folder_content', compact('students', 'folder'));
    }


    public function create_cabinet(Request $request)
    {

        DB::table('cabinets')->insert([
            'name' => $request->cabinet_name,
        ]);

        return back()->with('success', 'Cabinet successfully created.');
    }


    public function create_folder(Request $request)
    {
        DB::table('folders')->insert([
            'folder_name' => $request->folder_name,
            'cabinet_id' => $request->cabinet_id,
        ]);
        return back()->with('success', 'Folder successfully created.');
    }
}
