<?php
namespace App\Repositories;

use App\Models\Building;
use App\Models\BuildingBlock;
use App\Models\OfficeBuildingHouse;
use Illuminate\Database\Eloquent\Model;

class BuildingsRepository extends  Model
{
    // TODO
   public function getList()
   {

       $data = Building::paginate(20);

       foreach ($data as $k => $v) {

           $res = BuildingBlock::where('building_id', $v->id)->first();
               if ($res) {
                   if ($res->id) {

//                       $re = OfficeBuildingHouse::where('building_block_id', $res->id)->where('rent_price_unit','!=',1)->get();
                       $count = OfficeBuildingHouse::where('building_block_id', $res->id)->where('rent_price_unit','!=',1)->count();
                       dd($count);

                            $v->pic = json_decode($v->album)[0];


                   }
               }
           }
           return $data;
       }


}