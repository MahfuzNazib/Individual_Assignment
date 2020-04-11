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

    //Bus Counter
    public function buscounter(){
        
        return view('Manager.BusCounter');
    }


    //Edit BusCounter Info

    public function editBusCounter($id, Request $req){

        $busCounter = BusCounter::find($id);
        return view('Manager.EditBusCounter',['busCounter' => $busCounter]);
    }

    //Update Bus Counter Information

    public function updateBusCounter($id, Request $req){
        $this->validate($req,[
            'name'  => 'required',
            'manager' => 'required',
            'oparetor' =>  'required',
            'location' => 'required|min:4'
        ]);

        $newBusCounter = BusCounter::find($id);

        $newBusCounter->oparetor = $req->oparetor;
        $newBusCounter->manager  = $req->manager;
        $newBusCounter->name    = $req->name;
        $newBusCounter->location = $req->location;
        
        $newBusCounter->save();
        return redirect()->route('manager.buscounter')->with('msg', 'Bus Counter Successfully Updated');
    }

    //Delete Bus Counter

    public function deleteBusCounter($id){

        $busCounter = BusCounter::find($id);
        
        return view('Manager.DeleteBusCounter',['busCounter'=>$busCounter]);
    }

    public function removeBusCounter($id){
        $busCounter = BusCounter::find($id);
        $busCounter->delete();
        return redirect()->route('home.buscounter')->with('msg', 'Bus Counter Deleted');
    }
}
