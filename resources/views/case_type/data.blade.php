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
                    {{-- <div class="col-md-8">
                        <h4 class="page-title mb-1">Case Type  Requests:</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Case Type</a></li>
                        <li class="breadcrumb-item active">Requests</li>
                        </ol>
                    </div> --}}

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
                                <th style="font-weight:bold;text-align:left;" >FIR Number</th>
                                <th style="font-weight:bold;text-align:center;">Police Station</th>
                                <th style="font-weight:bold;text-align:left;" >Case Number</th>
                                <th style="font-weight:bold;text-align:center;">Petitioner Name</th>
                                <th style="font-weight:bold;text-align:center;">Last Hearing Date</th>
                                <th style="font-weight:bold;text-align:center;" >Next Hearing Date</th>
                                <th style="font-weight:bold;text-align:center;" >Judge</th>
                                <th style="font-weight:bold;text-align:center;display: block;
                                word-wrap: break-word !important;" width="10%" >Section(s)</th>
                                <th style="font-weight:bold;text-align:center;" >Acts</th>
                                <th style="font-weight:bold;text-align:center;" >Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $key => $lists )
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ Str::replaceArray(':', [''], $lists->fir_number)}}</td>
                                    <td>{{ Str::replaceArray(':', [''],$lists->police_station) }}</td>
                                    <td>{{ Str::replaceArray(':', [''],$lists->case_number)}}</td>
                                    <td>{{ Str::replaceArray(':', [''],$lists->party_name) }}</td>
                                    <td>{!! Str::replaceArray(':', [''],$lists->last_hearing_date) !!}</td>
                                    <td>{{ Str::replaceArray(':', [''],$lists->nxt_hearing_date) }}</td>
                                    <td>{!! Str::replaceArray(':', [''],$lists->judge) !!}</td>
                                    <td style="width: 10%;display: block;
                                    word-wrap: break-word !important;">
                                        @if(count($lists->acts))
                                            @foreach($lists->acts as $key => $value)
                                                {{ $value->sections }} <br/>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        @if(count($lists->acts))
                                            @foreach($lists->acts as $key => $value)
                                                {{ $value->act }} <br/>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td><a href="{{ route('case-type.second-page',['id' => $lists->case_type_parents]) }}"> View </a></td>

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
    // $(document).on("change","#court",function(){
    //     url = "{{ url('data/list/') }}/"+$(this).val();

    //     table.ajax.url(url).load();

    // });
    // var route = "{{ route('display') }}";
    // $.each($('a'),function(){
    //     // console.log($(this).attr('href'));
    //     var url = $(this).attr('href');
    //     var new_url = url.replace('display_pdf.php',route);

    //     $(this).attr('href',new_url);
    //     // console.log(new_url);
    // })





    // $('input[name="date_picker"]').on('apply.daterangepicker', function(ev, picker) {
    //     console.log(picker.endDate.format('MM/DD/YYYY'),'---------------pickr apply');
    //     $("#to_date").val(picker.endDate.format('MM/DD/YYYY'));
    //     $("#from_date").val(picker.startDate.format('MM/DD/YYYY'));
    //     table.draw();
    // //   $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
    // });
})

</script>

@endsection
@endsection

