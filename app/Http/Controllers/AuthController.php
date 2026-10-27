<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddAdminRequest;
use App\Http\Requests\AuthValidationRequest;
use App\Http\Requests\LoginValidationRequest;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;



class AuthController extends Controller
{
    function index(){
        $data =Users::all();
    }
    function create (){

    }
    function store (AuthValidationRequest $req ){
        $user = new Users();
        $user->name = $req->name;
        $user->email=$req->email;
        $user->phone_number = $req->phone_number;
        $user->password = Hash::make($req->password);
        $user->save();
        return redirect()->route('login')->with(['message'=>"Create Account Successfully"]);
    }



public function login(LoginValidationRequest $req)
{
    $user = Users::where('email', $req->email)->first();

    if ($user && Hash::check($req->password, $user->password)) {
        $remember = $req->boolean('remember');

        Auth::login($user, $remember);

        $req->session()->regenerate();

        if (Auth::user()->role === 'admin') {
            return redirect()->route('Product');
        }

        return redirect()->route('Home');
    }

    return redirect()->back()
        ->with('Error', 'Please check your email or password again')
        ->withInput($req->only('email'));
}

public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect()->route('login')
        ->withHeaders([
            'Cache-Control' => 'no-cache, no-store, must-revalidate, private',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ]);
}

public function addAdmin (AddAdminRequest $request){
    $data = $request->validated();

    Users::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'phone_number' => $data['phone_number'] ,
        'role' => 'admin',
    ]);

    return redirect()->route('Product')->with('success', 'Admin added successfully.');
}
}
