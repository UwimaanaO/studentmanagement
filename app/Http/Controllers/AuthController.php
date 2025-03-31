<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // For authentication

class AuthController extends Controller
{
    //returns the login page as the default page that comes up.
    public function index(){
        return view("login");
    }

    //Handles the login logic with the creation of a session
    public function check(Request $request){
        $email=$request->email;
        $password=$request->password;
        if (auth()->attempt(array('email'=>$email, 'password'=>$password))){
            return redirect("welcome");
        }
        else{
            session()->flash("error","Invalid Username or Password");
           return view("login");
        }
    }

 
    // Handle user logout
    public function logout(Request $request){
    {
        Auth::logout(); // Log the user out
        $request->session()->flush();
        return view("login"); // Redirect to login page
    }
}
}
?>