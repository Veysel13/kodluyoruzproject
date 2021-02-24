<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\Category as CategoryContract;

class Category extends Model implements CategoryContract
{
    use HasFactory;

    protected $fillable=['name','top_category','status'];

    public function children(){

        return $this->hasMany(CategoryProxy::modelClass(),'top_category');
    }

    public function category(){

        return $this->belongsTo(CategoryProxy::modelClass(),'top_category');
    }
}
