<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\TravelInfo;
use Illuminate\Support\Facades\View;
use App\Repositories\TravelInterface;
use function is_null;
use function redirect;

class TravelInfoController extends Controller
{
    protected $travelInfo;
    public function __construct(TravelInterface $travelInfo)
    {
        $this->travelInfo = $travelInfo;
    }

    public function index(){
        if(View::exists('travelInfo.travelinfo')){
            return \view('travelInfo.travelinfo',[
                'travelInfo' => $this->travelInfo->getAllData()->sortBy("id"),
            ]);
        }
    }

    public function storeOrUpdate(Request $request,$id = null){
        $data = $request;
        if(!is_null($id)){ //update
            $this->travelInfo->storeOrUpdate($id,$data);
            return redirect()->route('travelinfo')->with('status','Data Updated!');
        }else{//insert
            $this->travelInfo->storeOrUpdate($id = null,$data);
            return redirect()->route('travelinfo')->with('status','Information Added!');
        }
    }
    public function view($id){
        if(View::exists('travelInfo.edit')){
            return view('travelInfo.edit',['travelinfo' => $this->travelInfo->view($id)]);
        }
    }


    public function delete($id){
        $this->travelInfo->delete($id);
        return redirect()->route('travelinfo')->with('status','Information Deleted!');
    }
   

    

    
}
