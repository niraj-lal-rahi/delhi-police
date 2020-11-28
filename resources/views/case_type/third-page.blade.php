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
                        <h4 class="page-title mb-1">Case Type Data:</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Case Type</a></li>
                        <li class="breadcrumb-item active">Third Page : </li>
                        </ol>
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
                                <div>

                                    @foreach($data as $key => $value)
                                        @if($row == ($key+1))
                                            {!! $value->data !!}
                                        @endif
                                    @endforeach



                </div>
            </div>
        </div>
    </div>
<!-- end col -->
</div>
<!-- end row -->
@section('script')
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"> </script>
<script>

$(document).ready(function(){
    // alert("dfsf");
    $.each($("table.history_table tr td:nth-child(3) a"),function(){
        var date_html = ($(this).html());
        $(this).parent().html(date_html);

    })

});

</script>

@endsection
@endsection

