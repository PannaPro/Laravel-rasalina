<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Footer;
use Carbon\Carbon;

class FooterController extends Controller
{
    
    public function FooterSection(){
        
        $footer = Footer::find(1);

        return view('admin.home_slide.footer_slider', compact('footer'));
    }

    public function UpdateFooter(Request $request){

        $footer_id = $request->id;

        Footer::findOrFail($footer_id)->update([
            'phone_number' => $request->phone_number,
            'short_description' => $request->short_description,
            'adress' => $request->adress,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagramm' => $request->instagramm,
            'gitHub' => $request->gitHub,
            'copyright' => $request->copyright,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Footer Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


}
