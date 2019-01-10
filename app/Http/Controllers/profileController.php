<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
class profileController extends Controller
{
    //
    public function index(){
        $details = \App\profile::first();
        return view('profile')->with(['details'=>$details]);
    }
    public function updateprofile(Request $request)
    {


        if($request->hasFile('logo')){
            $logo=$request->file('logo');
            $filename=time().'.'.$logo->getClientOriginalExtension();


            $profile = \App\profile::findorfail($request->id);
            $profile->companyname = $request->companyname;
            $profile->phone = $request->phone;
            $profile->email = $request->email;
            $profile->address = $request->address;
            $profile->mobile = $request->mobile;
            $profile->website = $request->website;
            $profile->fax = $request->fax;
            $profile->logo=$filename;
            if($profile->update()){
                Image::make($logo)->resize(300,300)->save( public_path('/images/'.$filename));

                return redirect('dashboard');
            }


        }else{
        $profile = \App\profile::findorfail($request->id);
        $profile->companyname = $request->companyname;
        $profile->phone = $request->phone;
        $profile->email = $request->email;
        $profile->address = $request->address;
        $profile->mobile = $request->mobile;
        $profile->website = $request->website;
        $profile->fax = $request->fax;
        $profile->update();
        return redirect('dashboard');

    }

    }
}
