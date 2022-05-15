<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegistrationController extends Controller
{
    public function registrationPost(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            'phone'=>'required',
            'address'=>'required',
        ]);
        // dd($request->all());

        try {
            $filename = null;
            if($request->hasFile('image')){
                $file = $request->file('image');
                $filename = date('Ymdhis').'.'.$file->getClientOriginalExtension();
                $file->storeAs('/uploads/user',$filename);
            }
            User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
                'phone'=>$request->phone,
                'address'=>$request->address,
                'image'=>$filename,
            ]);
            return response()->json([
                'message'=>'Registration Successful.'
            ],200);
        } catch (\Throwable $th) {
            return response()->json([
                'message'=>'Something went worng.',
                'error'=>$th->getMessage()
            ],400);
        }
    }
}
