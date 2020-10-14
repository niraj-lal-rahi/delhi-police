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
                        <h4 class="page-title mb-1">North Delhi:</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Court Orders</a></li>
                        <li class="breadcrumb-item active">Search by Order Date</li>
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
<form action="{{route('court.store')}}" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="court_url" value="https://services.ecourts.gov.in/ecourtindia_v4_bilingual/cases/s_orderdate.php?state=D&state_cd=26&dist_cd=4">
    <div class="form-check-inline form-group">

        <label class="form-check-label">
            <input type="radio" name="court_type" checked class="form-check-input" value="1">Court Complex
        </label>
        <label class="form-check-label">
            <input type="radio" name="court_type" class="form-check-input" value="2">Court Establishment
        </label>
   </div>


<div class="form-group">
    <label for="sel1">* Court Complex :</label>
    <select name="court_complex_code" id="court_complex_code" class="form-control">
        <option value="0">Select Court Complex</option>
        <option value="1@1,2,3,4@N">Rohini Court Complex</option>
    </select>
</div>
<div class="form-group" style="display: none;">
    <label for="sel1">*Court Establishment :</label>
    <select name="court_code" id="court_code" class="form-control">
        <option value="0">Select Court Establishment</option>
        <option value="1">District and Sessions Judge, North, RHC</option>
        <option value="2">Chief Metropolitan Magistrate, North, RHC</option>
        <option value="3">Senior Civil Judge cum RC, North, RHC</option>
        <option value="4">Principal Judge Family Court, North, RHC</option>
    </select>
</div>


   <div class="form-group">
        <label for="birthday">From Date:</label>
        <input type="text" id="fdate" name="from_date" readonly class="form-control">
   </div>


    <div class="form-group">
        <label for="birthday">To Date:</label>
        <input type="text" id="tdate" name="to_date" readonly class="form-control">
   </div>






   <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
<!-- end col -->
</div>
<!-- end row -->
@section('script')


<script>
$(document).ready(function(){


$(document).on('click','.form-check-input',function(){
if($(this).val() == '1'){
    $("#court_complex_code").parent().show();
    $("#court_code").parent().hide();
}else{
    $("#court_complex_code").parent().hide();
    $("#court_code").parent().show();
}



});
})
</script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {
$( "#fdate" ).datepicker({
dateFormat: 'dd-mm-yy',
maxDate: new Date()
});
} );
$( function() {
$( "#tdate" ).datepicker({
dateFormat: 'dd-mm-yy',
maxDate: new Date()
});
} );
</script>
@endsection
@endsection

