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
                        <h4 class="page-title mb-1">Display:</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Court Orders</a></li>
                        <li class="breadcrumb-item active">System Log</li>
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
                    <table id="showList3" class="bordered table table-centered table-hover mb-0 dataTable no-footer">
                        <thead>
                            <tr >
                            <th style="font-weight:bold;" width="5%">Sr No</th>
                            <th style="font-weight:bold;text-align:left;" width="45%">Court</th>
                            <th style="font-weight:bold;text-align:center;" width="20%">Date Range</th>
                            <th style="font-weight:bold;text-align:center;" width="25%">Submit Date</th>
                            <th style="font-weight:bold;text-align:center;" width="25%">Data Collection</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($log as $key => $list )
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $courts[$list->site_id] }}</td>
                                    <td>{{ $list->from_date }} to {{ $list->to_date }}</td>
                                    <td>{!! $list->created_at !!}</td>
                                    <td>{{ count($list->dataCollection) }}</td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>
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

    $('input[name="date_picker"]').daterangepicker();
    var table;
    var default_val = 0;
    var url = "{{ url('data/list/') }}/"+default_val;

    table = $('#showList3').DataTable();
    $(document).on("change","#court",function(){
        url = "{{ url('data/list/') }}/"+$(this).val();

        table.ajax.url(url).load();

    });
    // var route = "{{ route('display') }}";
    // $.each($('a'),function(){
    //     // console.log($(this).attr('href'));
    //     var url = $(this).attr('href');
    //     var new_url = url.replace('display_pdf.php',route);

    //     $(this).attr('href',new_url);
    //     // console.log(new_url);
    // })





    $('input[name="date_picker"]').on('apply.daterangepicker', function(ev, picker) {
        console.log(picker.endDate.format('MM/DD/YYYY'),'---------------pickr apply');
        $("#to_date").val(picker.endDate.format('MM/DD/YYYY'));
        $("#from_date").val(picker.startDate.format('MM/DD/YYYY'));
        table.draw();
    //   $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
    });
})

</script>

@endsection
@endsection

