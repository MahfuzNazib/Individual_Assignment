<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\User;

class HomeController extends Controller
{
    public function index(){
        return view('Home.index');
    }

    public function viewUserList(){
        // $studentList = Student::all(); //All Data
        $userList = User::paginate(5); //Pagination Data
        return view('Home.View_User',['std'=>$userList]);
    }

    public function createUser(){
        return view('Home.createUser');
    }

    public function editUser($id, Request $req){
        $studentList = Student::find($id);    
        return view('home.editUser',$studentList);
    }

    public function update($id, Request $req){
        $student = Student::find($id);

        $student->name = $req->name;
        $student->dept = $req->dept;
        $student->cgpa = $req->cgpa;

        $student->save();

        return redirect()->route('home.viewUserList')->with('msg','Student Successfully Updated');
    }

    public function insertUser(Request $req){

        //Validation
        $this->validate($req,[
            'name' => 'required',
            'dept' => 'required',
            'cgpa' => 'required'
        ]);
        $student = new Student;

        $student->name = $req->name;
        $student->dept = $req->dept;
        $student->cgpa = $req->cgpa;

        $student->save();

        return redirect()->route('home.createUser')->with('msg','Student Successfully Added');
    }

    public function delete($id, Request $req){
        Student::find($id)->delete();
        return redirect()->route('home.viewUserList')->with('msgDlt','Student Successfully Deleted');
    }
}
