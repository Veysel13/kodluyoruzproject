<?php
/**
 * Created by PhpStorm.
 * User: veysel
 * Date: 23.02.2021
 * Time: 23:34
 */

namespace App\Core\Helper;


use App\Core\Functions\UploadManager;
use App\Imports\FileImports;
use Maatwebsite\Excel\Facades\Excel;
class Helper
{
    private $uploadManager;
    function __construct(
        UploadManager $uploadManager
    )
    {
        $this->uploadManager=$uploadManager;
    }


    public function dataUpload($path)
    {

        Excel::import(new FileImports, $path);
    }
}
