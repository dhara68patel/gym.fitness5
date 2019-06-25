<?php 
 include('..///config/database.php');
?>

@extends('layouts.adminLayout.admin_design')
@section('content')
<!-- left column -->
<!-- <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"> -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
 <style type="text/css">
   .table-bordered {
    border: 1px solid #f4f4f4;
}
 </style>
 <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.js"></script>
<script data-require="datatables@*" data-semver="1.10.12" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.js"></script> -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> -->
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
    background-color: #babbba;
    border-radius: 5px;
}

/* On mouse-over, add a grey background color */
.customcheck:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.customcheck input:checked ~ .checkmark {
    background-color: #00c0ef;
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
    color: #20b904;
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
  <div class="content-wrapper">
   
     
         <section class="content-header"><h2>Manage Assigned Member</h2></section>
          <!-- general form elements -->
           <section class="content">
          
              @if ($errors->any())
            <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
            </div>
            @endif
            <div class="box box-primary">

            <div class="box-header with-border">
              <h3 class="box-title">Manage Member</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="{{ URL::route('manageassignedmember') }}" method="post"  >
                 {{ csrf_field() }}
                <!-- text input -->
                <!-- <div class="form-group">
                  <label>Trainer</label>
                   <select name="trainerid" class="form-control selectpicker" id="trainerid" title="Select Trainer" data-live-search="true" data-selected-text-format="count"  data-actions-box="true" data-count-selected-text="{0} Trainer Selected" data-header="Select Trainer" required>
                    @foreach ($employees as $employee)
                      <option value="{{$employee->employeeid}}">{{$employee->username}}</option>
                    @endforeach
                  </select>
                </div> -->
                <div class="col-md-3">
                <div class="form-group">
                  <label>Member</label>
                   <select name="memberid" class="form-control selectpicker" id="memberid" title="Select Memeber" data-live-search="true" data-selected-text-format="count"  data-actions-box="true" data-count-selected-text="{0} Memeber Selected" data-header="Select Memeber" required>
                    @foreach ($members as $member)
                      <option value="{{$member->memberid}}" @if(isset($memberid) && $memberid==$member->memberid){{'selected'}}@endif>{{$member->firstname .' '. $member->lastname}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                  <div class="form-group">
                  <label>Mobile No.</label>
                  <input type="text" class="form-control" placeholder="Mobile No." name="mobileno" id="mobileno" readonly>
                  <!-- </select> -->
                </div>
              </div>
                <script type="text/javascript">
                  $('#memberid').change(function(){
                       var member = $('#memberid').val();
                    // alert(member);
                 

                              $.ajax({
                                   url:"{{ URL::route('assignptmembermobileno') }}",
                                   method:"GET",
                                   data:{"_token": "{{ csrf_token() }}","memberid":member},
                                  success:function(data) {
                                    // alert(data);
                                      
                                      // $('#mobile_no').fadeIn().html(data);
                                     
                                     // $('#mobile_no').html('<option value="'+data+'">'+data+'</option>');
                                     // alert($('#mobileno').val());
                                     $('#mobileno').val(data);
                                  },

                              });
                          
                              // $('select[name="mobile_no"]').fadeIn();
                 });
                  $(document).ready(function(){
                    var member = $('#memberid').val();
                    // alert(member);
                              $.ajax({
                                   url:"{{ URL::route('assignptmembermobileno') }}",
                                   method:"GET",
                                   data:{"_token": "{{ csrf_token() }}","memberid":member},
                                  success:function(data) {
                                    // alert(data);
                                      
                                      // $('#mobile_no').fadeIn().html(data);
                                     
                                     // $('#mobile_no').html('<option value="'+data+'">'+data+'</option>');
                                     // alert($('#mobileno').val());
                                     $('#mobileno').val(data);
                                  },

                              });
                  });
                </script>
                <div class="col-md-3">
                <div class="form-group">
                  <label>Package</label>
                   <select name="packageid" class="form-control" id="packageid" title="Select Package" data-live-search="true" data-selected-text-format="count"  data-actions-box="true" data-count-selected-text="{0} Package Selected" data-header="Select Package" required>
                    <option>--Select Member Package--</option>
                  </select>
                </div>
              </div>
                <script type="text/javascript">
                  $('#memberid').change(function(){
                      $('#pthour').val('');
                       $('#packageid').find('option:not(:first)').remove();
                       var member = $('#memberid').val();
                    // alert(member);
                 

                              $.ajax({
                                   url:"{{ URL::route('assignptmemberpackage') }}",
                                   method:"GET",
                                   data:{"_token": "{{ csrf_token() }}","memberid":member,'type':'package','schemeid':''},
                                   async:false,
                                  success:function(data) {
                                    // alert(data);
                                      $.each(data, function(i, item){
                                      
                                        $("#packageid").append($("<option></option>").attr("value", item.memberpackagesid).text(item.schemename));

                                      });
                                  },
                                  dataType:'json',

                              });
                          
                              // $('select[name="mobile_no"]').fadeIn();
                 });
                  $(document).ready(function(){
                    $('#pthour').val('');
                       $('#packageid').find('option:not(:first)').remove();
                       var member = $('#memberid').val();
                    // alert(member);
                 

                              $.ajax({
                                   url:"{{ URL::route('assignptmemberpackage') }}",
                                   method:"GET",
                                   data:{"_token": "{{ csrf_token() }}","memberid":member,'type':'package','schemeid':''},
                                   async:false,
                                  success:function(data) {
                                    // alert(data);
                                      $.each(data, function(i, item){

                                        html="<option"; 
                                          if(item.memberpackagesid=="<?php if(isset($packageid)){echo $packageid;} ?>")
                                          {
                                            html+=" selected";
                                          }
                                        html+="></option>";
                                      
                                        $("#packageid").append($(html).attr("value", item.memberpackagesid).text(item.schemename));

                                      });
                                  },
                                  dataType:'json',

                              });
                  });
                </script>
                 <div class="col-md-3">
                <div class="form-group">
                  <label>Training Hours</label>
                  <input type="text" class="form-control" placeholder="Trainer Hours" name="pthour" id="pthour" readonly>
                </div>
              </div>
                <!-- <div class="form-group">
                  <label>From Date</label>
                  <input type="date" class="form-control" name="date" value="<?php echo date('Y-m-d');?>" id="date">
                </div> -->
                 <script type="text/javascript">
                  $('#packageid').change(function(){

                       var member = $('#memberid').val();
                    // alert(member);
                 

                              $.ajax({
                                   url:"{{ URL::route('assignptmemberpackage') }}",
                                   method:"GET",
                                   data:{"_token": "{{ csrf_token() }}","memberid":'','type':'pthour','schemeid':$('#packageid').val()},
                                  success:function(data) {
                                    // swal(data,"Successfully",'success');
                                    $('#pthour').val(data);

                                  },

                              });
                          
                              // $('select[name="mobile_no"]').fadeIn();
                 });
                $(document).ready(function(){
                  var member = $('#memberid').val();
                    // alert(member);
                 

                              $.ajax({
                                   url:"{{ URL::route('assignptmemberpackage') }}",
                                   method:"GET",
                                   data:{"_token": "{{ csrf_token() }}","memberid":'','type':'pthour','schemeid':$('#packageid').val()},
                                  success:function(data) {
                                    // swal(data,"Successfully",'success');
                                    $('#pthour').val(data);

                                  },

                              });
                });
                </script>

               <center> <div class="form-group">   
      <button name="view" type="submit" id="view" class="btn bg-blue margin">View</button>   <a href="{{ URL::route('manageassignedmember') }}"class="btn btn-danger">Cancel</a>
  
  </div></center>
                <!-- Select multiple-->
        

              </form></div>

             <table id="example1" class="table table-bordered table-striped dataTable dt-responsive"  width="100%">
               <thead>
                 <th>Date</th>
                 <th>Day</th>
                 <th>Time</th>
                 <th>Trainee</th>
                 <th>Action</th>
               </thead>
               <tbody>
                @foreach($grid as $i => $data)
                @if($data->hoursfrom!='')
                    <tr>
                      <td>{{$data->date}}</td>
                      <td>{{$data->day}}</td>
                      <td id="2td{{$i}}">
                        <select name="time{{$i}}" class="form-control" id="time{{$i}}" disabled="">
                          
                          <option value="06:00" @if($data->hoursfrom=='06:00'){{'selected'}}@endif>06:00</option>
                          <option value="07:00" @if($data->hoursfrom=='07:00'){{'selected'}}@endif>07:00</option>
                          <option value="08:00" @if($data->hoursfrom=='08:00'){{'selected'}}@endif>08:00</option>
                          <option value="09:00" @if($data->hoursfrom=='09:00'){{'selected'}}@endif>09:00</option>
                          <option value="10:00" @if($data->hoursfrom=='10:00'){{'selected'}}@endif>10:00</option>
                          <option value="11:00" @if($data->hoursfrom=='11:00'){{'selected'}}@endif>11:00</option>
                          <option value="12:00" @if($data->hoursfrom=='12:00'){{'selected'}}@endif>12:00</option>
                          <option value="13:00" @if($data->hoursfrom=='13:00'){{'selected'}}@endif>13:00</option>
                          <option value="14:00" @if($data->hoursfrom=='14:00'){{'selected'}}@endif>14:00</option>
                          <option value="15:00" @if($data->hoursfrom=='15:00'){{'selected'}}@endif>15:00</option>
                          <option value="16:00" @if($data->hoursfrom=='16:00'){{'selected'}}@endif>16:00</option>
                          <option value="17:00" @if($data->hoursfrom=='17:00'){{'selected'}}@endif>17:00</option>
                          <option value="18:00" @if($data->hoursfrom=='18:00'){{'selected'}}@endif>18:00</option>
                          <option value="19:00" @if($data->hoursfrom=='19:00'){{'selected'}}@endif>19:00</option>
                          <option value="20:00" @if($data->hoursfrom=='20:00'){{'selected'}}@endif>20:00</option>
                          <option value="21:00" @if($data->hoursfrom=='21:00'){{'selected'}}@endif>21:00</option>
                          <option value="22:00" @if($data->hoursfrom=='22:00'){{'selected'}}@endif>22:00</option>
                          <option value="23:00" @if($data->hoursfrom=='23:00'){{'selected'}}@endif>23:00</option>
                        </select></td>
                      <td id="3td{{$i}}"> 
                        <select name="tid{{$i}}" class="form-control" id="tid{{$i}}"disabled>
                          @foreach ($employees as $employee)
                            <option value="{{$employee->employeeid}}" @if ($employee->employeeid==$data->employeeid){{'selected'}}@endif>{{$employee->username}}</option>
                          @endforeach
                        </select>
                      </td>
                      <td>
                        <input type="hidden" name="mid{{$i}}" id="mid{{$i}}" value="{{$data->ptmemberid}}">
                        <form role="form" id="myform" action="{{ URL::route('claimptsession') }}" method="post"  >
                         {{ csrf_field() }}
                         <input type="hidden" name="ptmemberid" value="{{$data->ptmemberid}}">
                         <a data-toggle="tooltip" onclick="listenForDoubleClickedit({{$i}}) " id="edit{{$i}}" data-placement="top" title="Edit" class="btn-bx edit"><i class=" glyphicon glyphicon-edit"></i></a>
                         <a data-toggle="tooltip" onclick="listenForDoubleClickok({{$i}}) " id="ok{{$i}}" data-placement="top" title="Submit" class="btn-bx" style="display: none;"><i class=" glyphicon glyphicon-ok"></i></a>
                          <a data-toggle="tooltip" style="color:green" data-placement="top" title="Claim" onclick="document.getElementById('myform').submit()" class=""><i class=" glyphicon glyphicon-list"></i></a>
                        </form>
                      </td>

                    </tr>
                    @endif
                @endforeach
                 
               </tbody>
             </table>

            </div>
            <!-- /.box-body -->
          </div>
                 
  </section>
  <script type="text/javascript">
    function listenForDoubleClickedit(i) {
      // alert(element);
      $('#time'+i).removeAttr('disabled');
      $('#tid'+i).removeAttr('disabled');
      $('#ok'+i).show();
      $('#edit'+i).hide();
      // $('#2td16').contentEditable = true;
    }
     function listenForDoubleClickok(i) {
      // alert(element);
      $('#time'+i).attr('disabled',true);
      $('#tid'+i).attr('disabled',true);
      $('#ok'+i).hide();
      $('#edit'+i).show();
      // alert($('#mid'+i).val());
      $.ajax({
                url:"{{ URL::route('edittimeofmember') }}",
                method:"GET",
                data:{"_token": "{{ csrf_token() }}","ptmemberid":$('#mid'+i).val(),"trainerid":$('#tid'+i).val(),"time":$('#time'+i).val()},
                success:function(data) {
                  // alert(data);
                 // swal(data,"Successfully",'success');

                },

              });
      // $('#2td16').contentEditable = true;
    }
  </script>
<script type="text/javascript">
  $(document).ready( function (){
  $('#example1').DataTable({
    "lengthMenu": [[7, 10, 15, -1], [7, 10, 15, "All"]]
  });
});
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection