<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class User extends Controller
{

    public function change_theme()
    {

        $user = Auth::user();

        if($user->theme==0){
            DB::table('users')
                ->where('id', $user->id)
                ->update(['theme' => 1]);
        }else{
            DB::table('users')
                ->where('id', $user->id)
                ->update(['theme' => 0]);
        }

        return back()->with('success', 'Theme changed succefully!');
    }

    public function index()
    {
        return view('main');
    }


    /*
    
    $users = DB::table('users')->get();

    // Find
    $user = DB::table('users')->where('name', 'John')->first();
    
    // Inserting a new user
    DB::table('users')->insert([
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => bcrypt('password'),
    ]);

    // Updating a user
    DB::table('users')
        ->where('id', 1)
        ->update(['name' => 'Jane Doe']);

    // Deleting a user
    DB::table('users')->where('id', 1)->delete();
        
    */


}
