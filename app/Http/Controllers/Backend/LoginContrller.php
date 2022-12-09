<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginContrller extends Controller
{
    public function loginPost(Request $request)
    {
        
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('setting');
        }
        else {
            return redirect()->route('admin.dashboard');
        }
    }
}
