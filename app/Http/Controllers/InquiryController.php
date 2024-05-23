<?php

namespace App\Http\Controllers;

use App\Mail\InquirySendmail;
use Illuminate\Http\Request;
use App\Http\Requests\InquiryFormRequest;
use Illuminate\Support\Facades\Mail;

class InquiryController extends Controller
{
    public function index()
    {
        return view('inquiry.index');
    }

    public function confirm(InquiryFormRequest $request)
    {
        // dd($request);
        $inquiry = $request;
        return view('auth/confirm', compact('inquiry'));
    }

    public function send(InquiryFormRequest $request)
    {
        $inquiry = $request->all();
        Mail::to('your_address@example.com')->send(new InquirySendmail($inquiry));
        $request->session()->regenerateToken();
        return redirect()->route('inquiry.thanks');
    }
}


