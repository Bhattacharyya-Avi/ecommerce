<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function settings()
    {
        $setting = Setting::where('id',1)->first();
        return view('backend.settings.edit',compact('setting'));
    }

    public function settingsUpdate(Request $request, $id)
    {
        $setting = Setting::find($id);
        // dd($request->all(),$id);
        if ($setting) {
            $setting->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'contact'=>$request->contact,
                'about'=>$request->about,
                'slogan'=>$request->slogan,
                'address'=>$request->address,
                'facebook'=>$request->facebook,
                'instragram'=>$request->instragram,
            ]);
            session()->flash('success','Settings Updated.');
            return redirect()->back();
        }
    }
}
