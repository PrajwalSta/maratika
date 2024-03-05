<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Models\Booking;
use Mail;
use App\Mail\BookingMail;



class EsewaController extends Controller
{
    public function success(Request $request){
        if(isset($request->oid) && isset($request->amt) && isset($request->refId)){
            $url = "https://uat.esewa.com.np/epay/transrec";
            $data =[
                'amt'=> $request->amt,
                'rid'=> $request->refId,
                'pid'=> $request->oid,
                'scd'=> 'EPAYTEST'
            ];
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($curl);
            curl_close($curl);
            $response_code=$this->get_xml_node_value('response_code',$response);

            if(trim($response_code)=='Success'){


                $booking=Booking::where('id',$request->oid)->first();
                $booking->payment_mode='Esewa';
                $booking->update();
                Mail::to('anilkarki00001@gmail.com')->send(new BookingMail($booking));
               return 'Thank you for your order';
            }

        }
    }

    public function fail(){
        return redirect()->to('payment/fail')->with('errorMessage','Your transaction has failed. Please go back and try again.');
    }

    public function get_xml_node_value($node, $xml) {
	    if ($xml == false) {
	        return false;
	    }
	    $found = preg_match('#<'.$node.'(?:\s+[^>]+)?>(.*?)'.'</'.$node.'>#s', $xml, $matches);
	    if ($found != false) {
	        return $matches[1];
	    }
        return false;
	}
}
