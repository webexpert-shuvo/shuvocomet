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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Posts</h4>
                        <br>
                        <a  href="{{ route('craetepost') }}" class="btn btn-sm btn-success ">Add New Post</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Categorys</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="all_posts">
                                    @foreach ($allposts as $posts)
                                        <tr>
                                            <td>{{ $loop -> index+1 }}</td>
                                            <td>{{ $posts -> name }}</td>
                                            <td>
                                                <ul>
                                                    @foreach ($posts -> categories as $cats)
                                                        <li>{{ $cats -> name }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>
                                                <ul>
                                                    @foreach ($posts -> tags as $tags)
                                                        <li>{{ $tags -> name }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>{{ $posts -> created_at -> diffForHumans() }}</td>
                                            <td>
                                                <a  class="btn btn-sm btn-info post_edit_btn" href="{{ route('postedit' ,$posts -> id ) }}"><i class="fa fa-edit"></i></a>

                                            </td>

                                        </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>


@endsection
