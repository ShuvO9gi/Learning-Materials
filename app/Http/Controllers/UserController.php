<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //Show Register/Create Form
    public function create() {
        return view("users.register");
    }

    //Create New User
    public function store(Request $request) {
        $formFields = $request->validate([
            "name" => ["required", "min:3"],
            "email" => ["required", "email", Rule::unique("users", "email")],
            "password" => "required|confirmed|min:6"
        ]);

        //Hash Password
        $formFields["password"] = bcrypt($formFields["password"]);

        //Create User
        $user = User::create($formFields);

        //Login The User
        auth()->login($user);

        return redirect("/")->with("message", "User created and logged in...");
    }

    //Logout User
    public function logout(Request $request) {
        //dd($request);
        //dd(auth());
        
        //remove authentication info from user session
        auth()->logout();

        //recommended to invalidate user session & regenerate user token
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect("/")->with("message", "You have been logged out!");
    }

    //Login User
    public function login() {
        return view("users.login");
    }

    //Authenticate/Validate User
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            "email" => ["required", "email"],
            "password" => "required"
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect("/")->with("message", "Your are logged into your account!");
        }

        return back()->withErrors(["email" => "Invalid Credentials!"])->onlyInput("email");
    }
}