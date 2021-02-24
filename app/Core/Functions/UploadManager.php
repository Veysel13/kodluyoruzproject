<?php
/**
 * Created by PhpStorm.
 * User: veysel
 * Date: 23.02.2021
 * Time: 23:29
 */

namespace App\Core\Functions;

use Illuminate\Support\Facades\Storage;
class UploadManager
{

    function ImageAdd($image){
        $refimgyol="";
        if ($image["name"]!=null)
        {
            $uploads_dir="file/";
            $tmp_name=$image["tmp_name"];
            $name=$image["name"];
            $benzersizsayi1=rand(20000,32000);
            $benzersizsayi2=rand(20000,32000);
            $refimgyol=$uploads_dir.$benzersizsayi1.$benzersizsayi2.$name;
            @move_uploaded_file($tmp_name,"$refimgyol");
        }
        return $refimgyol;
    }

    public function uploadFile($data, $type = "image")
    {
        $request = request();

        if (isset($data[$type]))
        {
            foreach ($data[$type] as $imageId => $image) {

                $file = $type . '.' . $imageId;
                $dir = 'file/' . now()->year;

                if ($request->hasFile($file)) {

                    return $request->file($file)->store($dir);
                }
            }
        }

        return null;

    }
}
