<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TagController extends Controller
{
    //Show tag Page

    public function Index()
    {
        return view('backend.blog.tag.index');
    }

    //Tag Create
    public function Create(Request $request)
    {
        Tag::create([

            'name'      => $request->name,
            'slug'      => Str::slug($request->name),
        ]);

    }

    //All Tag
    public function tagAll()
    {
        $alltags =  Tag::all();
        $content = '';
        $i = 1;

        foreach ($alltags as $tag) {

            //Tag Status Show
            if ($tag -> status == 'Active') {
                $tag_status = '<span class="badge badge-success">Active</span>';
            } else {
                $tag_status = '<span class="badge badge-danger">Inactive</span>';
            }

            //Tag Action
            if ($tag -> status == 'Active') {
               $tag_btn = '<a  tag_action_id="'. $tag -> id.'" href="" class="btn btn-sm btn-danger tag_status_btn" > <i class="fa fa-eye-slash"></i></a>';
            } else {
                $tag_btn = '<a tag_action_id="'. $tag -> id.'"  href="" class="btn btn-sm btn-success tag_status_btn" > <i class="fa fa-eye"></i></a>';
            }

            $content .= '<tr>';
            $content .= '<td>'.$i ; $i ++.'</td>';
            $content .= '<td>'.$tag -> name.'</td>';
            $content .= '<td>'.$tag -> slug.'</td>';
            $content .= '<td>'.$tag -> created_at -> diffForHumans().'</td>';
            $content .= '<td>'.$tag_status.'</td>';
            $content .= '<td>'.$tag_btn.' <a tag_edit_id="'.$tag -> id.'" href="" class="btn btn-sm btn-info tatgedit_btn"><i class="fa fa-edit"></i></a> <a tag_delete_id="'.$tag -> id.'"  class="btn btn-sm btn-danger tag_delete_btn" href=""><i class="fa fa-trash"></i></a> </td>';
            $content .= '</tr>';
        }

        echo $content;


    }

    //Tag Status
    public function tagStatus($id)
    {
        $tag_status_id = Tag::find($id);

        if ($tag_status_id -> status == 'Active') {
            $tag_status_id -> status = 'Inactive';
            $tag_status_id -> update();
        } else {
            $tag_status_id -> status = 'Active';
            $tag_status_id -> update();
        }

    }

    //Tag Edit Form Show
    public function tagEditForm($id)
    {
        $tagEdit_id = Tag::find($id);

        return  [

            'name'   => $tagEdit_id -> name,
            'id'     => $tagEdit_id -> id,

        ];

    }

    //Tag Update Form
    public function tagUpdateForm(Request $request , $id)
    {
        $tageditform_id = Tag::find($id);
        $tageditform_id -> name = $request -> name;
        $tageditform_id -> slug = Str::slug($request -> name);
        $tageditform_id -> update();
    }

    //Tag Delete

    public function tagdelete($id)
    {
        $tagdelete_id =  Tag::find($id);
        $tagdelete_id -> delete();
        $tagdelete_id -> update();


    }









}
