<!DOCTYPE html>
<html lang="en"> 
<head>
    <title> @yield('title', 'Trang quản trị') </title>
        
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Admin Dashboard VTNN Khai Mai">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="{{ asset('/LogoVTNN.jpg') }}"> 

    <!-- FontAwesome JS-->
    <script defer src="/admins/assets/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="/admins/assets/css/portal.css">

    <!-- alert Jquery-->  
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
    <!-- App CKeditor -->  
    <script src="/ckeditor/ckeditor.js"></script>

    <script src="{{ asset('admins/assets/js/main.js') }}"></script> 
    <meta name="csrf-token" content="{{ csrf_token() }}">
{{-- <script src="{{ asset('admins/base.js') }}"></script> --}}

</head>
<body class="app">   	
    
    @include('admin.layouts.header')
    @include('admin.layouts.sidebar')

    
    <div class="app-wrapper">

    @yield('content')

    </div><!--//app-content-->

@include('admin.layouts.footer')
