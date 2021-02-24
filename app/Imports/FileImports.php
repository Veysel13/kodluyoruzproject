<?php
/**
 * Created by PhpStorm.
 * User: veysel
 * Date: 24.02.2021
 * Time: 00:00
 */

namespace App\Imports;


use App\Repository\Eloquent\CategoryRepository;
use App\Repository\Eloquent\RegionRepository;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;

class FileImports implements ToModel
{
    private $categoryRepository;
    private $regionRepository;
    public function __construct()
    {
        $this->regionRepository=app("App\Repository\Eloquent\RegionRepository");
        $this->categoryRepository=app("App\Repository\Eloquent\CategoryRepository");
    }

    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {
        if ($row[0]=="Bölge"){
            $string=explode(">",$row[1]);

            if (count($string)>0){
                $topRegion=$this->regionRepository->findOneWhere(["name"=>$string[0]]);
                if (empty($topRegion))
                $topRegion=$this->regionRepository->create(["name"=> $string[0],"top_region"=>0,"status"=>1]);

                $this->regionRepository->create(["name"=> $string[1],"top_region"=>$topRegion->id,"status"=>1]);
            }

        }else if ($row[0]=="Kategori"){
            $string=explode(">",$row[1]);

            if (count($string)>0){
                $topCategory=$this->categoryRepository->findOneWhere(["name"=>$string[0]]);
                if (empty($topCategory))
                    $topCategory=$this->categoryRepository->create(["name"=> $string[0],"top_category"=>0,"status"=>1]);

                $this->categoryRepository->create(["name"=> $string[1],"top_category"=>$topCategory->id,"status"=>1]);
            }
        }

    }
}
