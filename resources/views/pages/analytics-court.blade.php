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


                                <h1>Stage of Pending Cases</h1>



                                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

                                <script type="text/javascript">
                                // Load google charts
                                google.charts.load('current', {'packages':['corechart']});
                                google.charts.setOnLoadCallback(drawChart);

                                // Draw the chart and set the chart values
                                function drawChart() {
                                  var data = google.visualization.arrayToDataTable([
                                  ['Task', 'Hours per Day'],
                                  ['For Bail', 8],
                                  ['Arguments', 2],
                                  ['Miscellaneous appearance', 4],
                                  ['Defence evidence', 2],
                                  ['Arguments on charge', 8]
                                ]);

                                  // Optional; add a title and set the width and height of the chart
                                  var options = {'width':550, 'height':400};

                                  // Display the chart inside the <div> element with id="piechart"
                                  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                                  chart.draw(data, options);
                                }
                                </script>

                                <script type="text/javascript">
                                // Load google charts
                                google.charts.load('current', {'packages':['corechart']});
                                google.charts.setOnLoadCallback(drawChart);

                                // Draw the chart and set the chart values
                                function drawChart() {
                                  var data = google.visualization.arrayToDataTable([
                                  ['Task', 'Hours per Day'],
                                  ['For Bail', 8],
                                  ['Arguments', 2],
                                  ['Miscellaneous appearance', 4],
                                  ['Defence evidence', 2],
                                  ['Arguments on charge', 8]
                                ]);

                                  // Optional; add a title and set the width and height of the chart
                                  var options = {'width':550, 'height':400};

                                  // Display the chart inside the <div> element with id="piechart"
                                  var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
                                  chart.draw(data, options);
                                }
                                </script>
                                <script type="text/javascript">
                                // Load google charts
                                google.charts.load('current', {'packages':['corechart']});
                                google.charts.setOnLoadCallback(drawChart);

                                // Draw the chart and set the chart values
                                function drawChart() {
                                  var data = google.visualization.arrayToDataTable([
                                  ['Task', 'Hours per Day'],
                                  ['For Bail', 8],
                                  ['Arguments', 2],
                                  ['Miscellaneous appearance', 4],
                                  ['Defence evidence', 2],
                                  ['Arguments on charge', 8]
                                ]);

                                  // Optional; add a title and set the width and height of the chart
                                  var options = {'width':550, 'height':400};

                                  // Display the chart inside the <div> element with id="piechart"
                                  var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
                                  chart.draw(data, options);
                                }
                                </script>
                                <script type="text/javascript">
                                // Load google charts
                                google.charts.load('current', {'packages':['corechart']});
                                google.charts.setOnLoadCallback(drawChart);

                                // Draw the chart and set the chart values
                                function drawChart() {
                                  var data = google.visualization.arrayToDataTable([
                                  ['Task', 'Hours per Day'],
                                  ['For Bail', 8],
                                  ['Arguments', 2],
                                  ['Miscellaneous appearance', 4],
                                  ['Defence evidence', 2],
                                  ['Arguments on charge', 8]
                                ]);

                                  // Optional; add a title and set the width and height of the chart
                                  var options = {'width':550, 'height':400};

                                  // Display the chart inside the <div> element with id="piechart"
                                  var chart = new google.visualization.PieChart(document.getElementById('piechart3'));
                                  chart.draw(data, options);
                                }
                                </script>
                                <script type="text/javascript">
                                // Load google charts
                                google.charts.load('current', {'packages':['corechart']});
                                google.charts.setOnLoadCallback(drawChart);

                                // Draw the chart and set the chart values
                                function drawChart() {
                                  var data = google.visualization.arrayToDataTable([
                                  ['Task', 'Hours per Day'],
                                  ['For Bail', 8],
                                  ['Arguments', 2],
                                  ['Miscellaneous appearance', 4],
                                  ['Defence evidence', 2],
                                  ['Arguments on charge', 8]
                                ]);

                                  // Optional; add a title and set the width and height of the chart
                                  var options = {'width':550, 'height':400};

                                  // Display the chart inside the <div> element with id="piechart"
                                  var chart = new google.visualization.PieChart(document.getElementById('piechart4'));
                                  chart.draw(data, options);
                                }
                                </script>
                                <script type="text/javascript">
                                // Load google charts
                                google.charts.load('current', {'packages':['corechart']});
                                google.charts.setOnLoadCallback(drawChart);

                                // Draw the chart and set the chart values
                                function drawChart() {
                                  var data = google.visualization.arrayToDataTable([
                                  ['Task', 'Hours per Day'],
                                  ['For Bail', 8],
                                  ['Arguments', 2],
                                  ['Miscellaneous appearance', 4],
                                  ['Defence evidence', 2],
                                  ['Arguments on charge', 8]
                                ]);

                                  // Optional; add a title and set the width and height of the chart
                                  var options = {'width':550, 'height':400};

                                  // Display the chart inside the <div> element with id="piechart"
                                  var chart = new google.visualization.PieChart(document.getElementById('piechart5'));
                                  chart.draw(data, options);
                                }
                                </script>
                                <div class="row">
                                  <div class="column" style="background-color:#fff;">
                                    <h2>Tis Hazari Courts Complex</h2>
                                    <p><div id="piechart"></div></p>
                                  </div>
                                  <div class="column" style="background-color:#fff;">
                                    <h2>Karkardooma Court Complex</h2>
                                    <p><div id="piechart1"></div></p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="column" style="background-color:#fff;">
                                    <h2>Patiala House Court Complex
                                </h2>
                                    <p><div id="piechart2"></div></p>
                                  </div>
                                  <div class="column" style="background-color:#fff;">
                                    <h2>Rohini Court Complex</h2>
                                    <p><div id="piechart3"></div></p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="column" style="background-color:#fff;">
                                    <h2>Dwarka Courts Complex</h2>
                                    <p><div id="piechart4"></div></p>
                                  </div>
                                  <div class="column" style="background-color:#fff;">
                                    <h2>Saket Court Complex</h2>
                                    <p><div id="piechart5"></div></p>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
