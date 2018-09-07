<?php

namespace App\Http\Controllers;

use Newsletter;
use Mail;
use App\Mail\BlogMail;
use Illuminate\Http\Request;

class SendMailController extends Controller
{
    /**
     * Subscribe Visitor 
     * 
     * @return \Illuminate\Http\Response
     */
    public function subscribe()
    {
        $email = request('email');
        Newsletter::subscribe($email);
        $this->send($email);
        session()->flash('success', 'Subscribed Successfully!');
        return redirect()->back();
    }

    /**
     * Send Mail to all Subscribers
     * 
     * @return void
     */
    public function sendAll()
    {

    }

    /**
     * Send Mail to Subscriber
     * 
     * @return void
     */
    public function send($email)
    {
    	Mail::to($email)->send(new BlogMail());
    }
}
