<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Models\OfficeBuildingHouse;

class OfficeBuildingHousesRepository extends Model
{
    public function getShow($office)
    {

         $office->buildings = $office->buildingBlock->Building;
         $office->buildingBlocks =  $office->buildingBlock;

         
    }
}