<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Omnipay\Omnipay;
use App\Model\Payment;


class PaymentController extends Controller
{
    public $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true); //set it to 'false' when go live
    }

    public function saveBookingInfo(Request $request ){

        $info=[
            'name'=>$request->name,
            'address'=>$request->address,
            'email'=>$request->email,
            'contact'=>$request->contact,
            'address'=>$request->address,
            'city'=>$request->city,
            'state'=>$request->state,
            'cart'=>$request->carts,
            'amount'=>$request->total_sum,
            'comment'=>$request->comment
        ];
        $info=json_encode($info);
        return redirect()->to('/payment')->with('info',$info);
    }

    public function index()
    {
        $json_data=session()->get('info');
        if($json_data){
            $data=json_decode($json_data,true);
            // product id, slug, name for kalti
            $product_id=array_column($data['cart'],'product_id');
            $product_slug=implode(',',Product::whereIn('id',$product_id)->pluck('urlname')->toArray());
            $product_name=implode(',',Product::whereIn('id',$product_id)->pluck('name')->toArray());

            $temp=TempData::create([
                'data'=>$json_data
            ]);
            $temp_id=$temp->id;
            return view('payment',compact('json_data','data','temp_id','product_slug','product_name'));
        }else{
            abort(403);
        }
    }

    public function fail(){
        $errorMessage=session()->get('errorMessage');
        if($errorMessage){
            return view('fail');
        }else{
            abort(403);
        }
    }


    public function charge(Request $request)
    {
        if($request->input('submit'))
        {
            try {
                $response = $this->gateway->purchase(array(
                    'amount' => $request->input('amount'),
                    'currency' => env('PAYPAL_CURRENCY'),
                    'returnUrl' => url('paymentsuccess'),
                    'cancelUrl' => url('paymenterror'),
                ))->send();

                if ($response->isRedirect()) {
                    $response->redirect(); // this will automatically forward the customer
                } else {
                    // not successful
                    return $response->getMessage();
                }
            } catch(Exception $e) {
                return $e->getMessage();
            }
        }
    }

    public function payment_success(Request $request)
    {
        // Once the transaction has been approved, we need to complete it.
        if ($request->input('paymentId') && $request->input('PayerID'))
        {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id'             => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ));
            $response = $transaction->send();

            if ($response->isSuccessful())
            {
                // The customer has successfully paid.
                $arr_body = $response->getData();

                // Insert transaction data into the database
                $isPaymentExist = Payment::where('payment_id', $arr_body['id'])->first();

                if(!$isPaymentExist)
                {
                    $payment = new Payment;
                    $payment->payment_id = $arr_body['id'];
                    $payment->payer_id = $arr_body['payer']['payer_info']['payer_id'];
                    $payment->payer_email = $arr_body['payer']['payer_info']['email'];
                    $payment->amount = $arr_body['transactions'][0]['amount']['total'];
                    $payment->currency = env('PAYPAL_CURRENCY');
                    $payment->payment_status = $arr_body['state'];
                    $payment->save();
                }

                return "Payment is successful. Your transaction id is: ". $arr_body['id'];
            } else {
                return $response->getMessage();
            }
        } else {
            return 'Transaction is declined';
        }
    }

    public function payment_error()
    {
        return 'User is canceled the payment.';
    }

}
