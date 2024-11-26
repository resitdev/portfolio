<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request){

         $request->validate([
            'name' => 'required|min:4',
            'subject_mail' => 'required|min:4',
            'email' => 'required|email',
            'content' => 'required|min:4',
        ]);
        $contact_email = Setting::select('contact_mail')->where('id',1)->first();

if ($contact_email !== null) {
    Mail::to($contact_email->contact_mail)->send(new ContactMail($request->name, $request->email, $request->subject_mail, $request->content));
} else {
    // Handle the case where $contact_email is null, such as logging the error or sending a default email
    // Example: 
    Log::error("Contact email is null, unable to send the message.");
}


        //Mail::to($contact_email->contact_mail)->send(new ContactMail($request->name, $request->email, $request->subject_mail, $request->content));

        // Mail::to('hjhj@nn.com')->send(new ContactMail($request->name, $request->email, $request->subject_mail, $request->content));
        // Mail::to("zz@xx.com")->send(new ContactMail('nnn','e@z.com','bla bla','bla bla bla bla'));
        return to_route('home')->with('message','Message sent sucessfully !');
    }
}
