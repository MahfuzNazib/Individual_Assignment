<?php

namespace App\Http\Controllers;

use PhpParser\Node\Expr\FuncCall;
use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(){
        return view('Login.index');
    }

    public function  verifyUser(Request $req){

        //Null Validation
        $this->validate($req,[
            // 'email' => 'required',
            'password' => 'required'
        ]);
        $user = User::where('username',$req->username)
                    ->where('password',$req->password)
                    ->first();
        error_log($user);
        if($user != null){

            if($user['type'] == "Admin"){
                $req->session()->put('username', $req->username);
                return redirect()->route('home.index');
            }
            if($user['type'] == "Manager"){
                $req->session()->put('username', $req->username);
                return redirect()->route('manager.index');
            }
            
        }
        else{
            $req->session()->flash('msg', 'Invalid Username or Password');
            return redirect('/login');
        }
    }
}