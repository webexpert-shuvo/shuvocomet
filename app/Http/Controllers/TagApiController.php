<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagApiController extends Controller
{
    //

    public function TagApi()
    {

        $allTags =  Tag::all();

        $tag_api_data = [

            'status'        => 'Active',
            'msg'           => 'This is all tags',
            'alltags'       =>  $allTags

        ];
        return response()->json($tag_api_data);
    }

    //Single Tags  Show

    public function SingleTag($id)
    {



        $singlefindtag =  Tag::find($id);

        if ($singlefindtag  == null) {
           $sts = 'false';
           $sms = 'Faield Data';
        } else {
            $sts = 'true';
            $sms = 'success';
        }

        $tagapi = [

            'status'        =>  $sts,
            'smg'           => $sms,
            'tagdata'       => $singlefindtag,

        ];

        return response()->json( $tagapi);


    }




}
