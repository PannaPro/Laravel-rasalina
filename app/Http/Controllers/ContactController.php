<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactModel;
use Carbon\Carbon;



class ContactController extends Controller
{
    public function Contact(){
        
        return view('frontend.contact');
    }

    public function ContactMessage(Request $request){

        ContactModel::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'message' => $request->message,            
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'You Message Send Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function MessageFromForm(){

        $messages = ContactModel::latest()->get();
        return view('admin.contact.contact_message', compact('messages')); 

    }

    public function DeleteMessage($id){

        ContactModel::FindOrFail($id)->delete();
        
        $notification = array(
            'message' => 'Message Deleted Successfuly',
            'alert-type' => 'success'
        );
        
        return redirect()->back()->with($notification);

        
    }
}
