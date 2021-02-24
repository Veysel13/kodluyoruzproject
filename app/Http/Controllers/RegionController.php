<?php

namespace App\Http\Controllers;

use App\Repository\Eloquent\RegionRepository;
use Illuminate\Http\Request;

class RegionController extends Controller
{

    private $_config;
    private $regionRepository;

    public function __construct(
        RegionRepository $regionRepository
    )
    {
        $this->_config = request('_config');
        $this->regionRepository=$regionRepository;
    }

    public function index(){
        $regions=$this->regionRepository->orderBy("created_at","desc");

        if (request()->top_category==0)
            $regions=$regions->where("top_region",0);
        else
            $regions=$regions->where("top_region","!=",0);

        $regions=$regions->paginate(10);

        return view($this->_config['view'],compact("regions"));
    }

    public function edit ($id){
        $region=$this->regionRepository->findOrFail($id);

        return view($this->_config['view'],compact("region"));
    }

    public function update (){

        request()->validate([
            "name"=>"required|string"
        ]);

        $region=$this->regionRepository->find(request()->id);

        if (isset($region))
        {
            $this->regionRepository->update(["name"=>request()->name],$region->id);
            session()->flash("success","Bölge başarı ile güncellendi");
        }else{
            session()->flash("danger","Bölge bilgisi bulunamadı");
        }

        return redirect()->route($this->_config['redirect']);
    }

    public function delete ($id){

        $region=$this->regionRepository->find($id);

        if (isset($region))
        {
            $this->regionRepository->delete($region->id);
            session()->flash("success","Bölge başarı ile silindi");
        }else{
            session()->flash("danger","Bölge bilgisi bulunamadı");
        }

        return redirect()->route($this->_config['redirect']);
    }
}
