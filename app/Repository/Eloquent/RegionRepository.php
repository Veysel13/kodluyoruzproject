<?php
/**
 * Created by PhpStorm.
 * User: veysel
 * Date: 23.02.2021
 * Time: 22:56
 */

namespace App\Repository\Eloquent;


use App\Contracts\Region;
use Prettus\Repository\Traits\CacheableRepository;

class RegionRepository extends Repository
{
    use CacheableRepository;
    function model()
    {
        return Region::class;
    }

}
