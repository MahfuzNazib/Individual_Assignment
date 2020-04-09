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

    public function editUser($userId, Request $req){
        $user = User::find($userId);    
        return view('home.editUser',$user);
    }

    public function update($userId, Request $req){
        $user = User::find($userId);

        $user->username = $req->uname;
        $user->password = $req->password;
        // $suser->cgpa = $req->cgpa;

        $user->save();

        return redirect()->route('home.viewUserList')->with('msg','User Successfully Updated');
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

    public function delete($userId, Request $req){
        User::find($userId)->delete();
        return redirect()->route('home.viewUserList')->with('msgDlt','User Successfully Deleted');
    }
}
