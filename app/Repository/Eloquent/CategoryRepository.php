<?php
/**
 * Created by PhpStorm.
 * User: veysel
 * Date: 23.02.2021
 * Time: 22:57
 */

namespace App\Repository\Eloquent;


use App\Contracts\Category;
use Prettus\Repository\Traits\CacheableRepository;

class CategoryRepository extends Repository
{
    use CacheableRepository;
    function model()
    {
        return Category::class;
    }

}
