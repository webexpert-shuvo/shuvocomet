<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //Show Category Page

    public function index()
    {
       return view('backend.blog.category.index');
    }

    //categoryStore
    public function categoryStore(Request $request)
    {
        Category::create([
            'name'      => $request -> name,
            'slug'      => Str::slug($request -> name),
        ]);
    }

    //All Category
    public function categoryAll()
    {
        $allcats =  Category::all();

        $content  = '';
        $i = 1;

        foreach ($allcats as $cats) {

            if ($cats -> status == 'Active') {
                $tag_status = '<span class="badge badge-success">Active</span>';
            } else {
                $tag_status = '<span class="badge badge-danger">Inactive</span>';

            }

            //Status btn

            if ($cats -> status == 'Active') {
                $cate_status_btn = '<a  cate_status_id="'.$cats -> id.'" href="" class="btn btn-sm btn-danger cat_s_btn"><i class="fa fa-eye-slash"></i></a>';
            } else {
                $cate_status_btn = '<a  cate_status_id="'.$cats -> id.'" href="" class="btn btn-sm btn-success cat_s_btn"><i class="fa fa-eye"></i></a> ';

            }



            $content  .= '<tr>';
            $content  .= '<td>'.$i; $i ++.'</td>';
            $content  .= '<td>'.$cats -> name.'</td>';
            $content  .= '<td>'.$cats -> slug.'</td>';
            $content  .= '<td>'.$cats -> created_at -> diffForHumans().'</td>';
            $content  .= '<td>'.$tag_status.'</td>';
            $content .= '<td>'.$cate_status_btn.' <a cate_edit_id="'.$cats -> id.'" href="" class="btn btn-sm btn-info cate_edit_btn"><i class="fa fa-edit"></i></a> <a cate_delete_id="'.$cats -> id.'" class="btn btn-sm btn-danger cate_delete" href="" ><i  class="fa fa-trash"></i></a>  </td>';
            $content  .= '</tr>';
        }

        echo $content;
    }

    //categorystatus

    public function categorystatus($id)
    {
        $cate_stastus_id =  Category::find($id);
        if ($cate_stastus_id -> status == 'Active') {
            $cate_stastus_id -> status = 'Inactive';
            $cate_stastus_id -> update();
        } else {
            $cate_stastus_id -> status = 'Active';
            $cate_stastus_id -> update();
        }
    }

    //Ctaegory Form Data
    public function editformdata($id)
    {
        $cat_form_data  = Category::find($id);

        return [
            'name'   => $cat_form_data -> name,
        ];
    }


    public function actformupdate(Request $request , $id)
    {
        $cat_update = Category::find($id);
        $cat_update -> name = $request -> name;
        $cat_update -> slug = Str::slug($cat_update -> name);
        $cat_update -> update();
    }

    //Delete Cate
    public function deletecategory($id)
    {
        $cate_delete_id =  Category::find($id);
        $cate_delete_id -> delete();
        $cate_delete_id -> update();
    }










}
