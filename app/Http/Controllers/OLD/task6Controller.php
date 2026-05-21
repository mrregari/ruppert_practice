<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class task6Controller extends Controller
{
    public function show(){
        $users = DB::table('users')->get();
        foreach ($users as $user){
            dump($user->first_name);
            dump($user->second_name);
        } 
    }
}
