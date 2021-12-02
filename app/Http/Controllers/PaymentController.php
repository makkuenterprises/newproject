<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Redirect;

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;


class PaymentController extends Controller
{
    
     public function create()
    {        

// Your Account SID and Auth Token from twilio.com/console
$sid = 'AC6e8103de53468c9f1283a214d25e0c3b';
$token = '7a81474554b6b8be27bb49515668bab4';
$client = new Client($sid, $token);

// Use the client to do fun stuff like send text messages!
$client->messages->create(
    // the number you'd like to send the message to
    '+918271168973',
    [
        // A Twilio phone number you purchased at twilio.com/console
        'from' => '+17206369327',
        // the body of the text message you'd like to send
        'body' => 'Hey Client! This is testing message!'
    ]
);

        //return view('layouts.payment');
    }
    
    
    public function payment(Request $request)
    {
        $input = $request->all();

        $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));

        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 

            } catch (\Exception $e) {
                return  $e->getMessage();
                \Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }
        
        \Session::put('success', 'Payment successful');
        return redirect()->back();
    }
}
