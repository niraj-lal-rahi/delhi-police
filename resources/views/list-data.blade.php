@extends('layout.header')
@section('container')



  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">


<!-- ============================================================== -->
    <!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">

        <!-- Page-Title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title mb-1">Select your court</h4>
                        <!-- <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Select your court</a></li>
                         <li class="breadcrumb-item active">Search by Order Date</li>
                        </ol> -->
                    </div>
                    <div class="col-md-4">
                        <div class="float-right d-none d-md-block">
                            <div class="dropdown">
                                <button class="btn btn-light btn-rounded dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-settings-outline mr-1"></i> Settings
                                </button>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @if(session('errors'))
                <div class="alert alert-danger" role="alert">
                    {{session('errors')}}
                </div>
                @endif

                <div class="links">



                    <ol>

                        <li><a href="index" target="_blank">Center Delhi</a></li>

                        <li><a href="east-delhi" target="_blank">East Delhi</a></li>
                        <li><a href="new-delhi" target="_blank">New Delhi</a></li>

                        <li><a href="north-delhi" target="_blank">North Delhi</a></li>
                        <li><a href="south-delhi" target="_blank">South Delhi</a></li>

                        <li><a href="west-delhi" target="_blank">West Delhi</a></li>
                        <li><a href="south-west-delhi" target="_blank">South West Delhi</a></li>

                        <li><a href="south-east-delhi" target="_blank">South East Delhi</a></li>
                        <li><a href="shahdra" target="_blank">Shahadra</a></li>

                        <li><a href="north-east-delhi" target="_blank">North East Delhi</a></li>
                        <li><a href="north-west-delhi" target="_blank">North West Delhi</a></li>

                    </ol>



                </div>
                </div>
</div>
</div>
<!-- end col -->
</div>

@endsection
