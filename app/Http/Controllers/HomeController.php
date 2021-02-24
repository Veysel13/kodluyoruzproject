<?php

namespace App\Http\Controllers;


use App\Core\Functions\UploadManager;
use App\Core\Helper\Helper;

class HomeController extends Controller
{
    private $_config;
    private $uploadManager;
    private $helper;

    public function __construct(
        UploadManager $uploadManager,
        Helper $helper
    )
    {
        $this->_config = request('_config');
        $this->uploadManager=$uploadManager;
        $this->helper=$helper;
    }

    public function index(){

        return view($this->_config['view']);
    }

    public function store(){

        $file=$this->uploadManager->uploadFile(request()->all(),"image");

        if ($file!=null){
            $this->helper->dataUpload($file);
        }

        session()->flash("success","Dosya başarı ile aktarıldı");

        return redirect()->route($this->_config["redirect"]);
    }
}
