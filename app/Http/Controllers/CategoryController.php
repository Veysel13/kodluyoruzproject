<?php

namespace App\Http\Controllers;

use App\Repository\Eloquent\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    private $_config;
    private $categoryRepository;

    public function __construct(
        CategoryRepository $categoryRepository
    )
    {
        $this->_config = request('_config');
        $this->categoryRepository=$categoryRepository;
    }

    public function index(){
        $category=$this->categoryRepository->orderBy("created_at","desc");

        if (request()->top_category==0)
            $category=$category->where("top_category",0);
        else
            $category=$category->where("top_category","!=",0);

        $category=$category->paginate(10);

        return view($this->_config['view'],compact("category"));
    }

    public function edit ($id){
        $category=$this->categoryRepository->findOrFail($id);

        return view($this->_config['view'],compact("category"));
    }

    public function update (){

        request()->validate([
            "name"=>"required|string"
        ]);

        $category=$this->categoryRepository->find(request()->id);

        if (isset($category))
        {
            $this->categoryRepository->update(["name"=>request()->name],$category->id);
            session()->flash("success","Kategori başarı ile güncellendi");
        }else{
            session()->flash("danger","Kategori bilgisi bulunamadı");
        }

        return redirect()->route($this->_config['redirect']);
    }

    public function delete ($id){
        $category=$this->categoryRepository->find(request()->id);

        if (isset($category))
        {
            $this->categoryRepository->delete($category->id);
            session()->flash("success","Kategori başarı ile silindi");
        }else{
            session()->flash("danger","Kategori bilgisi bulunamadı");
        }

        return redirect()->route($this->_config['redirect']);
    }
}
