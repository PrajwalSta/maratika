<?php

namespace App\Repositories;

use App\Model\TravelInfo;

interface TravelInterface{
    public function getAllData();
    public function storeOrUpdate($id = null,$data);
    public function view($id);
    public function delete($id);
}