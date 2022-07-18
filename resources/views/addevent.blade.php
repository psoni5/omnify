
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script>
  $(function () {
    $('#datetimepicker1').datetimepicker({format: 'LT',format: 'hh:mm:ss'});
	$('#datetimepicker2').datetimepicker({format: 'LT',format: 'hh:mm:ss'});
 });
</script>
<div class="container" style="padding-top:100px">
  <div class="panel panel-primary">
    <div class="panel-heading">Schedule an Event</div>
	<form name="form1"  method="POST" action="{{ route('addevent') }}">
      @csrf
      <div class="panel-body">
	   
         <div class="row">
            <div class="col-md-6">
               <div class="form-group">
                  <label class="control-label">Event Name</label>
                  <input type="text" class="form-control" required autofocus name="Ename" id="Ename">
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label class="control-label">Description</label>
                  <input type="text" class="form-control" required autofocus name="description" id="description">
               </div>
            </div>
         </div>
         <div class="row">
            <div class='col-md-6'>
               <div class="form-group">
                  <label class="control-label">Start Time</label>
                  <div class='input-group date' id='datetimepicker1'>
                     <input type='text'  name="start_time" required autofocus class="form-control" />
                     <span class="input-group-addon">
                     <span class="glyphicon glyphicon-calendar"></span>
                     </span>
                  </div>
               </div>
            </div>
            <div class='col-md-6'>
               <div class="form-group">
                  <label class="control-label">End Time</label>
                  <div class='input-group date' id='datetimepicker2'>
                     <input type='text' name="end_time" required autofocus class="form-control" />
                     <span class="input-group-addon">
                     <span class="glyphicon glyphicon-calendar"></span>
                     </span>
                  </div>
               </div>
            </div>
        </div>
		<div class="row">
            <div class="col-md-6">
               <div class="form-group">
                  <label class="control-label">Day of the week</label>
		<span>
     <select name="day">
        <option value="1">Monday</option>
        <option value="2">Tuesday</option>
        <option value="3">Wednesday</option>
        <option value="4">Thursday</option>
        <option value="5">Friday</option>
        <option value="6">Saturday</option>
        <option value="7">Sunday</option>
        
     </select> 
</span>
 </div>
</div>
 <input type="submit" class="btn btn-primary" value="Add Event">
      </div>
   </div>
</div>