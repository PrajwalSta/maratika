<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Omnipay\Omnipay;
use App\Model\Payment;


class PaymentController extends Controller
{

  
   
    public function saveInfo(Request $request){
        $info=[
            'name'=>$request->fristname,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'country'=>$request->country,
            'state'=>$request->state_booking,
            'city'=>$request->city_booking,
            'room-id'=>1,
            'price'=>100,
            
        ];
        $info=json_encode($info);
        
        dd($info);

    
    }
}
  
 