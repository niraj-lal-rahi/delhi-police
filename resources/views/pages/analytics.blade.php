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
                        <h4 class="page-title mb-1">Analytics</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Analytics</a></li>
                        <li class="breadcrumb-item active">District</li>
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


  <script type="text/javascript" src="https://www.google.com/jsapi"></script>

  <script>
 google.load('visualization', '1', {packages: ['corechart']});
google.setOnLoadCallback(drawMaterial);

function drawMaterial() {
       var data = google.visualization.arrayToDataTable([
        ['Element', ''],
 ['For Bail', 8],
 ['Arguments', 2],
 ['Miscellaneous appearance', 4],
 ['Defence evidence', 2],
 ['Arguments on charge', 8], // CSS-style declaration
     ]);

     var options = {
       vAxis:{format:' #,###'}
     };
   var formatter = new google.visualization.NumberFormat(
               {prefix: ' '}
           );
           formatter.format(data, 1);

     var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
     chart.draw(data, options);
   }
 </script>

     <script>
 google.load('visualization', '1', {packages: ['corechart']});
google.setOnLoadCallback(drawMaterial);

function drawMaterial() {
       var data = google.visualization.arrayToDataTable([
        ['Element', ''],
 ['For Bail', 8],
 ['Arguments', 2],
 ['Miscellaneous appearance', 4],
 ['Defence evidence', 2],
 ['Arguments on charge', 8], // CSS-style declaration
     ]);

     var options = {
       vAxis:{format:' #,###'}
     };
   var formatter = new google.visualization.NumberFormat(
               {prefix: ' '}
           );
           formatter.format(data, 1);

     var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
     chart.draw(data, options);
   }
 </script>

     <script>
 google.load('visualization', '1', {packages: ['corechart']});
google.setOnLoadCallback(drawMaterial);

function drawMaterial() {
       var data = google.visualization.arrayToDataTable([
        ['Element', ''],
 ['For Bail', 8],
 ['Arguments', 2],
 ['Miscellaneous appearance', 4],
 ['Defence evidence', 2],
 ['Arguments on charge', 8], // CSS-style declaration
     ]);

     var options = {
       vAxis:{format:' #,###'}
     };
   var formatter = new google.visualization.NumberFormat(
               {prefix: ' '}
           );
           formatter.format(data, 1);

     var chart = new google.visualization.ColumnChart(document.getElementById('chart_div2'));
     chart.draw(data, options);
   }
 </script>
         <script>
 google.load('visualization', '1', {packages: ['corechart']});
google.setOnLoadCallback(drawMaterial);

function drawMaterial() {
       var data = google.visualization.arrayToDataTable([
        ['Element', ''],
 ['For Bail', 8],
 ['Arguments', 2],
 ['Miscellaneous appearance', 4],
 ['Defence evidence', 2],
 ['Arguments on charge', 8], // CSS-style declaration
     ]);

     var options = {
       vAxis:{format:' #,###'}
     };
   var formatter = new google.visualization.NumberFormat(
               {prefix: ' '}
           );
           formatter.format(data, 1);

     var chart = new google.visualization.ColumnChart(document.getElementById('chart_div3'));
     chart.draw(data, options);
   }
 </script>
      <script>
 google.load('visualization', '1', {packages: ['corechart']});
google.setOnLoadCallback(drawMaterial);

function drawMaterial() {
       var data = google.visualization.arrayToDataTable([
        ['Element', ''],
 ['For Bail', 8],
 ['Arguments', 2],
 ['Miscellaneous appearance', 4],
 ['Defence evidence', 2],
 ['Arguments on charge', 8], // CSS-style declaration
     ]);

     var options = {
       vAxis:{format:' #,###'}
     };
   var formatter = new google.visualization.NumberFormat(
               {prefix: ' '}
           );
           formatter.format(data, 1);

     var chart = new google.visualization.ColumnChart(document.getElementById('chart_div4'));
     chart.draw(data, options);
   }
 </script>
       <script>
 google.load('visualization', '1', {packages: ['corechart']});
google.setOnLoadCallback(drawMaterial);

function drawMaterial() {
       var data = google.visualization.arrayToDataTable([
        ['Element', ''],
 ['For Bail', 8],
 ['Arguments', 2],
 ['Miscellaneous appearance', 4],
 ['Defence evidence', 2],
 ['Arguments on charge', 8], // CSS-style declaration
     ]);

     var options = {
       vAxis:{format:' #,###'}
     };
   var formatter = new google.visualization.NumberFormat(
               {prefix: ' '}
           );
           formatter.format(data, 1);

     var chart = new google.visualization.ColumnChart(document.getElementById('chart_div4'));
     chart.draw(data, options);
   }
 </script>
      <script>
 google.load('visualization', '1', {packages: ['corechart']});
