<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\services\Services;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Airtime;
use Illuminate\Support\Facades\Redirect;
use Paystack;
use App\Models\Payment;
use App\Models\User;
class PaymentController extends Controller
{


    private $payment;
    private $user;
    public function __construct(Payment $payment, User $user)
    {
       
        
        $this->payment = $payment;
        $this->user =$user;
    }


    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway(Request $request)
    {
        try{
    


   //Check if the service type  airtime
      
        $amount = $request->amount * 100;   
        $paystack = new Paystack();
    
        $request-> email=Auth::user()->email;    
        $request-> phone="08036211233";
        $request-> amount = $amount;
        // $request-> metadata = json_encode($array = []);
        $request-> reference = Paystack::genTranxRef();
        $request-> key = config('paystack.secretkey');
        
        return Paystack::getAuthorizationUrl()->redirectNow();
    }catch(\Exception $e) {
        return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
    }        
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback(Request $request)
    {
        $paymentDetails = Paystack::getPaymentData();


             $amount = $paymentDetails['data']['amount']/100;
             $transId = $paymentDetails['data']['id'];
             $transStatus = $paymentDetails['data']['status'];

        
                $data = $this->payment->create([
                    'user_id'  => Auth::user()->id,
                    'amount'  =>  $amount,
                    'status'=> $transStatus,
                    'transactionId'=>$transId
                    
                ]);
                $data = $this->user->where('id',Auth::user()->id)->first();
                $data->update([
                    'status'  => $transStatus,
                    
                    
                ]);
               
           

             return redirect('/home');
           
            // return response()->json(
            //     [
            //         'message' => "Wallet funded successful!",
            //     ],200);
        

                
        }
        
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    

     
}