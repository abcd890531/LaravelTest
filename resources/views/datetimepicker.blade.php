<html lang="en">

<head>

    <title>Bootstrap Timepicker Example</title>  

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>  

</head>

<body>


<!-- Fecha Fin Field -->
<div class="form-group col-sm-6">

<div class="input-group">
  <input class="form-control date" type="text" id="time1" value=""/>  
    <div class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
     </div>
 </div> 

 </div> 
 
 
 <div class="form-group col-sm-6">
<p>loo</p>

<div class="input-group">
  <input class="form-control date1" type="text" id="time1" value=""/>  
    <div class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
     </div>
 </div> 

 </div> 

<!--<script type="text/javascript">

 
  $(".date").val("");
  $('.date').datetimepicker({
         format:'YYYY-MM-DD HH:mm:ss'  

    });
	
	
  $(".date1").val("");
  $('.date1').datetimepicker({
         
		 minDate: new Date(2010, 5, 1),
		 format:'YYYY-MM-DD HH:mm:ss'         
       

    });

</script>-->

<script type="text/javascript">
  
  $(function () {
    
	
	
	$('.date').datetimepicker({
         format:'YYYY-MM-DD HH:mm:ss'  
    });
	
	$('.date1').datetimepicker({
        format:'YYYY-MM-DD HH:mm:ss'         
    });
    
    $('.date1').datetimepicker({
        useCurrent: false //Important! See issue #1075
    });
    $(".date").on("dp.change", function (e) {
       $('.date1').data("DateTimePicker").minDate(e.date);
       });
        $(".date1").on("dp.change", function (e) {
            $('.date').data("DateTimePicker").maxDate(e.date);
        });
    });
</script>


</body>

</html>