<?php

namespace App\Repositories;
use App\Model\TravelInfo;

use function is;
use function is_null;
//use Your Model

/**
 * Class TravelInfoRepository.
 */
class TravelInfoRepository implements TravelInterface
{
    public function getAllData(){
        return TravelInfo::latest()->get();
    }

    public function storeOrUpdate($id = null,$data){
        if(is_null($id)){
            $TravelInfo = new TravelInfo();
            $TravelInfo->query = $data['query'];
            $TravelInfo->information = $data['information'];
            return $TravelInfo->save();
        }else{
            $TravelInfo = TravelInfo::find($id);

            if($data['eslang']){
             $TravelInfo->es_query = $data['query'];
            $TravelInfo->es_information = $data['information'];

        }elseif($data['germanlang']){
             $TravelInfo->ger_query = $data['query'];
            $TravelInfo->ger_information = $data['information'];

        }
        elseif($data['frenchlang']){
            $TravelInfo->fr_query = $data['query'];
            $TravelInfo->fr_information = $data['information'];

        }else{
            $TravelInfo->query = $data['query'];
            $TravelInfo->information = $data['information'];
           
        }
         return $TravelInfo->save();
        }
    }

    public function view($id){
        return TravelInfo::find($id);
    }
    public function delete($id){
        $TravelInfo = TravelInfo::find($id);
        return $TravelInfo->delete();
    }
}
