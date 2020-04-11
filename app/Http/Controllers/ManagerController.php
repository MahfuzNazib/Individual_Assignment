<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\BusCounter;
use DB;
use App\Bus;

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

    //Bus Counter Search
    function action(request $request){
        if($request->ajax()){
            $output = '';
            $query = $request->get('query');
            // error_log($query);
            if($query != ''){
                $data = DB::table('bus_counters')
                        -> where('name','like','%'. $query .'%')
                        ->orWhere('id','like','%'.$query.'%')
                        ->orWhere('location','like','%'.$query.'%')
                        ->get();
            }
            else{
                $data = DB::table('bus_counters')->get();
            }
            $total_row = $data->count();
            if($total_row > 0){
                foreach($data as $row){
                    $output .= '
                        <tr>
                            <td>'.$row->id.'</td>
                            <td>'.$row->oparetor.'</td>
                            <td>'.$row->manager.'</td>
                            <td>'.$row->name.'</td>
                            <td>'.$row->location.'</td>
                            <td>
                                <a href="/manager/editBusCounter/'.$row->id.'">
                                    <input type="submit" class="btn btn-info" value="Edit">
                                </a>

                                <a href="/manager/deleteBusCounter/'.$row->id.'">
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </a>
                            </td>
                        </tr>
                    ';
                }
            }
            else{
                $output = '
                    <tr>
                        <td align="center" colspan="5"> No Data Found  </td>
                    </tr>
                ';
            }

            $data = array(
                'table_data'    => $output
            );

            echo json_encode($data);
        }
    }

    //Add New Bus

    public function addBus(){
        return view('Manager.AddBus');
    }

    public function insertBus(Request $req){
        $this->validate($req,[
            'name' => 'required',
            'oparetor' => 'required',
            'location' => 'required',
            'seats' => 'required'
        ]);
        
        $newbus = new Bus();
        $newbus->name = $req->name;
        $newbus->oparetor = $req->oparetor;
        $newbus->location = $req->location;
        $newbus->seats = $req->seats;

        $newbus->save();

        return redirect()->route('manager.addBus')->with('msg','Bus Added Done');

    }

    //Bus List 

    public function busList(){
        return view('Manager.BusList');
    }
}
