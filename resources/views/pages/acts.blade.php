@extends('layout.header')
@section('container')

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
                        <h4 class="page-title mb-1">Acts</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">Acts</li>
                        </ol>
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
                                @if(session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{session('success')}}
                                </div>
                                @endif

                                <ol>
                                    <li>Delhi Police Act, 1978</li>
                                    <li>Central Motor Vehicles Act, 1988</li>
                                    <li>Dowry Prohibition Act, 1961</li>
                                    <li>Indian Penal Code, 1860</li>
                                    <li>Code of Criminal procedure, 1973</li>
                                    <li>Indian Evidence Act, 1872</li>
                                    <li>Arms Act, 1959</li>
                                    <li>Protection of Women from Domestic Violence Act, 2005</li>
                                    <li>Copyright Act, 1957</li>
                                    <li>Trade Mark Act, 1999</li>
                                    <li>Protection of Civil Rights Act, 1955</li>
                                    <li>Narcotics Drug and Psychotropic Substance Act, 1985</li>
                                    <li>Public Gambling Act, 1867</li>
                                    <li>Scheduled Castes and Scheduled Tribes (Prevention of Atrocities) Act, 1989</li>
                                    <li>Central Excise Act, 1985</li>
                                    <li>Delhi Excise Act, 2009</li>
                                    <li>Delhi Prevention of defacement of Property Act, 2007</li>
                                    <li>Protection of Children from Sexual Offences Act, 2012</li>
                                    <li>Real Estate Regulation and Development Authority Act, 2016</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
