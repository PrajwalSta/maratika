<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use App\Http\Controllers\AmbassadorController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CMS\BlogController;
use App\Http\Controllers\CMS\SliderController;
use App\Http\Controllers\CMS\cmsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\EsewaController;


use App\Contactus;

use Spatie\Analytics\Period;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return redirect()->route('homepage/{en}}', app()->getLocale());
})->name('homepage');


// Payment Information
Route::get('/save-information','PaymentController@saveBookingInfo');
Route::get('/payment','PaymentController@index');


Route::any('esewa/success','EsewaController@success')->name('esewa.success');
Route::any('esewa/fail','EsewaController@fail')->name('esewa.fail');

Route::get('payment/fail',[PaymentController::class,'fail'])->name('payment.fail');
// Route::group(['prefix' => '{locale}', 'where' => ['locale' => '[a-zA-Z]{2}']], function () {
//     Route::get('/', 'RoutesController@index')->name('homepage');

//     Route::get('article/{id}', 'HomeController@article')->name('article');
// });
Route::get('/data', function () {
    $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::months(6));
    return $analyticsData;
});

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\CMS\LanguageController@switchLang']);


Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');

    return "Cache and config is cleared";
});




Route::get('/rentals','RoutesController@Rental')->name('rental');
Route::get('/gallery','RoutesController@Gallery')->name('gallery');
Route::get('/travelinfo','RoutesController@TravelInfo')->name('travelinfofrontend');


Route::get('/','RoutesController@index')->name('homepage');
// Route::get('/projects','RoutesController@projects')->name('projects');
Route::get('rooms','RoutesController@ViewRooms')->name('rooms');
Route::get('/roomdetails/{id}','RoutesController@DetailRooms')->name('roomdetails');

Route::get('/offroadtour/{tourlinks}/{id}','RoutesController@offroadtourDetails')->name('offroadtour_details');
Route::get('/offoadtour/{tourlinks}/{id}','RoutesController@offroadtourDetails')->name('onroadtour_details');


Route::get('/blogs','RoutesController@blogs')->name('blogs');
//Route::get('/blogs','RoutesController@ViewBlog')->name('blogs');
Route::get('/blog-detail','RoutesController@blogs')->name('readmoreblog');

//slider
Route::get('/slider','RoutesController@Slider')->name('slider');

//about
Route::get('/about','RoutesController@Company')->name('about');

Route::get('/principalmessage','RoutesController@PrincipalMessage');

// booking form

Route::get('/booking','RoutesController@Booking' )->name('booking');
Route::post('/proceed-booking','RoutesController@ProceedBooking')->name('proceed-booking');
Route::post('/proceed-payment','RoutesController@ProceedPayment')->name('proceed-payment');


// here contact form contorller sends mail to the destination.
Route::post('/bookedpackage','ContactFormController@BookPackage')->name('booked-package');



// bike rent form booked-bike
Route::post('/bookedBike','ContactFormController@BookBike')->name('booked-bike');


// contact page
Route::get('/contact','RoutesController@Contact' )->name('contact');
Route::post('/contact_success','ContactFormController@sendMessage' )->name('contactsumbit');

// Ambassadors
Route::get('/becomeAmbasadors','AmbassadorController@index')->name('ambasadors');
Route::post('/ambassador_success','AmbassadorController@sendMessage' )->name('submitambassador');




Auth::routes();

