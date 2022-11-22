<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create(){
        return view('users.register');
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'name' => ['required', Rule::unique('users', 'name'), 'min:3'],
            'email' => ['required', Rule::unique('users', 'email'), 'email'],
            'password' => ['required', 'min:6', 'confirmed'],
            'contact_number' => ['required', Rule::unique('users', 'contact_number'), 'numeric']
        ]);

        $formFields['password'] = bcrypt($formFields['password']);
        $user = User::create($formFields);
        auth()->login($user);

        return redirect('/listings');
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/listings')->with('success', 'Logout successfully');
    }

    public function login(Request $request){
        return view('users.login');
    }

    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect('/listings')->with('success', 'Login successfully');
        }else{
            return redirect('/login')->with('success', 'Account do not exist');
        }
    }

    public function profile(User $user){
        return view('users.profile', ['user' => $user]);
    }
}
