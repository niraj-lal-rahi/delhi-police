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
                        <h4 class="page-title mb-1">Search :</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Court Orders</a></li>
                        <li class="breadcrumb-item active">Search by Order Date</li>
                        </ol>
                    </div>

                </div>

            </div>
        </div>
        <!-- end page title end breadcrumb -->
        <div class="container-fluid">

            <div class="row" style="margin-top: 10px;margin-bottom:10px;"  >
                <div class="col-sm-4">State</div>
                <div class="col-sm-4">District</div>
                <div class="col-sm-4">Forum</div>
            </div>


            <div class="row" style="padding: 0 0 50px; 0">
                <div class="col-sm-4">
                    <select name="state" id="state" style="width:90%; padding:10px; text-align:left;">
                        <option value="delhi">Delhi</option>

                    </select>

                </div>
                <div class="col-sm-4">
                    <select name="district" id="district" style="width:90%; padding:10px; text-align:left;">
                        <option value="">Select District Court</option>
                        @foreach ($courts as $key =>$court)
                            <option value="{{ $key }}">{{ $court }}</option>
                        @endforeach
                    </select>

                </div>

                <div class="col-sm-4">

                    <select name="court_type" id="court_type" style="width:90%; padding:10px; text-align:left;">
                        <option value="">Select Court type</option>
                        <option value="1">Court Complex</option>
                        <option value="2">Court Establish</option>
                    </select>


                </div>


            </div>
            <div class="w3-bar w3-black">
                <div class="row">
                <div class="col-sm-4">
                    <button style="width:90%; background:#3051D3; color:#fff; border:none; padding:10px; text-align:left;"
                    class="w3-bar-item w3-button London" onclick="openCity('London')">By case number</button></div>
                <div class="col-sm-4"><button style="width:90%; background:#000505;  color:#fff; border:none; padding:10px; text-align:left;"
                    class="w3-bar-item w3-button Paris" onclick="openCity('Paris')">By name</button></div>
                <div class="col-sm-4">
                    <button style="width:90%; background:#000505;  color:#fff; border:none; padding:10px; text-align:left;"
                    class="w3-bar-item w3-button Tokyo" onclick="openCity('Tokyo')">By date</button></div>
                </div>
            </div>

            <div id="London" class="w3-container city"  style="padding: 20px 0 10px; 0">
                <p>Case Number</p>

                    <input type="text" id="case_no" style="width:29%; background:#fff; border:1px solid #D2D2D2!important;  border:none; padding:10px; text-align:left;" name="gsearch">
                    <input type="submit" style="width:10%; background:#44C863; color:#fff; border:none; padding:10px; text-align:left;">

            </div>

            <div id="Paris" class="w3-container city" style="display:none; padding: 20px 0 10px; 0">
                <p>By Name</p>

                    <input type="text" id="name" style="width:29%; background:#fff; border:1px solid #D2D2D2!important;  border:none; padding:10px; text-align:left;" name="gsearch">
                    <input type="submit" style="width:10%; background:#44C863; color:#fff; border:none; padding:10px; text-align:left;">

            </div>

            <div id="Tokyo" class="w3-container city" style="display:none; padding: 20px 0 10px; 0">
                <p>By Date</p>

                    <input type="text" name="date_picker" style="width:29%; background:#fff; border:1px solid #D2D2D2!important; border:none; padding:10px; text-align:left;" placeholder="Select Date" readonly />
                    <input type="hidden" name="from_date" id="from_date" class="form-control" placeholder="From Date" readonly />
                    <input type="hidden" name="to_date" id="to_date" class="form-control" placeholder="To Date" readonly />
                    {{-- <input type="text" id="gsearch" style="width:29%; background:#fff; border:1px solid #D2D2D2!important; color:#fff; border:none; padding:10px; text-align:left;" name="gsearch"> --}}
                    <input type="submit" style="width:10%; background:#44C863; color:#fff; border:none; padding:10px; text-align:left;">

            </div>
        </div>


        <div class="page-content-wrapper" style="margin-top : 50px;">
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
                <script type="text/javascript" src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"> </script>
                <script>
                    function openCity(cityName) {
                        $(".w3-bar-item").css('background',"#000505");

                        $("."+cityName).css('background',"#3051D3");

                        $('input[type="text"]').val('');
                        $('input[type="hidden"]').val('');

                        var i;
                        var x = document.getElementsByClassName("city");
                        for (i = 0; i < x.length; i++) {
                            x[i].style.display = "none";
                        }
                        document.getElementById(cityName).style.display = "block";
                    }
                </script>
                <script>

                $(document).ready(function(){

                    $('input[name="date_picker"]').daterangepicker();


                    // var route = "{{ route('display') }}";
                    // $.each($('a'),function(){
                    //     // console.log($(this).attr('href'));
                    //     var url = $(this).attr('href');
                    //     var new_url = url.replace('display_pdf.php',route);

                    //     $(this).attr('href',new_url);
                    //     // console.log(new_url);
                    // })



                    var table = $('#showList3').DataTable({
                        processing: true,
                        serverSide: true,
                        searching: false,
                        ajax: {
                            "url" : "{{ route('json.data') }}",
                            "data" : function ( d ) {
                                return $.extend( {}, d, {
                                    "from_date": $("#from_date").val(),
                                    "to_date":$("#to_date").val(),
                                    "district" : $("#district").val(),
                                    "court_type" : $("#court_type").val(),
                                    "case_no" : $("#case_no").val(),
                                    "name" : $("#name").val(),
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

                    $('input[name="date_picker"]').on('apply.daterangepicker', function(ev, picker) {
                        console.log(picker.endDate.format('MM/DD/YYYY'),'---------------pickr apply');
                        $("#to_date").val(picker.endDate.format('MM/DD/YYYY'));
                        $("#from_date").val(picker.startDate.format('MM/DD/YYYY'));
                        table.draw();
                    //   $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
                    });

                    $(document).on("change","select",function(){

                        $('input[type="text"]').val('');
                        $('input[type="hidden"]').val('');
                        table.draw();
                        // url = "{{ url('data/list/') }}/"+$(this).val();

                        // table.ajax.url(url).load();
                    });

                    $(document).on("click","input[type='submit']",function(){

                        // $('input[type="text"]').val('');
                        // $('input[type="hidden"]').val('');
                        table.draw();
                        // url = "{{ url('data/list/') }}/"+$(this).val();

                        // table.ajax.url(url).load();
                        });
                    })

                </script>

            @endsection
@endsection

