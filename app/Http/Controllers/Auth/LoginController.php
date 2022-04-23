<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function loginPage()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {   
        
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required',
           
        ]);

        
        // dd($credentails);
       
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            if(!Auth::user()->blocked)
            {
                $request->session()->regenerate();
                return redirect()->route('dashboard');
            }
            
            return redirect()->back()->with('warning',"Your user blocked contact administrator for help.");
            
        }

        return back()->with('danger', 'Email Or Password Incorrect!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