Route::group(['middleware'=>['auth','admin']],function(){
    // for cms dashboard
    Route::get('/dashboard','RoutesController@dashboard')->name('dashboard');

    Route::get('/role-register','Admin\DashboardController@registered');
    Route::get('/role-register/{id}','Admin\DashboardController@registeredEdit');
    Route::put('/role-registered-update/{id}','Admin\DashboardController@registeredUpdate');
    Route::delete('/role-delete/{id}','Admin\DashboardController@registeredDelete');
    Route::get('/about-Us','Admin\Aboutus@index');
    Route::post('/save-aboutUs','Admin\Aboutus@store');
    Route::get('/about-Us/{id}','Admin\Aboutus@edit');
    Route::put('/aboutus-Update/{id}','Admin\Aboutus@updateAbout');
    Route::delete('/about-Us/{id}','Admin\Aboutus@DeleteAbout');
    Route::get('/role-register','Admin\DashboardController@registered');







    // cms frontend-----------------------cms frontend===================
    // =================================================================

     // =================================================================
     // for notice
     Route::get('/notice','CMS\noticeController@index')->name('notice');
     Route::post('/save-cmsnotice','CMS\noticeController@store');
     Route::get('/edit-cmsnotice/{id}','CMS\noticeController@edit');
     Route::put('/cms-updatenotice/{id}','CMS\noticeController@update');
     Route::delete('/delete-cmsnotice/{id}','CMS\noticeController@destroy');

     // why us
    Route::get('/whyus','CMS\WhyUsController@index')->name('whyus');
    Route::post('/save-whyus','CMS\WhyUsController@storeorupdate')->name('store-whyus');
    Route::get('/edit-whyus/{id}','CMS\WhyUsController@edit')->name('edit-whyus');
    Route::put('/update-whyus/{id}/','CMS\WhyUsController@storeorupdate')->name('update-whyus');
    Route::delete('/delete-whyus/{id}','CMS\WhyUsController@destroy')->name('delete-whyus');

     //   Travel Info
    Route::get('ViewTravelInfo','CMS\TravelInfoController@index')->name('travelinfo');
    Route::post('storeTravelInfo','CMS\TravelInfoController@storeOrUpdate')->name('storetravelinfo');
    Route::get('editTravelInfo/{id}','CMS\TravelInfoController@view')->name('edittravelinfo');
    Route::put('updateTravelInfo/{id}','CMS\TravelInfoController@storeOrUpdate')->name('updatetravelinfo');
    Route::delete('deleteTravelInfo/{id}','CMS\TravelInfoController@delete')->name('deletetravelinfo');

     // aboutCompany us
    Route::get('/aboutus','CMS\AboutUsController@index')->name('aboutus');
    Route::post('/save-aboutus','CMS\AboutUsController@storeorupdate')->name('store-aboutus');
    Route::get('/edit-aboutus/{id}','CMS\AboutUsController@edit')->name('edit-aboutus');
    Route::put('/update-aboutus/{id}/','CMS\AboutUsController@storeorupdate')->name('update-aboutus');

    // cms gallery
    Route::get('/cms-gallery','CMS\cmsController@index')->name('cms-gallery');
    Route::post('/save-cmsGallery','CMS\cmsController@store');
    Route::get('/edit-cmsGallery/{id}','CMS\cmsController@edit');
    Route::put('/cms-updateGallery/{id}','CMS\cmsController@update');
    Route::delete('/delete-cmsGallery/{id}','CMS\cmsController@destroy');

    // cms slider
    Route::get('/cms-slider','SliderController@index')->name('cms-slider');
    Route::post('/save-slider','SliderController@store');
    Route::get('/edit-slider/{id}','SliderController@edit');
    Route::delete('/delete-slider/{id}','SliderController@destroy');


    // For offroadTours
    Route::get('/offroadtour','CMS\offroadTourController@index')->name('offroadtour');
    Route::post('/save-offroadtour','CMS\offroadTourController@store');
    Route::get('/edit-offroadtouor/{id}','CMS\offroadTourController@edit');
    Route::put('/update-offroadtour/{id}/','CMS\offroadTourController@update');
    Route::delete('/delete-offroadtour/{id}','CMS\offroadTourController@destroy');

    // offroad Itinerary
    Route::get('/viewoffroaditinerary/{id}','CMS\ItineraryController@index')->name('offroaditinerary');
    Route::post('/save-offroadItinerary','CMS\ItineraryController@store')->name('saveoffroadItinerary');
    Route::get('/edit-offroadItinerary/{id}/{tourid}','CMS\ItineraryController@edit');
    Route::put('/update-itinerary/{id}/{tourid}','CMS\ItineraryController@update');
    Route::delete('/delete-offroaditinerary/{id}','CMS\ItineraryController@destroy');

// onroad Itinerary
     Route::get('/viewitinerary/{id}','CMS\OnroadItineraryController@index')->name('onroadItinerary');
     Route::post('/save-onroadItinerary','CMS\OnroadItineraryController@store')->name('saveonroadItinerary');
     Route::get('/edit-onroadItinerary/{id}/{tourid}','CMS\OnroadItineraryController@edit');
     Route::put('/update-onroaditinerary/{id}/{tourid}','CMS\OnroadItineraryController@update');
     Route::delete('/delete-onroaditinerary/{id}','CMS\OnroadItineraryController@destroy');



     // For onroadTours
     Route::get('/onroadtour','CMS\onroadTourController@index')->name('onroadtour');
     Route::post('/save-onroadtour','CMS\onroadTourController@store');
     Route::get('/edit-onroadtouor/{id}','CMS\onroadTourController@edit');
     Route::put('/update-onroadtour/{id}','CMS\onroadTourController@update');
     Route::delete('/delete-onroadtour/{id}','CMS\onroadTourController@destroy');
     Route::get('/viewItinerary/{id}','CMS\OffroadTourController@index')->name('onroad-itinerary');


    //  for paypal integration
    Route::get('payment', 'PaymentController@index');
    Route::post('charge', 'PaymentController@charge');
    Route::get('paymentsuccess', 'PaymentController@payment_success');
    Route::get('paymenterror', 'PaymentController@payment_error');

   // offroad Calendar Events
    Route::get('/viewoffroadEvents/{id}','CMS\EventController@index')->name('offroadEvents');
    Route::post('/save-offroadEvents','CMS\EventController@store')->name('saveoffroadEvents');
    Route::get('/edit-offroadEvents/{id}/{tourid}','CMS\EventController@edit')->name('editoffroadEvents');
    Route::put('/update-offroadEvents/{id}/{tourid}','CMS\EventController@update')->name('updateoffroadEvents');
    Route::put('/markbooked-offroadEvents/{id}/{tourid}','CMS\EventController@MarkAsBooked')->name('offroadEventsMarkBooked');

    Route::delete('/delete-offroadEvents/{id}','CMS\EventController@destroy');

     // onroad Calendar Events
     Route::get('/viewonroadEvents/{id}','CMS\OnRoadEventsController@index')->name('onroadEvents');
     Route::post('/save-onroadEvents','CMS\OnRoadEventsController@store')->name('saveonroadEvents');
     Route::get('/edit-onroadEvents/{id}/{tourid}','CMS\OnRoadEventsController@edit');
     Route::put('/update-onroadevents/{id}/{tourid}','CMS\OnRoadEventsController@update');
     Route::put('/markbooked-onroadevents/{id}/{tourid}','CMS\OnRoadEventsController@MarkAsBooked')->name('onRoadEventsMarkBooked');

     Route::delete('/delete-onroadEvents/{id}','CMS\OnRoadEventsController@destroy');

      //  for offroadkeyInfo

     Route::get('/viewoffroadKeyInfo/{id}','CMS\OffroadKeyInfoController@index')->name('offroadkeyInfo');
     Route::post('/save-offroadKeyInfo','CMS\OffroadKeyInfoController@store')->name('saveoffroadKeyInfo');
     Route::get('/edit-offroadKeyInfo/{id}','CMS\OffroadKeyInfoController@edit');
     Route::put('/update-offroadkeyinfo/{id}','CMS\OffroadKeyInfoController@update');
     Route::delete('/delete-offroadkeyinfo/{id}','CMS\OffroadKeyInfoController@destroy');


      //  for onroadkeyInfo

      Route::get('/viewOnroadKeyInfo/{id}','CMS\OnroadKeyInfoController@index')->name('onroadkeyInfo');
      Route::post('/save-OnroadKeyInfo','CMS\OnroadKeyInfoController@store')->name('saveOnroadKeyInfo');
      Route::get('/edit-OnroadKeyInfo/{id}','CMS\OnroadKeyInfoController@edit');
      Route::put('/update-Onroadkeyinfo/{id}','CMS\OnroadKeyInfoController@update');
      Route::delete('/delete-Onroadkeyinfo/{id}','CMS\OnroadKeyInfoController@destroy');


    //   for Section of Booking
    Route::get('/section','CMS\SectionController@index')->name('bookingcontent-section');
    Route::post('/save-bookingsection','CMS\SectionController@storeorupdate')->name('store-bookingsection');
    Route::get('/edit-section/{id}','CMS\SectionController@edit')->name('edit-bookingsection');
    Route::put('/update-section/{id}/','CMS\SectionController@storeorupdate')->name('update-bookingsection');
    Route::delete('/delete-bookingsection/{id}','CMS\SectionController@storeorupdate')->name('delete-bookingsection');

 // Rental
        Route::get('/cmsrental','CMS\RentalController@index')->name('cmsrental');
        Route::post('/save-rental','CMS\RentalController@storeorupdate')->name('store-rental');
        Route::get('/edit-rental/{id}','CMS\RentalController@edit')->name('edit-rental');
        Route::put('/update-rental/{id}/','CMS\RentalController@storeorupdate')->name('update-rental');
        Route::delete('/delete-rental/{id}','CMS\RentalController@destroy')->name('delete-rental');

    // Contact Us
  Route::get('/showContactDetails','ContactUsController@show')->name('admin.showcontact');
    Route::post('/saveContactDetail','ContactUsController@saveContactDetail')->name('saveContactDetail');
    Route::get('/editContactDetail/{id}','ContactUsController@editContactDetail')->name('editContactDetail');
    Route::put('/updateContactDetail/{id}','ContactUsController@saveContactDetail')->name('updateContactDetail');
    Route::delete('/deleteContactDetail/{id}','ContactUsController@deleteContactDetail')->name('deleteContactDetail');

    // Ambasadors
    Route::get('/admin-ambassadors','AmbassadorController@show')->name('cmsambasadors');
    Route::post('/save-ambasadors','AmbassadorController@storeorupdate')->name('store-ambasadors');
    Route::get('/edit-ambasadors/{id}','AmbassadorController@edit')->name('edit-ambasadors');
    Route::put('/update-ambasadors/{id}/','AmbassadorController@storeorupdate')->name('update-ambasadors');
    Route::delete('/delete-ambasadors/{id}','AmbassadorController@destroy')->name('delete-ambasadors');

    Route::post('/save-ambasadorcontent','AmbassadorController@storeorupdateContent')->name('store-ambasadorcontent');
    Route::get('/edit-ambasadorcontent/{id}','AmbassadorController@Contentedit')->name('edit-ambasadorcontent');
    Route::put('/update-ambasadorcontent/{id}/','AmbassadorController@Contentstoreorupdate')->name('update-ambasadorcontent');
    Route::delete('/delete-ambasadorcontent/{id}','AmbassadorController@Contentdestroy')->name('delete-ambasadorcontent');

    Route::post('/save-ambasadorform','AmbassadorController@storeorupdateForm')->name('store-ambasadorform');
    Route::get('/edit-ambasadorform/{id}','AmbassadorController@formedit')->name('edit-ambasadorform');
    Route::put('/update-ambasadorform/{id}/','AmbassadorController@formstoreorupdate')->name('update-ambasadorform');
    Route::delete('/delete-ambasadorform/{id}','AmbassadorController@formdestroy')->name('delete-ambasadorform');



    //blogs
    Route::get('/cms-blogs','CMS\BlogController@index')->name('cms-blogs');
    Route::post('/cms-save-blogs','CMS\BlogController@store')->name('cms-blogs-save');
    Route::put('update-cms-blogs/{id}','CMS\BlogController@update')->name('cms-blogs-update');
    Route::get('edit-cms-blogs/{id}','CMS\BlogController@edit')->name('cms-blogs-edit');
    Route::delete('delete-cms-blogs/{id}','CMS\BlogController@destroy')->name('cms-blogs-delete');


});


Route::get('/home', 'HomeController@index')->name('home');


// for sitemap
Route::get('sitemap.xml','SitemapController@index');
