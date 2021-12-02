<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function basic_email(Request $req) {
      $data = array('message'=>$req->message);
      $sub = $req->subject;
      $email = $req->email;
      $name = $req->name;
   
      Mail::send(['text'=>'emails.get_in_touch_form'], $data, function($message) {
         $message->to('sugandhkumar9@gmail.com', '4med.in')
                 ->subject($sub);
         $message->from('$email','$name');
      });
      echo "Basic Email Sent. Check your inbox.";
   }
}
