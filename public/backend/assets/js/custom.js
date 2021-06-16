(function($){

    //Document ready
    $(document).ready(function(){

        //Logout Form
        $(document).on('click','a.logout_btn_header',function(e){
            e.preventDefault();
            $('form#logout_form').submit();
        });

        //Tag Add Modal Show
        $(document).on('click','a.addnewtag',function(e){
            e.preventDefault();
            $('#tag_add_modal').modal('show');
        });

        //All Tags

        function allTag(){

            $.ajax({
                url : '/tag-all',
                success : function(data){
                    $('tbody#all_tags').html(data);
                }
            });
        }
        allTag();


        //Tag Create
        $('form#tag_modal_form').submit(function(e){
            e.preventDefault();

            $.ajax({

                url : '/tag',
                method : "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success : function(data){
                    $('form#tag_modal_form')[0].reset();
                    $('#tag_add_modal').modal('hide');
                    swal({
                        title: "Success!",
                        text: "Tag Added Successful",
                        icon: "success",
                        button: "Aww yiss!",
                      });
                      allTag();
                }
            });
        });

        //Tag Status Btn Action
        $(document).on('click','a.tag_status_btn',function(e){
            e.preventDefault();
            let tag_status_id = $(this).attr('tag_action_id');
            $.ajax({

                url : '/tag-active/'+tag_status_id,
                success : function(data){
                    swal({
                        title: "Success!",
                        text: "Tag Status Updated Successful",
                        icon: "success",
                        button: "Aww yiss!",
                      });
                      allTag();
                }
            });
        });

        //Tag Edit
        $(document).on('click','a.tatgedit_btn',function(e){
            e.preventDefault();
            $('#tag_edit_modal').modal('show');
            let tagEdit_id = $(this).attr('tag_edit_id');
            $.ajax({

                url : '/tag-editdata/'+tagEdit_id,
                success : function(data){
                    $('form#tag_edit_form input[name="name"]').val(data.name);
                    $('form#tag_edit_form input[name="tagid"]').val(data.id);

                }
            });

            //Tag Edit Form Submit
            $('form#tag_edit_form').submit(function(e){
                e.preventDefault();
                $.ajax({

                    url : '/tag-editdata/'+tagEdit_id,
                    method : "POST",
                    data  : new FormData(this),
                    contentType: false,
                    processData : false,
                    success : function(data){
                        $('form#tag_edit_form')[0].reset();
                        swal({
                            title: "Success!",
                            text: "Tag Edit Updated Successful",
                            icon: "success",
                            button: "Aww yiss!",
                        });
                        $('#tag_edit_modal').modal('hide');
                        allTag();
                    }

                });

            });
        });

        //Tag Delete
        $(document).on('click','a.tag_delete_btn',function(e){
            e.preventDefault();
            let tagDeleteId = $(this).attr('tag_delete_id');
            $.ajax({
                url : '/tag-delete/'+tagDeleteId,
                success : function(data){
                    swal({
                        title: "Success!",
                        text: "Tag Deleted Successful",
                        icon: "success",
                        button: "Aww yiss!",
                    });
                    allTag();
                }
            });
        });

        //Category Modal Show

        $(document).on('click','a.addnewcat',function(e){
            e.preventDefault();
            $('#category_add_modal').modal('show');
        });

        //Cat All
        function  allCat(){

            $.ajax({

                url : '/category-all',
                success : function(data){
                    $('tbody#all_cats').html(data);
                }

            });

        }
        allCat();

        $('form#category_modal_form').submit(function(e){
            e.preventDefault();

            $.ajax({

                url : '/category',
                method : "POST",
                data : new FormData(this),
                contentType: false,
                processData : false,
                success : function(data){
                    $('#category_add_modal').modal('hide');
                    $('form#category_modal_form')[0].reset();
                    swal({
                        title: "Success!",
                        text: "Category Added Successful",
                        icon: "success",
                        button: "Aww yiss!",
                    });
                    allCat();

             }

            });

        });

        //Cate Status Update
        $(document).on('click','a.cat_s_btn',function(e){
            e.preventDefault();
            let cate_status_id = $(this).attr('cate_status_id');

            $.ajax({

                url : '/category-status/'+cate_status_id,
                success : function(data){
                    swal({
                        title: "Success!",
                        text: "Category Added Successful",
                        icon: "success",
                        button: "Aww yiss!",
                    });
                    allCat();
                }

            });

        });

        //Cate Form Data
        $(document).on('click','a.cate_edit_btn', function(e){
            e.preventDefault();
            $('#category_edit_modal').modal('show');
            let cat_edit_id = $(this).attr('cate_edit_id');

            $.ajax({
                url : '/category-editformdata/'+cat_edit_id,
                success : function(data){
                    $('form#category_edit_form input[name="name"]').val(data.name);
                }
            });


            $('form#category_edit_form').submit(function(e){
                e.preventDefault();

                $.ajax({

                    url : '/category-formeditupdate/'+cat_edit_id,
                    method: "POST",
                    data : new FormData(this),
                    contentType : false,
                    processData: false,
                    success: function(data){
                        $('form#category_edit_form')[0].reset();
                        swal({
                            title: "Success!",
                            text: "Category Added Successful",
                            icon: "success",
                            button: "Aww yiss!",
                        });
                        allCat();
                    }

                });
            });
        });

        //Category Delete
        $(document).on('click','a.cate_delete',function(e){
            e.preventDefault();

            let cate_delete_id = $(this).attr('cate_delete_id');

            $.ajax({

                url : '/category-delete/'+cate_delete_id,
                success : function(data){
                    swal({
                        title: "Success!",
                        text: "Category Deleted Successful",
                        icon: "success",
                        button: "Aww yiss!",
                    });
                    allCat();

                }
            });

        });

        //
        $('.tags').select2();
        CKEDITOR.replace( 'content' );

        //Blog Post Control
        $('select#post_type').change(function(e){
            e.preventDefault();
            let $postType = $(this).val();

            if ($postType == 'Image') {
                $('.single').show();
            } else {
                $('.single').hide();
            }

            if ($postType == 'Gallery') {
                $('.gallery').show();
            } else {
                $('.gallery').hide();
            }

            if ($postType == 'Video') {
                $('.video').show();
            } else {
                $('.video').hide();
            }

            if ($postType == 'Audio') {
                $('.audio').show();
            } else {
                $('.audio').hide();
            }
        });

        //single Image Upload

        $('#single_image_field').change(function(e){
            e.preventDefault();

            let single_image = URL.createObjectURL(e.target.files[0]);
            let single_img_data = '<img src="'+single_image+'" style="width:300px; height:300x; border:5px solid #252525; border-radious:4px;">';
            $('.single_image').html(single_img_data);
        });

        //Gallery Image Upload

        $('#gallery_image_field').change(function(e){
            e.preventDefault();

            gallimg = '';
            for (let i = 0; i < e.target.files.length; i++) {
                let gallery_img_url = URL.createObjectURL(e.target.files[i]);
                gallimg += '<img  src="'+gallery_img_url+'" style="width:80px; height:80px; margin:10px 5px; border:3px solid red;">';

            }

            $('.gallery_image').html(gallimg);
        });


        //Post  Edit



















    })
})(jQuery)
