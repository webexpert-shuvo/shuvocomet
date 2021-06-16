<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:20 GMT -->
<head>
    @include('backend.layouts.app.particial.head-script')

    </head>
    <body>

		<!-- Main Wrapper -->
        <div class="main-wrapper">

			{{-- <!-- Header -->
            @include('backend.layouts.app.header')
			<!-- /Header -->

			<!-- Sidebar -->
            @include('backend.layouts.app.menu') --}}
			<!-- /Sidebar -->

			<!-- Page Wrapper -->


                @section('admin-content')

                @show



			<!-- /Page Wrapper -->

        </div>
		<!-- /Main Wrapper -->
    @include('backend.layouts.app.particial.footer-script')


    </body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:34 GMT -->
</html>
