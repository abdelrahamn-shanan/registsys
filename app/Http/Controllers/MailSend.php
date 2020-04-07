<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Mail\SendMail;
class MailSend extends Controller
{
    public function mailsend()
    {
        $details = [
            'title' => 'Title: Mail ',
            'body' => 'Body: This is for testing email using smtp'
        ];

        \Mail::to('01012617633abdoshanan@gmail.com')->send(new SendMail($details));
        return view('emails.thanks');
    }
}
