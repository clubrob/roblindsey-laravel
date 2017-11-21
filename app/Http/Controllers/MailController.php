<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Thanks;

class MailController extends Controller
{
    public function contact(Request $request)
    {
        //Server validation form data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|max:255',
            'message' => 'required',
        ]);

        $contact['name'] = $request->name;
        $contact['email'] = $request->email;
        $contact['phone'] = $request->phone;
        $contact['message'] = $request->message;

        //dd($contact);
        
        //\Mail::to('rob@roblindsey.com')->send(new ContactMessage($contact));
        \Mail::to($contact['email'])->send(new Thanks);

        return back()->with([
                            'message' =>'Message sent! Rob will get back to you soon!',
                            'show' => true
                        ]);
    }
}
