<!DOCTYPE html>
<html lang="ar" data-textdirection={{app()->getLocale() === 'ar' ? 'rtl' : 'ltr'}}>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('backend/images/favicon.ico')}}">

    <title> Admin - Dashboard</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{asset('backend/css/vendors_css.css')}}">

    <!-- Style-->
{{--    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('backend/css/style_rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/skin_color.css') }}">

    {{--    toaster.js css  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
          integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">

    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.js"></script>

</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed" >

<div class="wrapper">

@include('admin.body.header')


<!-- Left side column. contains the logo and sidebar -->
@include('admin.body.sidebar')



<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


        @yield('admin')


    </div>
    <!-- /.content-wrapper -->


@include('admin.body.footer')



<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->


<!-- Vendor JS -->
<script src="{{ asset('backend/js/vendors.min.js')}}"></script>
<script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('assets/vendor_components/easypiechart/dist/jquery.easypiechart.js') }}"></script>
<script src="{{ asset('assets/vendor_components/apexcharts-bundle/irregular-data-series.js') }}"></script>
<script src="{{ asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>

<!-- Sunny Admin App -->
<script src="{{ asset('backend/js/template.js')}}"></script>
<script src="{{asset('backend/js/pages/dashboard.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>

    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}"
    switch (type) {
        case 'info':
            toastr.info(" {{ Session::get('message') }}  ");
            break;

        case 'success':
            toastr.success(" {{ Session::get('message') }}  ");
            break;

        case 'warning':
            toastr.warning(" {{ Session::get('message') }}  ");
            break;

        case 'error':
            toastr.error(" {{ Session::get('message') }}  ");
            break;

    }
    @endif

</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script src="{{asset('assets/vendor_components/datatable/datatables.min.js')}}"></script>
<script src="{{asset('backend/js/pages/data-table.js')}}"></script>
<script src="{{ asset('../assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js') }}"></script>
{{-- CK EDITOR  --}}
<script src="{{asset('../assets/vendor_components/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('backend/js/pages/editor.js')}}"></script>

<script src="{{asset('assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js')}}"></script>

{{--sweet alert file --}}
<script src="{{asset('backend/js/code.js')}}"></script>

</body>
</html>
