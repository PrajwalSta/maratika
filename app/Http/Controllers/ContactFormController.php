<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\ContactForms;
use App\Mail\ContactMail;
use App\Mail\BookingMail;
use App\Mail\RentMail;
use Mail;
class ContactFormController extends Controller
{
    
        public function sendMessage(Request $request){
            $details=[
                'name'=>$request->name,
                'email'=>$request->email,
                'subject'=>$request->subject,
                'msg'=>$request->message

            ];
            Mail::to('info@offroadnepal.com')->send(new ContactMail($details));
        
            return back()->with("message_sent","Thank You For Contacting Us. We will contact you as soon as possible");
        }
        
         // for booking package
        public function BookPackage(Request $request){

            
            $traveldetails=[
                'DestinationName'=>$request->select,
                'ArrivalDate'=>$request->Adatepicker,
                'DepartureDate'=>$request->Ddatepicker,
                'No.of.persons'=>$request->noofperson,
            ];

            $personaldetails=$request;
            $det=[];
            // return $personaldetails['name1'];
            for ($i=1; $i <= $request->loop; $i++) { 

                
                 $details=[
                     
                'Name'=>$personaldetails['name'.$i],

                'Age'=>$personaldetails['Age'.$i],
                 'Email'=>$personaldetails['email'.$i],
                'Phone'=>$personaldetails['phone'.$i],
                 'Country'=>$personaldetails['country'.$i],
                 'City'=>$personaldetails['city'.$i],
                 'Description'=>$personaldetails['description'.$i],
               

            ];
                array_push($det,$details );
            }
            // return $det;
            // $personaldetails=[
            //     'Name'=>$request->name,
            //     'Age'=>$request->Age,
            //     'Email'=>$request->email,
            //     'Phone'=>$request->phone,
            //     'Country'=>$request->country,
            //     'City'=>$request->city,
            //     'Description'=>$request->description,
               

            // ];
            Mail::to('alex@offroadnepal.com')->send(new BookingMail($traveldetails,$det));
        
            return back()->with("message_sent","Thank You For Contacting Us. We will contact you as soon as possible");
        }
         // for booking Bike
         public function BookBike(Request $request){
            $rentdetails=[
                'Name'=>$request->name,
                'Age'=>$request->Age,
                'Email'=>$request->email,
                'Phone'=>$request->phone,
                'Address'=>$request->address,
                'DateofBooking'=>$request->dbooking,
                'NumberofDays'=>$request->days,

            ];
           
            Mail::to('info@offroadnepal.com')->send(new RentMail($rentdetails));
        
            return back()->with("message_sent","Thank You For Contacting Us. We will contact you as soon as possible");
        }
    
}
