<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;

class ChangePasswordController extends Controller
{
    public function index(){
        return view('auth.passwords.change');
    }

    public function update(){

        $data = request()->validate([
            'old-password' => 'required',
            'new-password' => 'required|confirmed',
        ]);

        if($this->passwordMatchesCurrentUser($data['old-password'])){
            return back()->withErrors(['old-password' => 'Password is wrong'])->withInput();
        }

        Auth::user()->password_hash = bcrypt($data['new-password']);
        Auth::user()->save();


        return redirect('home');
    }

    private function passwordMatchesCurrentUser($password){
        return Hash::check($password, Auth::user()->getAuthPassword()) == false;
    }

}
