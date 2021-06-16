@extends('backend.layouts.app.app')

@section('admin-content')
<div class="content container-fluid">

    			<!-- Header -->
                @include('backend.layouts.app.header')
                <!-- /Header -->

                <!-- Sidebar -->
                @include('backend.layouts.app.menu')

    <div class="page-wrapper">
          <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Welcome Admin!</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

        <div class="row">
            <div class="col-xl-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h4 class="card-title">Create A New Post</h4>
                    </div>
                    <div class="card-body">
                        <form id="blog_post_form" action="{{ route('postcreate') }}"  method="POST" enctype="multipart/form-data"  >
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Selete Post Type</label>
                                <div class="col-lg-9">
                                    <select name="post_type" id="post_type" class="form-control">
                                        <option value="--Slect--">Select</option>
                                        <option value="Image">Image</option>
                                        <option value="Gallery">Gallery</option>
                                        <option value="Video">Video</option>
                                        <option value="Audio">Audio</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Post Title</label>
                                <div class="col-lg-9">
                                    <input name="name" value="{{ $edit_data -> name }}" type="text" class="form-control" placeholder="Post Title">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Categories</label>
                                <div class="col-lg-9">
                                    @foreach ($allcats as $cats)
                                        <div class="checkbox">
                                            <label for="cat{{ $cats ->id }}">
                                                <input value="{{ $cats ->id }}" type="checkbox" id="cat{{ $cats ->id }}" name="cats[]"> {{ $cats ->name }}
                                            </label>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Tags</label>
                                <div class="col-lg-9">
                                    <select class="tags form-control" name="tags[]" multiple="multiple">

                                        @foreach ($alltags as $tags)
                                            <option value="{{ $tags -> id }}">{{ $tags -> name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="single">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Feature Image</label>
                                    <div class="col-lg-9">
                                        <div class="single_image">

                                        </div>

                                        <input id="single_image_field" name="single" type="file" >
                                    </div>
                                </div>
                            </div>

                            <div class="gallery">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Feature Image</label>
                                    <div class="col-lg-9">
                                        <div class="gallery_image">

                                        </div>

                                        <input id="gallery_image_field" type="file" name="gallery[]" multiple >
                                    </div>
                                </div>
                            </div>

                            <div class="video">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Video Link</label>
                                    <div class="col-lg-9">
                                        <input name="video" type="text" class="form-control" placeholder="Video Link">
                                    </div>
                                </div>
                            </div>

                            <div class="audio">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Audio Link</label>
                                    <div class="col-lg-9">
                                        <input name="audio" type="text" class="form-control" placeholder="Audio Link">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Content</label>
                                <div class="col-lg-9">
                                    <textarea name="content" value="{{ $edit_data -> content }}"></textarea>
                                </div>
                            </div>
                            <div class="text-right">
                                <input type="submit" value="Add Post" class="btn btn-sm btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>



</div>


@endsection
