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
use App\Model\BookingContent;
use App\Facility;
use App\Contactus;
use function is_null;
use App\Model\Blog;
use App\Slider;


use Illuminate\Support\Collection;
use App\Model\cmsGallery;
use Analytics;

use Spatie\Analytics\Period;





class routesController extends Controller
{

    
    public function dashboard()
    {
        $user=User::all();
        $gallery=cmsGallery::all();
        $offroad=offroadTour::all();
        
      
        
                  $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::months(12));
                //   $active = Analytics::getActiveUsers();
                //     return $active;
                  

                   $totalpageViews=$totalvisitors=0;
                  for ($i=0; $i <10 ; $i++) { 
                      $totalvisitors=$totalvisitors+$analyticsData[$i]['visitors'];
                      $totalpageViews=$totalpageViews+$analyticsData[$i]['pageViews'];

                  }
                  
       

      
        
        return view('./cms.dashboard',compact('offroad','gallery','user'),["totalvisitors"=>$totalvisitors,"totalpageViews"=>$totalpageViews]);
       
    }

    public function index()

    {
        
        
        $rooms=offroadTour::paginate(3);
       
        $slider=Slider::all();
        $gallery=cmsGallery::paginate(6);
        $contactdetails=Contactus::all();
       
        $aboutus=AboutUs::all();
        $blogs=Blog::paginate(3);

         $whyus=Whyus::all();
         $facility=Facility::all();
         
         

        return view('./frontend.index',compact('rooms','whyus','slider','gallery','blogs','contactdetails','aboutus','facility'));
       
       
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
        $itinerary= offroadTour::find($id)->myitinarary;
        return view('./frontend.roomdetails',compact('rooms','keyinfo','room','itinerary'));
    }
   
    // public function projects(){
    //     $project=Project::all();
    //     return view('./frontend.projects',compact('project'));
    // }
     public function offroadtourDetails(Request $request,$tourlinks,$id){
       
        $offroadall=offroadTour::all();
        $itinerary= offroadTour::find($id)->myitinarary;
        $calendarevents= offroadTour::find($id)->myevents;
        $bookingcontent=BookingContent::all();
         
         $keyinfo= offroadTour::find($id)->offroadkeyinfo;
        
        
       
        $offroad=offroadTour::where('title',$tourlinks)->orWhere('id', $id)->first();
       //dd($offroad);
        return view('./frontend.offroad_details',compact('offroad','offroadall','itinerary','calendarevents','keyinfo','bookingcontent'));
    }
     public function blogs(){
        $blogs=Blog::all();
      //  dd($blogs);
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
       
       $rooms=offroadTour::all();
      
         
         


         return view('./frontend.booking',compact('rooms'));
    }
  
    public function BookingStepOne(Request $request){
       
        $rooms=offroadTour::all();
        

         $price =cookie('price', $request->price, 10);
          $noofperson =cookie('noOfPersons', $request->noofperson, 10);
         $availableDates =cookie('AvailableTourDate', $request->select, 10);
          $noofvehicle =cookie('NoOfVehicle', $request->noofvehicle, 10);
         $package =cookie('Package', $request->package, 10);

        
         
         $response=new Response (view('./frontend.booking',compact('offroadall','onroadall')));
        

          $response->withCookie($noofperson)->withCookie($availableDates)->withCookie($package)->withCookie($noofvehicle)->withCookie($price);

          
           return $response;
       


   //  return back()->withcookie($name_cookie,$email_cookie);


        
   }
   public function facility(){
        $facility=Facility::all();
        return view('./frontend.facility',compact('facility'));

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
