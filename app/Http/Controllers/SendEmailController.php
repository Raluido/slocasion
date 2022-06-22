<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Mail\Contact;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;

class SendEmailController extends Controller
{
    public function contact()
    {
        return view('contact');
    }

    public function sendEmail(ContactRequest $request)
    {
        $request->validate([
            'name' => 'required|max:20',
            'email' => 'required|email|max:30',
            'phone' => 'required|digits_between:9,13',
            'message' => 'required|max:200',
            'captcha' => 'required|captcha'
        ]);

        $validatedData = $request->validated();

        Mail::to("sumaymas@gmail.com")->send(new Contact($validatedData));

        $successMessage = 'El email ha sido enviado con éxito';

        return redirect()->back()->withSuccess($successMessage);
    }
    
        public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }

}
