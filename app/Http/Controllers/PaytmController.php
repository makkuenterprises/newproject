<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Anand\LaravelPaytmWallet\Facades\PaytmWallet;

class PaytmController extends Controller
{
    public function pay(Request $req)
    {
        dd($user_info);
        $amount = $req->amount; //Amount to be paid

        $userData = [
            'name' => 'Sugandh Kumar',//$req->name, // Name of user
            'mobile' => '8271168973', //Mobile number of user
            'email' => 'sugandhkumar9@gmail.com', //Email of user
            'fee' => $amount,
            'order_id' => '8271168973'."_".rand(1,1000) //Order id
        ];

        //$paytmuser = Paytm::create($userData); // creates a new database record

        $payment = PaytmWallet::with('receive');

        $payment->prepare([
            'order' => $userData['order_id'], 
            'user' => rand(1,1000),//$paytmuser->id,
            'mobile_number' => $userData['mobile'],
            'email' => $userData['email'], // your user email address
            'amount' => $amount, // amount will be paid in INR.
            'callback_url' => route('status') // callback URL
        ]);
        return $payment->receive();  // initiate a new payment
    }
    
    
     public function paymentCallback()
    {
        $transaction = PaytmWallet::with('receive');

        $response = $transaction->response();
        
        $order_id = $transaction->getOrderId(); // return a order id
      
        $transaction->getTransactionId(); // return a transaction id
    
        // update the db data as per result from api call
        if ($transaction->isSuccessful()) {
            //Paytm::where('order_id', $order_id)->update(['status' => 1, 'transaction_id' => $transaction->getTransactionId()]);
            //return redirect(route('initiate.payment'))->with('message', "Your payment is successfull.");
            return "Your payment is successfull."."order-id".$order_id."transaction_id".$transaction->getTransactionId();

        } else if ($transaction->isFailed()) {
            //Paytm::where('order_id', $order_id)->update(['status' => 0, 'transaction_id' => $transaction->getTransactionId()]);
            //return redirect(route('initiate.payment'))->with('message', "Your payment is failed.");
            //return "Your payment is failed."."order-id".$order_id."transaction_id".$transaction->getTransactionId();
            
        } else if ($transaction->isOpen()) {
            //Paytm::where('order_id', $order_id)->update(['status' => 2, 'transaction_id' => $transaction->getTransactionId()]);
            //return redirect(route('initiate.payment'))->with('message', "Your payment is processing.");
            return "Your payment is processing."."order-id".$order_id."transaction_id".$transaction->getTransactionId();
        }
        $transaction->getResponseMessage(); //Get Response Message If Available
        
        // $transaction->getOrderId(); // Get order id
    }

}
