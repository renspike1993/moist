<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class FileController extends Controller
{
    public function upload_file(Request $request)
    {
        // Validate both the 'tor' and 'form9' fields
        $request->validate([
            'tor' => 'required|mimes:docx|max:4096',
            'form9' => 'required|mimes:xlsx|max:4096',
        ]);

        // Store the TOR file
        $torPath = $request->file('tor')->store('documents', 'public');
        $torOriginalName = $request->file('tor')->getClientOriginalName();

        // // Store the Form 9 file
        $form9Path = $request->file('form9')->store('documents', 'public');
        $form9OriginalName = $request->file('form9')->getClientOriginalName();


        // Insert the file details into the 'files' table
        DB::table('files')->upsert([
            [
                'tor_path' => $torPath,
                'tor_name' => $torOriginalName,
                'form9_path' => $form9Path,
                'form9_name' => $form9OriginalName,
                'request_id' => $request->request_id,
            ]
        ], 
        // Columns to check for conflicts (e.g., update if 'request_id' already exists)
        ['request_id'], 
        // Columns to update if a conflict occurs
        ['tor_path', 'tor_name', 'form9_path', 'form9_name']
        );
        
        // Return back with success message
        return back()->with('success', 'Files uploaded successfully.');
    }

    
}
