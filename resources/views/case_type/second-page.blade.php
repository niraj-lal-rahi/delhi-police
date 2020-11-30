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
                        <li class="breadcrumb-item active">Second Page : </li>
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

                                {!! $data->data !!}

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

    $.each($("table.history_table tr td:nth-child(3) a"),function(key,val){
        var third_url = "{{ url('case-type/third-page/'.$data->id) }}/"+(key+1);
        var date_html =  "<a href='"+third_url+"' target='_blank'>"+$(this).html()+"</a>";
        $(this).parent().html(date_html);

    });

    $('#historyheading').hide();
    var table_content = $("table.history_table").html();
    var heading = '<thead><tr><th colspan="5"><h2 class="h2class" style="text-align: center;" >History of Case Hearing</h2></th></tr></thead>';
    $("table.history_table").html(heading+table_content);

    var new_url = "{{ route('display') }}";
    $.each($("table.order_table tr td:nth-child(3) a"),function(){
        console.log($(this).attr("href"));
        let old_link = $(this).attr("href");
        let new_link = old_link.replace("display_pdf.php",new_url);
        $(this).attr("href",new_link);


    })


});

</script>

@endsection
@endsection

