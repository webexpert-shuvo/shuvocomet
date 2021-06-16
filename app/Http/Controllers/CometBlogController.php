<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CometBlogController extends Controller
{
    //Show Comet BLog Post

    public function index()
    {

        $allPosts = Post::where('status' , 'Active' ) -> where('trash' , 'Inactive')->latest()->paginate(1);

        return view('comet.blog',[

            'allpostdata'       => $allPosts ,

        ]);
    }


}
