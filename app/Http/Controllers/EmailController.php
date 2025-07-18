<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;

class EmailController extends Controller
{
    public function sendEmail()
    {
        $data = [
            'name' => 'John Doe',
            'message' => 'This is a test email from Laravel 12.'
        ];

        Mail::to('sotreduch26022001@gmail.com')->send(new SendEmail($data));

        return response()->json(['success' => 'Email sent successfully.']);
    }
}
