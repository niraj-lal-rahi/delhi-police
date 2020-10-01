<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
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
</head>
<body>


<div class="container">
  <h2>Court Orders:Search by Order Date</h2>
  @if(session('errors'))
  <div class="alert alert-danger" role="alert">
    {{session('errors')}}
  </div>
  @endif
<form action="{{route('court.store')}}" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="court_url" value="https://services.ecourts.gov.in/ecourtindia_v4_bilingual/cases/s_orderdate.php?state=D&state_cd=26&dist_cd=7">
    <div class="form-check-inline">

        <label class="form-check-label">
            <input type="radio" name="court_type" checked class="form-check-input" value="1">Court Complex
        </label>
        <label class="form-check-label">
            <input type="radio" name="court_type" class="form-check-input" value="2">Court Establishment
        </label>
   </div>


<div class="form-group">
    <label for="sel1">* Court Complex :</label>
    <select name="court_complex_code" id="court_complex_code" style="width: 250px;height:21px;">
        <option value="0">Select Court Complex</option>
        <option value="1@1,2,3,4@N">Patiala House Court Complex</option>
    </select>
</div>
<div class="form-group" style="display: none;">
    <label for="sel1">*Court Establishment :</label>
    <select name="court_code" id="court_code"  style="width: 250px;height:21px;">
        <option value="0">Select Court Establishment</option>
        <option value="1">District and Sessions Judge,New Delhi, PHC</option>
        <option value="2">Chief Metropolitan Magistrate, New Delhi, PHC</option>
        <option value="3">Senior Civil Judge cum RC, New Delhi, PHC</option>
        <option value="4">Principal Judge Family Court, New Delhi, PHC</option>
    </select>
</div>


   <div class="form-group">
        <label for="birthday">From Date:</label>
        <input type="text" id="fdate" name="from_date" readonly>
   </div>


    <div class="form-group">
        <label for="birthday">To Date:</label>
        <input type="text" id="tdate" name="to_date" readonly>
   </div>




    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
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
</body>
</html>
