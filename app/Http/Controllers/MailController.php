<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\TestMail;

class MailController extends Controller
{
    public function index($email)
    {
        $mailData = [
            'title' => 'Mail from invitation.com',
            'body' => 'This is for inviting you.'
        ];

        Mail::to($email)->send(new TestMail($mailData));
    }
}
