@extends('layouts.adminLayout.admin_design')
@section('content')
<!-- left column -->
<link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <style type="text/css">
    .customcheck {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.customcheck input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom checkbox */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #20b904;
    border-radius: 5px;
}

/* On mouse-over, add a grey background color */
.customcheck:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.customcheck input:checked ~ .checkmark {
    background-color: #ff2300;
    border-radius: 5px;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.customcheck input:checked ~ .checkmark:after {
    /*display: block;*/
    content: "";
    color: #ff2300;
}

/* Style the checkmark/indicator */
.customcheck .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
  </style>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.js"></script>
<script data-require="datatables@*" data-semver="1.10.12" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.js"></script>
  <div class="content-wrapper">
   
     
         <section class="content-header"><h2>Assign Trainer Time</h2></section>
          <!-- general form elements -->
           <section class="content">
          
            @if($errors->any())
            <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
            </div>
            @endif

              
            
               <form class="form-inline" method="POST" action="{{route('assignPTTime')}}">
                {{csrf_field()}}
                      <div class="form-group">
                  <label for="partyid" class="sr-only">Trainer</label>
                  <select data-width="180px" name="trainerid" class="form-control selectpicker" id="trainerid" title="Select Trainer" data-live-search="true" data-selected-text-format="count"  data-actions-box="true" data-count-selected-text="{0} Trainer Selected" data-header="Select Trainer" required>
                    @foreach ($employees as $employee)
                      <option value="{{$employee->employeeid}}" @if($employee->employeeid == $trainerid) {{'selected'}} @endif >{{$employee->username}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="partyid" class="sr-only">Day</label>
                  <select data-width="180px" name="day[]" class="form-control selectpicker" id="day" title="Select Day" multiple data-live-search="true" data-selected-text-format="count"  data-actions-box="true" data-count-selected-text="{0} Days Selected" data-header="Select Day" required>
                    
                      <option value="Sunday" @if(in_array('Sunday',$day)) {{'selected'}} @endif>Sunday</option>
                      <option value="Monday" @if(in_array('Monday',$day)) {{'selected'}} @endif >Monday</option>
                      <option value="Tuesday" @if(in_array('Tuesday',$day)) {{'selected'}} @endif >Tuesday</option>
                      <option value="Wednesday" @if(in_array('Wednesday',$day)) {{'selected'}} @endif >Wednesday</option>
                      <option value="Thursday" @if(in_array('Thursday',$day)) {{'selected'}} @endif >Thursday</option>
                      <option value="Friday" @if(in_array('Friday',$day)) {{'selected'}} @endif >Friday</option>
                      <option value="Saturday" @if(in_array('Saturday',$day)) {{'selected'}} @endif >Saturday</option>
    
                  </select>
                </div>

                <!-- <div class="form-group">
                  <div class="input-group date" style="max-width:180px" id="date">
                    <input type="date" class="form-control" name="date" placeholder="Date" />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                  </div>
                </div> -->
                <div class="form-group">
                  <button name="submit" type="submit" class="btn btn-info">Search</button> <a href="{{URL::route('addpttime')}}" class="btn btn-default">Clear</a> 
                </div> 
              </form><br>

              <form method="POST" action="{{URL::route('editpttime')}}" >
                {{csrf_field()}}
                  <div class="form-group">
                  <div class="input-group " style="max-width:180px" >
                    <?php $todate=date('Y-m-d') ?>
                    @foreach($ptslots as $ptslot)
                    <?php $todate=$ptslot->fromdate;
                          $todate=date('Y-m-d',strtotime($todate));
                     ?>
                    @endforeach

                    <input type="date" value="{{$todate}}" class="form-control" name="todate" />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                  </div>
                    <button class="btn btn-warning" type="submit" name="update" id="update" >Update</button>
                </div>
       
      <!-- Info boxes -->
  
                <div class="box box-body" style="overflow: auto;">
                <table id="example1" class="table table-bordered table-striped dataTable dt-responsive"  style="width: auto;">
                <thead>
                <tr>
                  <th>Day</th>
                  <th>6:00 am</th>
                  <th>7:00 am</th>
                  <th>8:00 am</th>
                  <th>9:00 am</th>
                  <th>10:00 am</th>
                  <th>11:00 am</th>
                  <th>12:00 pm</th>
                  <th>13:00 pm</th>
                  <th>14:00 pm</th>
                  <th>15:00 pm</th>
                  <th>16:00 pm</th>
                  <th>17:00 pm</th>
                  <th>18:00 pm</th>
                  <th>19:00 pm</th>
                  <th>20:00 pm</th>
                  <th>21:00 pm</th>
                  <th>22:00 pm</th>
                  <th>23:00 pm</th>
                  <!-- <th>Action</th> -->
                  <!-- <th>Delete</th> -->
                </tr>
                </thead>

                <tbody>
                <?php $i=0; ?>
                  @foreach($ptslots as $ptslot)
                  <tr>
                      
                    <td>{{$ptslot->day}} <input type="hidden" name="strainerid" value="{{$ptslot->trainerid}}"><input type="hidden" name="sdays<?php echo $i;?>" value="{{$ptslot->day}}"></td>
                    <td><label class="customcheck"><input value="1" name="600<?php echo $i;?>" type="checkbox" @if($ptslot->{'t600'} =='0') {{'checked'}} @endif ><span class="checkmark"></span></label></td>
                    <td><label class="customcheck"><input value="1" name="700<?php echo $i;?>" type="checkbox" @if($ptslot->{'t700'} =='0') {{'checked'}} @endif ><span class="checkmark"></span></label></td>
                    <td><label class="customcheck"><input value="1" name="800<?php echo $i;?>" type="checkbox" @if($ptslot->{'t800'} =='0') {{'checked'}} @endif ><span class="checkmark"></span></label></td>
                    <td><label class="customcheck"><input value="1" name="900<?php echo $i;?>" type="checkbox" @if($ptslot->{'t900'} =='0') {{'checked'}} @endif ><span class="checkmark"></span></label></td>
                    <td><label class="customcheck"><input value="1" name="1000<?php echo $i;?>" type="checkbox" @if($ptslot->{'t1000'} =='0') {{'checked'}} @endif ><span class="checkmark"></span></label></td>
                    <td><label class="customcheck"><input value="1" name="1100<?php echo $i;?>" type="checkbox" @if($ptslot->{'t1100'} =='0') {{'checked'}} @endif ><span class="checkmark"></span></label></td>
                    <td><label class="customcheck"><input value="1" name="1200<?php echo $i;?>" type="checkbox" @if($ptslot->{'t1200'} =='0') {{'checked'}} @endif ><span class="checkmark"></span></label></td>
                    <td><label class="customcheck"><input value="1" name="1300<?php echo $i;?>" type="checkbox" @if($ptslot->{'t1300'} =='0') {{'checked'}} @endif ><span class="checkmark"></span></label></td>
                    <td><label class="customcheck"><input value="1" name="1400<?php echo $i;?>" type="checkbox"@if($ptslot->{'t1400'} =='0') {{'checked'}} @endif ><span class="checkmark"></span></label></td>
                    <td><label class="customcheck"><input value="1" name="1500<?php echo $i;?>" type="checkbox" @if($ptslot->{'t1500'} =='0') {{'checked'}} @endif ><span class="checkmark"></span></label></td>
                    <td><label class="customcheck"><input value="1" name="1600<?php echo $i;?>" type="checkbox" @if($ptslot->{'t1600'} =='0') {{'checked'}} @endif ><span class="checkmark"></span></label></td>
                    <td><label class="customcheck"><input value="1" name="1700<?php echo $i;?>" type="checkbox" @if($ptslot->{'t1700'} =='0') {{'checked'}} @endif><span class="checkmark"></span></label></td>
                    <td><label class="customcheck"><input value="1" name="1800<?php echo $i;?>" type="checkbox" @if($ptslot->{'t1800'} =='0') {{'checked'}} @endif><span class="checkmark"></span></label></td>
                    <td><label class="customcheck"><input value="1" name="1900<?php echo $i;?>" type="checkbox" @if($ptslot->{'t1900'} =='0') {{'checked'}} @endif><span class="checkmark"></span></label></td>
                    <td><label class="customcheck"><input value="1" name="2000<?php echo $i;?>" type="checkbox" @if($ptslot->{'t2000'} =='0') {{'checked'}} @endif><span class="checkmark"></span></label></td>
                    <td><label class="customcheck"><input value="1" name="2100<?php echo $i;?>" type="checkbox" @if($ptslot->{'t2100'} =='0') {{'checked'}} @endif><span class="checkmark"></span></label></td>
                    <td><label class="customcheck"><input value="1" name="2200<?php echo $i;?>" type="checkbox" @if($ptslot->{'t2200'} =='0') {{'checked'}} @endif><span class="checkmark"></span></label></td>
                    <td><label class="customcheck"><input value="1" name="2300<?php echo $i;?>" type="checkbox" @if($ptslot->{'t2300'} =='0') {{'checked'}} @endif><span class="checkmark"></span></label></td>
                    <!-- <td></td>  -->
                    
                  </tr>
                  
                  <?php $i++; ?>
                  @endforeach
                  <input type="text" name="index" value="{{$i}}" style="display: none;">
                  </form>
                </tbody>
              </table>
            </div>
                
                 <!--  <button type="button" class="btn add-new bg-navy" data-toggle="modal" data-target="#modal-default" style="width: 150px;padding: 10px;">
                 Assign PT Level
                </button> -->

            </div>
          </div>
        </div>
      </div>
            </div>
            <!-- /.box-body -->
      <!-- /.row -->
                 
  </section>
</div>
</div>
</div>
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<!-- <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<!-- <script src="../../dist/js/adminlte.min.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>

<script type="text/javascript">
  $('#example').DataTable({
       stateSave: false,
       paging:  false,

       "lengthMenu": [[7, 10, 15, -1], [7, 10, 15, "All"]]
   });
</script>
@endsection