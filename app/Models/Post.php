<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function user()
    {
        return $this -> belongsTo('App\Models\User');
    }

    //Category Relations

    public function categories()
    {
        return $this -> belongsToMany('App\Models\Category');
    }


    //Tag relation
    public function tags()
    {
       return $this -> belongsToMany('App\Models\Tag');
    }






}
