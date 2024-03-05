<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

// use App\Event;
use App\User;
use App\Model\offroadTour;
use App\Model\onroadTour;
use App\Model\Itinerary;
use App\Model\Whyus;
use App\Model\AboutUs;
use App\Model\TravelInfo;
use App\Models\Booking;
use App\Model\Rental;
use App\Contactus;
use function is_null;
use App\Model\Blog;
use App\Slider;


use Illuminate\Support\Collection;
use App\Model\cmsGallery;
use Analytics;
use Illuminate\Support\Facades\Cookie;
use Spatie\Analytics\Period;





class routesController extends Controller
{
    public function dashboard()
    {
        $user=User::all();
        $gallery=cmsGallery::all();
        $offroad=offroadTour::all();

        $onroad=onroadTour::all();


                  $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::months(12));
                //   $active = Analytics::getActiveUsers();
                //     return $active;


                   $totalpageViews=$totalvisitors=0;
                  for ($i=0; $i <10 ; $i++) {
                      $totalvisitors=$totalvisitors+$analyticsData[$i]['visitors'];
                      $totalpageViews=$totalpageViews+$analyticsData[$i]['pageViews'];
                  }
        return view('./cms.dashboard',compact('offroad','gallery','user','onroad'),["totalvisitors"=>$totalvisitors,"totalpageViews"=>$totalpageViews]);

    }

    public function index()
    {
   // App::setlocale('es');
        $rooms=offroadTour::paginate(3);

        $slider=Slider::all();
        $gallery=cmsGallery::paginate(6);
        $contactdetails=Contactus::all();
        $booking=
        $aboutus=AboutUs::all();
        $blogs=Blog::paginate(3);
         $whyus=Whyus::all();
        return view('./frontend.index',compact('rooms','whyus','slider','gallery','blogs','contactdetails','aboutus'));
    }

    public function ViewRooms(){
        $rooms=offroadTour::all();

        return view('./frontend.rooms',compact('rooms'));

    }
    public function DetailRooms($id)
    {
        $room=offroadTour::paginate(3);
        $rooms=offroadTour::find($id);
        $keyinfo= offroadTour::find($id)->offroadkeyinfo;
        return view('./frontend.roomdetails',compact('rooms','keyinfo','room'));
    }
     public function offroadtourDetails(Request $request,$tourlinks,$id){

        $offroadall=offroadTour::all();
        $itinerary= offroadTour::find($id)->myitinarary;
        $calendarevents= offroadTour::find($id)->myevents;
        $bookingcontent=BookingContent::all();
         $keyinfo= offroadTour::find($id)->offroadkeyinfo;
        $offroad=offroadTour::where('title',$tourlinks)->orWhere('id', $id)->first();
        return view('./frontend.offroad_details',compact('offroad','offroadall','itinerary','calendarevents','keyinfo','bookingcontent'));
    }
     public function blogs(){
        $blogs=Blog::all();
        return view('./frontend.blogs',compact('blogs'));
    }

    public function readMoreBlog(Request $request,$bloglinks){
        $blogs=Blog::all();
        $blogdetail=Blog::where('blog_title',$bloglinks)->first();
        return view('./frontend.blogDetail',compact('blogdetail','blogs'));
    }

    public function Company(){
        $aboutus=AboutUs::all();
        $whyus=Whyus::all();

        return view('./frontend.about',compact('aboutus','whyus'));
    }
       // booking
    public function Booking(){
         $offroadall=offroadTour::all();
         return view('./frontend.booking',compact('offroadall'));
    }

    public function ProceedBooking(Request $request){
        $rooms=offroadTour::all();
        $room_detail=offroadTour::findorfail($request->room_id);
          $name =cookie('name', $request->name, 10);
         $date =cookie('date', $request->date, 10);
          $email =cookie('email', $request->email, 10);
         $contact =cookie('contact', $request->contact, 10);
        $response=new Response (view('./frontend.booking',compact('rooms','room_detail')));
        $response->withCookie($name)->withCookie($date)->withCookie($contact)->withCookie($email);
        return $response;

   }

   public function ProceedPayment(Request $request){
            $booking=new Booking();
            $booking->full_name=$request->input('full_name');
            $booking->email=$request->input('email');
            $booking->contact=$request->input('contact');
            $booking->date=$request->input('date');
            $booking->country=$request->input('country');
            $booking->city=$request->input('city');
            $booking->post_code=$request->input('postal_code');
            $booking->add_info=$request->input('add_info');
            $booking->number_of_person=$request->input('number_of_person');
            $booking->room_id=$request->input('room_id');
            $booking->payment_mode='not paid';
            $booking->total=$request->input('number_of_person')*$request->input('amount');
            $booking->save();
            return view('./frontend.proceed_payment',compact('booking'));
        }

   public function Rental(){
        $rental=Rental::all();
        return view('./frontend.rental',compact('rental'));

   }
    public function Gallery(){
        $gallery=cmsGallery::all();
        return view('./frontend.gallery',compact('gallery'));
    }

    public function TravelInfo(){
        $travelinfo=TravelInfo::all();
        return view('./frontend.travelinfo',compact('travelinfo'));


    }
    public function Contact(){
          $contactdetails=Contactus::all();
        return view('./frontend.contact',compact('contactdetails'));
    }
    public function download(){
        $download=Downloads::all();
        return view('./frontend.download',compact('download'));
    }
    public function downloadFile($file){

        return response()->download('uploads/downloads/'.$file);
    }

}
