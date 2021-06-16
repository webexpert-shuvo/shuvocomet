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
                        <h4 class="card-title">All Tags</h4>
                        <br>
                        <a  href="" class="btn btn-sm btn-success addnewtag">Add New Tag</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tag</th>
                                        <th>Slug</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="all_tags">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>

    {{-- Add New Tag Modal Start --}}
    <div id="tag_add_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Add New Tag</h3>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form  id="tag_modal_form" action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <input name="name" type="text" placeholder="Tag Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Add Tag" class="btn btn-sm btn-success">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Add New Tag Modal End --}}
      {{-- Add New Tag Modal Start --}}
      <div id="tag_edit_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Edit Your Tag</h3>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form  id="tag_edit_form" action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <input name="name" type="text" placeholder="Tag Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <input name="tagid" type="hidden" placeholder="Tag id" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Add Tag" class="btn btn-sm btn-success">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Add New Tag Modal End --}}

@endsection
