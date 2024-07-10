<?php

namespace App\Http\Controllers;


use App\Models\User;
use Dotenv\Exception\ValidationException;
use Session;


class UserController extends Controller

{
   
    public function login(){
        request()->session()->forget('id');
        $value = 0;
        $value = Session::get('id');
        
        error_log("in the login page");
        error_log($value);
        return view('login');
    }
    public function auth(){
        
        try {
            $this->validate(request(), [
                'email' => ['required'],
                'password' => ['required'],
                
            ]);
        } catch (ValidationException $e) {
        }
        $requuest = request()->all();


        $email=$requuest['email'];
        $password=$requuest['password'];
        
        $data = User::all();
        
        foreach ($data as $key => $value) {
            if ($data[$key]['email'] == $email) {
                if ($data[$key]['password'] == $password){
                    // error_log(gettype($data[$key]['password']));
                    // error_log(gettype($password));
                    request()->session()->forget('id');
                    Session::put('id',$data[$key]['id']);
                    $value = Session::get('id');
                    
                    return redirect('/')->with('data', $value);
                }
            }
        }
        
}

public function getUsers(){
    

    $data = User::all();

    return $data;
    
}
}