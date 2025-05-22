<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // 这里可以添加发送邮件的逻辑
        // Mail::to('your.email@example.com')->send(new ContactFormMail($validated));

        return redirect()->back()->with('success', '消息已发送，我们会尽快回复您！');
    }
}
