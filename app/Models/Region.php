<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\Region as RegionContracts;
class Region extends Model implements RegionContracts
{
    use HasFactory;

    protected $fillable=['name','top_region','status'];

    public function children(){

        return $this->hasMany(RegionProxy::modelClass(),'top_region');
    }


    public function region(){

        return $this->belongsTo(RegionProxy::modelClass(),'top_region');
    }
}
