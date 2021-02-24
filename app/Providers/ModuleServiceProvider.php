<?php
/**
 * Created by PhpStorm.
 * User: veysel
 * Date: 23.02.2021
 * Time: 22:46
 */

namespace App\Providers;

use App\Models\Category;
use App\Models\Region;
use Konekt\Concord\BaseModuleServiceProvider;
class ModuleServiceProvider extends BaseModuleServiceProvider
{

    protected $models = [
        Category::class,
        Region::class,
        ];
}
