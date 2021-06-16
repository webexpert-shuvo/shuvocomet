<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    //Post relation

    public function post()
    {
        return $this -> belongsToMany('App\Models\Post');
    }


}
