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
                        <li class="breadcrumb-item active">Search in Pdf Text</li>
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
                <div class="table-responsive">

                    <table id="showList3" class="bordered table table-centered table-hover mb-0 dataTable no-footer">
                        <thead>
                            <tr >
                            <th style="font-weight:bold;" width="5%">Sr No</th>
                            <th style="font-weight:bold;text-align:left;" width="45%">Content</th>
                            {{-- <th style="font-weight:bold;text-align:center;" width="20%">Order Date</th> --}}
                            <th style="font-weight:bold;text-align:center;" width="25%">Download</th>
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
<script src="//cdn.datatables.net/plug-ins/1.10.21/features/searchHighlight/dataTables.searchHighlight.min.js"></script>
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"> </script>
<script src="http://bartaz.github.io/sandbox.js/jquery.highlight.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/1.10.21/features/searchHighlight/dataTables.searchHighlight.css" />
<script>

$(document).ready(function(){

    var table = $('#showList3').DataTable({
        searchHighlight: true,
        processing: true,
        serverSide: true,
        ajax: {
            "url" : "{{ route('pdf-content') }}",
            // "data" : function ( d ) {
            //     return $.extend( {}, d, {
            //         "from_date": $("#from_date").val(),
            //         "to_date":$("#to_date").val()
            //     });
            // },
        },

        columns: [
            {
                data: 'id',
                name: 'id',
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { data: 'text', name: 'text' },
            { data: 'action', name: 'link' }
        ]
    });

    table.on( 'draw', function () {
        var body = $( table.table().body() );

        body.unhighlight();
        if ( table.rows( { filter: 'applied' } ).data().length ) {

            console.log(table.search(),'-------------------search txt');
            body.highlight( table.search() );
        }
    });

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

