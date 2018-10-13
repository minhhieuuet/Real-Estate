<?php

use Illuminate\Database\Seeder;
use App\Location;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $data = file_get_contents(__DIR__ .'/tinh_tp.json');
      $cities = json_decode($data,true);
      foreach($cities as $city){
        $location = new Location();
        $location -> name = $city['name'];
        $location -> slug = $city['slug'];
        $location -> code = $city['code'];
        $location -> parent_code = 0;
        $location -> name_with_type = $city['name_with_type'];
        $location -> save();
        echo "Successful added".$location->name."/n"
      }

      $districts = file_get_contents(__DIR__.'/quan_huyen.json');
      $districts = json_decode($districts,true);
      foreach($districts as $district){
        $location = new Location();
        $location -> name = $district['name'];
        $location -> slug = $district['slug'];
        $location -> code = $district['code'];
        $location -> parent_code = $district['parent_code'];
        $location -> path_with_type = $district['path_with_type'];
        $location -> name_with_type = $district['name_with_type'];
        $location -> save();
        echo "Successful added".$location->name."/n";
      }
    }
}
