<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Project;
use App\Models\Post;

class PublicController extends Controller
{
    public function projects(){
        return view('projects', [
            'projects' => Project::all(),
            'latestPost' => Post::latest()->first(),
        ]);
    }

    public function contact(){
        return view('contact');
    }

    public function sendContact(Request $request){
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string', 'min:10'],
        ]);

        Mail::send('emails.contact', ['contactData' => $validated], function ($message) use ($validated){
            $message->to('fabiospanoo@outlook.it')
                    ->replyTo($validated['email'])
                    ->subject('New message from contact form');
        });

        return redirect()->route('contact')->with('success', 'Message sent! I will get back to you soon.');
    }
}
