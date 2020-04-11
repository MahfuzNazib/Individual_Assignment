<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

class ManagerController extends Controller
{
    public function index(){
        return view('Manager.index');
    }

    //Bus Manager List

    public function busManagerList(){

        $managerList = User::where( 'type' , 'Manager')->get();
        error_log($managerList);
        return view('Manager.ManagerList',['managerList' => $managerList]);
    }
}