google.setOnLoadCallback(drawMaterial);

function drawMaterial() {
       var data = google.visualization.arrayToDataTable([
        ['Element', ''],
 ['For Bail', 8],
 ['Arguments', 2],
 ['Miscellaneous appearance', 4],
 ['Defence evidence', 2],
 ['Arguments on charge', 8], // CSS-style declaration
     ]);

     var options = {
       vAxis:{format:' #,###'}
     };
   var formatter = new google.visualization.NumberFormat(
               {prefix: ' '}
           );
           formatter.format(data, 1);

     var chart = new google.visualization.ColumnChart(document.getElementById('chart_div5'));
     chart.draw(data, options);
   }
 </script>
      <script>
 google.load('visualization', '1', {packages: ['corechart']});
google.setOnLoadCallback(drawMaterial);

function drawMaterial() {
       var data = google.visualization.arrayToDataTable([
        ['Element', ''],
 ['For Bail', 8],
 ['Arguments', 2],
 ['Miscellaneous appearance', 4],
 ['Defence evidence', 2],
 ['Arguments on charge', 8], // CSS-style declaration
     ]);

     var options = {
       vAxis:{format:' #,###'}
     };
   var formatter = new google.visualization.NumberFormat(
               {prefix: ' '}
           );
           formatter.format(data, 1);

     var chart = new google.visualization.ColumnChart(document.getElementById('chart_div6'));
     chart.draw(data, options);
   }
 </script>
       <script>
 google.load('visualization', '1', {packages: ['corechart']});
google.setOnLoadCallback(drawMaterial);

function drawMaterial() {
       var data = google.visualization.arrayToDataTable([
        ['Element', ''],
 ['For Bail', 8],
 ['Arguments', 2],
 ['Miscellaneous appearance', 4],
 ['Defence evidence', 2],
 ['Arguments on charge', 8], // CSS-style declaration
     ]);

     var options = {
       vAxis:{format:' #,###'}
     };
   var formatter = new google.visualization.NumberFormat(
               {prefix: ' '}
           );
           formatter.format(data, 1);

     var chart = new google.visualization.ColumnChart(document.getElementById('chart_div7'));
     chart.draw(data, options);
   }
 </script>
       <script>
 google.load('visualization', '1', {packages: ['corechart']});
google.setOnLoadCallback(drawMaterial);

function drawMaterial() {
       var data = google.visualization.arrayToDataTable([
        ['Element', ''],
 ['For Bail', 8],
 ['Arguments', 2],
 ['Miscellaneous appearance', 4],
 ['Defence evidence', 2],
 ['Arguments on charge', 8], // CSS-style declaration
     ]);

     var options = {
       vAxis:{format:' #,###'}
     };
   var formatter = new google.visualization.NumberFormat(
               {prefix: ' '}
           );
           formatter.format(data, 1);

     var chart = new google.visualization.ColumnChart(document.getElementById('chart_div8'));
     chart.draw(data, options);
   }
 </script>
       <script>
 google.load('visualization', '1', {packages: ['corechart']});
google.setOnLoadCallback(drawMaterial);

function drawMaterial() {
       var data = google.visualization.arrayToDataTable([
        ['Element', ''],
 ['For Bail', 8],
 ['Arguments', 2],
 ['Miscellaneous appearance', 4],
 ['Defence evidence', 2],
 ['Arguments on charge', 8], // CSS-style declaration
     ]);

     var options = {
       vAxis:{format:' #,###'}
     };
   var formatter = new google.visualization.NumberFormat(
               {prefix: ' '}
           );
           formatter.format(data, 1);

     var chart = new google.visualization.ColumnChart(document.getElementById('chart_div9'));
     chart.draw(data, options);
   }
 </script>
       <script>
 google.load('visualization', '1', {packages: ['corechart']});
google.setOnLoadCallback(drawMaterial);

function drawMaterial() {
       var data = google.visualization.arrayToDataTable([
        ['Element', ''],
 ['For Bail', 8],
 ['Arguments', 2],
 ['Miscellaneous appearance', 4],
 ['Defence evidence', 2],
 ['Arguments on charge', 8], // CSS-style declaration
     ]);

     var options = {
       vAxis:{format:' #,###'}
     };
   var formatter = new google.visualization.NumberFormat(
               {prefix: ' '}
           );
           formatter.format(data, 1);

     var chart = new google.visualization.ColumnChart(document.getElementById('chart_div10'));
     chart.draw(data, options);
   }
 </script>
       <script>
 google.load('visualization', '1', {packages: ['corechart']});
