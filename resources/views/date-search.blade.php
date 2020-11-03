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
                        <li class="breadcrumb-item active">Search by Order Date</li>
                        </ol>
                    </div>
                    {{-- <div class="col-md-4">
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
                <div class="table-responsive">
                    {{-- <div class="col-md-2">
                        <input type="text" name="date_picker" class="form-control" placeholder="From Date" readonly />
                        <input type="hidden" name="from_date" id="from_date" class="form-control" placeholder="From Date" readonly />
                        <input type="hidden" name="to_date" id="to_date" class="form-control" placeholder="To Date" readonly />

                    </div> --}}

                    <div class="row">
                        <div class="col-sm-6" style="background-color:lavender;padding-top: 10px; padding-left: 20px;">Select date range</div>
                        <div class="col-sm-6" style="background-color:lavenderblush;padding-top: 10px; padding-left: 20px;">
                            <input type="text" name="date_picker" class="form-control" placeholder="From Date" readonly />
                            <input type="hidden" name="from_date" id="from_date" class="form-control" placeholder="From Date" readonly />
                            <input type="hidden" name="to_date" id="to_date" class="form-control" placeholder="To Date" readonly />
                        </div>
                      </div>


                       <div class="row " style="
                       margin-bottom: 50px;
                   " >
                        <div class="col-sm-6" style="background-color:lavender;padding-top: 10px; padding-left: 20px;">Select Court</div>
                        <div class="col-sm-6" style="background-color:lavenderblush;padding-top: 10px; padding-left: 20px;">
                            <select name="court" id="court" >
                                <option value="0" selected>Select court </option>
                                @foreach ($courtList as $list)
                                    <option value="{{ $list->id }}">{{ $list->court_name }}</option>
                                @endforeach
                            </select>
                        </div>
                      </div>

                    {{-- <div class="col-md-2">
                        <select name="court" id="court">
                            <option value="0" selected>Select court </option>
                            @foreach ($courtList as $list)
                                <option value="{{ $list->id }}">{{ $list->court_name }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    {{-- <div class="col-md-4">
                        <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" readonly />
                    </div> --}}
                    <table id="showList3" class="bordered table table-centered table-hover mb-0 dataTable no-footer">
                        <thead>
                            <tr >
                            <th style="font-weight:bold;" width="5%">Sr No</th>
                            <th style="font-weight:bold;text-align:left;" width="45%">Case Type/Case Number/Case Year</th>
                            <th style="font-weight:bold;text-align:center;" width="20%">Order Date</th>
                            <th style="font-weight:bold;text-align:center;" width="25%">Order Number</th>
                            </tr>
                        </thead>
                        {{-- <tbody>
                            @foreach ($data as $key => $list )
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $list->case_number }}</td>
                                    <td>{{ $list->order_date }}</td>
                                    <td>{!! $list->link !!}</td>

                                </tr>
                            @endforeach
                        </tbody> --}}

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

    table = $('#showList3').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            "url" : url,
            "data" : function ( d ) {
                return $.extend( {}, d, {
                    "from_date": $("#from_date").val(),
                    "to_date":$("#to_date").val()
                });
            },
        },

        columns: [
            {
                data: 'id',
                name: 'id',
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { data: 'case_number', name: 'case_number' },
            { data: 'order_date', name: 'order_date' },
            { data: 'action', name: 'link' }
        ]
    });
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

