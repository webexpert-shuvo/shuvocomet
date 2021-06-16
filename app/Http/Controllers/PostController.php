<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //show Blog Post

    public function index()
    {

        $allpostsdata = Post::where('status' , 'Active')->latest()->get();
        return view('backend.blog.posts.index',[

            'allposts'      => $allpostsdata,



        ]);


    }


    //Create Blog Post
    public function craetepost()
    {
        $allcategory    = Category::where('status' , 'Active')->latest()->get();
        $alltags        = Tag::where('status' , 'Active')->latest()->get();

        return view('backend.blog.posts.post-create',[

            'allcats'       => $allcategory,
            'alltags'       => $alltags,

        ]);
    }

    //Post Create


    public function postcreate(Request $request)
    {

        //Single Image Upload
        $singleimguname   = '';
        if ($request -> hasFile('single')) {
            $getSingleimage = $request -> file('single');
            $singleimguname = md5(time().rand()).'.'.$getSingleimage -> getClientOriginalExtension();
            $getSingleimage ->  move(public_path('backend/assets/img/blog/post') ,$singleimguname );
        }

        //Gallery Image Uplaod
        $gallImages   = [];
        if ($request->hasFile('gallery')) {
            $gallery_image_get = $request -> file('gallery');

            foreach ($gallery_image_get as $gallimage) {
               $galleryuname = md5(time().rand()).'.'.$gallimage -> getClientOriginalExtension();
               $gallimage -> move(public_path('backend/assets/img/blog/post') , $galleryuname );
                array_push( $gallImages , $galleryuname);
            }

        }



        $featured = [

            'post_type'     => $request -> post_type,
            'single'        =>  $singleimguname,
            'gallery'       => $gallImages,
            'video'         => $request->video,
            'audio'         => $request->audio,

        ];

        $post_data =  Post::create([

            'user_id'   => Auth::user()->id,
            'name'      => $request -> name,
            'slug'      => Str::slug($request->name),
            'featured'  => json_encode($featured),
            'content'   => $request -> content,
        ]);

        $post_data -> categories() ->attach($request -> cats);
        $post_data -> tags() ->attach($request-> tags);

        return redirect()->back();


    }

    //Post Edit

    public function postedit($id)
    {
        $post_edit_id = Post::find($id);
        $allcategory    = Category::where('status' , 'Active')->latest()->get();
        $alltags        = Tag::where('status' , 'Active')->latest()->get();


        return view('backend.blog.posts.edit-post' ,[

            'edit_data'     => $post_edit_id,
            'allcats'       => $allcategory,
            'alltags'       => $alltags,


        ]);




    }








}