google.setOnLoadCallback(drawMaterial);

function drawMaterial() {
       var data = google.visualization.arrayToDataTable([
        ['Element', ''],
 ['For Bail', 8],
 ['Arguments', 2],
 ['Miscellaneous appearance', 4],
 ['Defence evidence', 2],
 ['Arguments on charge', 8], // CSS-style declaration
     ]);

     var options = {
       vAxis:{format:' #,###'}
     };
   var formatter = new google.visualization.NumberFormat(
               {prefix: ' '}
           );
           formatter.format(data, 1);

     var chart = new google.visualization.ColumnChart(document.getElementById('chart_div11'));
     chart.draw(data, options);
   }
 </script>
      <script>
 google.load('visualization', '1', {packages: ['corechart']});
google.setOnLoadCallback(drawMaterial);

function drawMaterial() {
       var data = google.visualization.arrayToDataTable([
        ['Element', ''],
 ['For Bail', 8],
 ['Arguments', 2],
 ['Miscellaneous appearance', 4],
 ['Defence evidence', 2],
 ['Arguments on charge', 8], // CSS-style declaration
     ]);

     var options = {
       vAxis:{format:' #,###'}
     };
   var formatter = new google.visualization.NumberFormat(
               {prefix: ' '}
           );
           formatter.format(data, 1);

     var chart = new google.visualization.ColumnChart(document.getElementById('chart_div12'));
     chart.draw(data, options);
   }
 </script>
   <script>
 google.load('visualization', '1', {packages: ['corechart']});
google.setOnLoadCallback(drawMaterial);

function drawMaterial() {
       var data = google.visualization.arrayToDataTable([
        ['Element', ''],
 ['For Bail', 8],
 ['Arguments', 2],
 ['Miscellaneous appearance', 4],
 ['Defence evidence', 2],
 ['Arguments on charge', 8], // CSS-style declaration
     ]);

     var options = {
       vAxis:{format:' #,###'}
     };
   var formatter = new google.visualization.NumberFormat(
               {prefix: ' '}
           );
           formatter.format(data, 1);

     var chart = new google.visualization.ColumnChart(document.getElementById('chart_div13'));
     chart.draw(data, options);
   }
 </script>


 <div class="row">
 <div class="column" style="background-color:#fff;">
   <h2>Central Delhi</h2>
   <p><div id="chart_div"></div></p>
 </div>
 <div class="column" style="background-color:#fff;">
   <h2>Delhi Family Court</h2>
   <p><div id="chart_div1"></div></p>
 </div>
</div>

 <div class="row">
 <div class="column" style="background-color:#fff;">
   <h2>Delhi Mediation Centre</h2>
   <p><div id="chart_div2"></div></p>
 </div>
 <div class="column" style="background-color:#fff;">
   <h2>Rouse Avenue Court Complex</h2>
   <p><div id="chart_div3"></div></p>
 </div>
</div>

 <div class="row">
 <div class="column" style="background-color:#fff;">
   <h2>East Delhi</h2>
   <p><div id="chart_div4"></div></p>
 </div>
 <div class="column" style="background-color:#fff;">
   <h2>New Delhi</h2>
   <p><div id="chart_div5"></div></p>
 </div>
</div>

 <div class="row">
 <div class="column" style="background-color:#fff;">
   <h2>North Delhi</h2>
   <p><div id="chart_div6"></div></p>
 </div>
 <div class="column" style="background-color:#fff;">
   <h2>North East Delhi</h2>
   <p><div id="chart_div7"></div></p>
 </div>
</div>

 <div class="row">
 <div class="column" style="background-color:#fff;">
   <h2>North West Delhi</h2>
   <p><div id="chart_div8"></div></p>
 </div>
 <div class="column" style="background-color:#fff;">
   <h2>Shahdara</h2>
   <p><div id="chart_div9"></div></p>
 </div>
</div>

 <div class="row">
 <div class="column" style="background-color:#fff;">
   <h2>South Delhi</h2>
   <p><div id="chart_div10"></div></p>
 </div>
 <div class="column" style="background-color:#fff;">
   <h2>South East Delhi</h2>
   <p><div id="chart_div11"></div></p>
 </div>
</div>

 <div class="row">
 <div class="column" style="background-color:#fff;">
   <h2>South West Delhi</h2>
   <p><div id="chart_div12"></div></p>
 </div>
 <div class="column" style="background-color:#fff;">
   <h2>West Delhi</h2>
   <p><div id="chart_div13"></div></p>
 </div>
</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
