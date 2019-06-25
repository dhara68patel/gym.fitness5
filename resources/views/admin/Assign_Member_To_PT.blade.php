<?php 
 include('..///config\database.php');
?>
@extends('layouts.adminLayout.admin_design')
@section('content')
<!-- left column -->
<link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
 <style type="text/css">
   .table-bordered {
    border: 1px solid #f4f4f4;
}
 </style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.js"></script>
<script data-require="datatables@*" data-semver="1.10.12" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.js"></script>

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
    background-color: #ff2300;
    border-radius: 5px;
}

/* On mouse-over, add a grey background color */
.customcheck:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.customcheck input:checked ~ .checkmark {
    background-color: #20b904;
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
   
     
         <section class="content-header"><h2>Assign Member To Trainer</h2></section>
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
              <h3 class="box-title">Assign Trainer</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body"><div class="col-lg-3"></div><div class="col-lg-6">
              <form role="form" action="{{ url('') }}" method="post" >
                 {{ csrf_field() }}
                <!-- text input -->
                <div class="form-group">
                  <label>Trainer</label>
                   <select name="trainerid" class="form-control selectpicker" id="trainerid" title="Select Trainer" data-live-search="true" data-selected-text-format="count"  data-actions-box="true" data-count-selected-text="{0} Trainer Selected" data-header="Select Trainer" required>
                    @foreach ($employees as $employee)
                      <option value="{{$employee->employeeid}}">{{$employee->username}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>Member</label>
                   <select name="memberid" class="form-control selectpicker" id="memberid" title="Select Memeber" data-live-search="true" data-selected-text-format="count"  data-actions-box="true" data-count-selected-text="{0} Memeber Selected" data-header="Select Memeber" required>
                    @foreach ($members as $member)
                      <option value="{{$member->memberid}}">{{$member->firstname .' '. $member->lastname}}</option>
                    @endforeach
                  </select>
                </div>
                  <div class="form-group">
                  <label>Mobile No.</label>
                  <input type="text" class="form-control" placeholder="Mobile No." name="mobileno" id="mobileno" readonly>
                  <!-- </select> -->
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
                </script>
                <div class="form-group">
                  <label>Package</label>
                   <select name="packageid" class="form-control " id="packageid"  required>
                    <option>--Select Member Package--</option>
                  </select>
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
                </script>
                 <div class="form-group">
                  <div class="col-lg-4">
                    <label class=""><input value="3" name="pkgtype" type="radio"> Alternate</label>
                  </div>
                  <div class="col-lg-6">
                    <label class=""><input value="6"name="pkgtype" type="radio"> Daily</label>
                  </div>
                  <!-- <div class="col-lg-6">
                   <label class=""><input value="07:00"name="700" type="radio" > Daily</label>
                  </div> -->
                </div>

                <div class="form-group">
                  <label>Trainer Hours</label>
                  <input type="text" class="form-control" placeholder="Trainer Hours" name="pthour" id="pthour" readonly>
                </div>
                <div class="form-group">
                  <label>Select Current Week</label>
                  <input type="date" class="form-control" name="date" value="<?php echo date('Y-m-d');?>" id="date">
                </div>
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
                </script>

                <div class="form-group">   <div class="col-sm-offset-3">
   <div class="col-sm-8">
      <button name="view" type="button" id="view" data-target="#trainertime" data-toggle="modal" class="btn bg-blue margin">View</button>   <a href="{{ URL::route('assignmembertotrainer') }}"class="btn btn-danger">Cancel</a></div></div>
  
  </div>
                <!-- Select multiple-->
        

              </form></div><div class="col-lg-3"></div></div>
            </div>
            <!-- /.box-body -->
          </div>
                 
  </section>
  <script type="text/javascript">
    Date.prototype.getWeek = function() {
    var onejan = new Date(this.getFullYear(),0,1);
    var today = new Date(this.getFullYear(),this.getMonth(),this.getDate());
    var dayOfYear = ((today - onejan +1)/86400000);
    return Math.ceil(dayOfYear/7)
};
  </script>
  <script type="text/javascript">
     $('#view').click(function(){
        $('#grid').empty();
      $.ajax({
        url:"{{ URL::route('assigntimeslot') }}",
        method:"GET",
        data:{"_token": "{{ csrf_token() }}","trainerid":$('#trainerid').val()},
        // async:false,
        success:function(data) {
                                    // swal(data,"Successfully",'success');
        // alert(data);
        var html='<table id="example1" class="table table-bordered table-striped dataTable dt-responsive"  width="auto" style="overflow: auto;"><thead>';
        html+='<tr><th>Day</th><th>6:00 am</th><th>7:00 am</th><th>8:00 am</th><th>9:00 am</th><th>10:00 am</th><th>11:00 am</th><th>12:00 pm</th><th>13:00 pm</th><th>14:00 pm</th><th>15:00 pm</th><th>16:00 pm</th><th>17:00 pm</th><th>18:00 pm</th><th>19:00 pm</th><th>20:00 pm</th><th>21:00 pm</th><th>22:00 pm</th><th>23:00 pm</th><!-- <th>Action</th> --><!-- <th>Delete</th> --></tr></thead>';
  
        var n=0;
        if(data!='')
        {
        $.each(data, function(i, item){      

        if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
        {
          // alert(item.MemberId);
          var today = new Date(item.date);
          var weekno = today.getWeek();
          today=new Date($('#date').val())
          var wfd=today.getWeek();
             // alert(wfd);
             // alert(weekno);
          if(weekno==wfd)
        {
          html +='<tr>';
          html +='<td>'+item.Day+'<input type="hidden" name="strainerid" value="'+$('#trainerid').val()+'"><input type="hidden" name="sday'+n+'" value="'+item.Day+'"><input type="hidden" name="memberid" value="'+$('#memberid').val()+'"><input type="hidden" name="memberpackagesid" value="'+$('#packageid').val()+'"></td>';

      
          html +='<td><label class="customcheck"><input value="06:00" name="600'+n+'" type="checkbox"';
          // alert($('#date').val());
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="06:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="07:00" name="700'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="07:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+='><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="08:00" name="800'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="08:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="09:00" name="900'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="09:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="10:00" name="1000'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="10:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="11:00" name="1100'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="11:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="12:00" name="1200'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="12:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="13:00" name="1300'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="13:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="1" name="1400'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="14:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="15:00" name="1500'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="15:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="16:00" name="1600'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="16:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="17:00" name="1700'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="17:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="18:00" name="1800'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="18:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="19:00" name="1900'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="19:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="20:00" name="2000'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="20:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="21:00" name="2100'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="21:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="22:00" name="2200'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="22:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="23:00" name="2300'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="23:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='</tr>'; 
           if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {
            $('#assigntrainer').empty();
            $('#l1').empty();
            if(item.memberid!=$('#memberid').val())
            {
              $('#l1').attr('style','color: green');
              $('#l1').append('Assign Schedule');
              $('#assigntrainer').append('Save');
              $('#form').attr('action','{{URL::route("assignpttomember")}}');
            }
            else
            {
              $('#l1').attr('style','color: Orange');
              $('#l1').append('ReAssign Schedule');
              $('#assigntrainer').append('Update');
              $('#form').attr('action','{{URL::route("editassignpttomember")}}');
            }
          }
          else
          {
            $('#l1').empty();
            $('#assigntrainer').empty();
            $('#l1').attr('style','color: green');
            $('#l1').append('Assign Schedule');
            $('#assigntrainer').append('Save');
            $('#form').attr('action','{{URL::route("assignpttomember")}}');
          }
          n= Number(n)+1;
        }
      }
      else
      {
        var data=[{'Day':'Sunday'},{'Day':'Monday'},{'Day':'Tuesday'},{'Day':'Wednesday'},{'Day':'Thursday'},{'Day':'Friday'},{'Day':'Saturday'}];
        var n=0;
       $.each(data, function(i, item){
        html +='<tr>';
          html +='<td>'+item.Day+'<input type="hidden" name="strainerid" value="'+$('#trainerid').val()+'"><input type="hidden" name="sday'+n+'" value="'+item.Day+'"><input type="hidden" name="memberid" value="'+$('#memberid').val()+'"><input type="hidden" name="memberpackagesid" value="'+$('#packageid').val()+'"></td>';

      
          html +='<td><label class="customcheck"><input value="06:00" name="600'+n+'" type="checkbox"';
          // alert($('#date').val());
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="06:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="07:00" name="700'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="07:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+='><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="08:00" name="800'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="08:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="09:00" name="900'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="09:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="10:00" name="1000'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="10:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="11:00" name="1100'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="11:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="12:00" name="1200'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="12:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="13:00" name="1300'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="13:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="1" name="1400'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="14:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="15:00" name="1500'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="15:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="16:00" name="1600'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="16:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="17:00" name="1700'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="17:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="18:00" name="1800'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="18:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="19:00" name="1900'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="19:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="20:00" name="2000'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="20:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="21:00" name="2100'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="21:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="22:00" name="2200'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="22:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="23:00" name="2300'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="23:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='</tr>'; 
            $('#assigntrainer').empty();
            $('#l1').empty();
            // if(item.MemberId!=$('#memberid').val())
            {
              $('#l1').attr('style','color: green');
              $('#l1').append('Assign Schedule');
              $('#assigntrainer').append('Save');
              $('#form').attr('action','{{URL::route("assignpttomember")}}');
            }
            n= Number(n)+1;
            });
            return false;
        }
          
        });
      }
      else
      {
        var data=[{'Day':'Sunday'},{'Day':'Monday'},{'Day':'Tuesday'},{'Day':'Wednesday'},{'Day':'Thursday'},{'Day':'Friday'},{'Day':'Saturday'}];
        var n=0;
       $.each(data, function(i, item){
        html +='<tr>';
          html +='<td>'+item.Day+'<input type="hidden" name="strainerid" value="'+$('#trainerid').val()+'"><input type="hidden" name="sday'+n+'" value="'+item.Day+'"><input type="hidden" name="memberid" value="'+$('#memberid').val()+'"><input type="hidden" name="memberpackagesid" value="'+$('#packageid').val()+'"></td>';

      
          html +='<td><label class="customcheck"><input value="06:00" name="600'+n+'" type="checkbox"';
          // alert($('#date').val());
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="06:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="07:00" name="700'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="07:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+='><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="08:00" name="800'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="08:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="09:00" name="900'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="09:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="10:00" name="1000'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="10:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="11:00" name="1100'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="11:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="12:00" name="1200'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="12:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="13:00" name="1300'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="13:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="1" name="1400'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="14:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="15:00" name="1500'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="15:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="16:00" name="1600'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="16:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="17:00" name="1700'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="17:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="18:00" name="1800'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="18:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="19:00" name="1900'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="19:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="20:00" name="2000'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="20:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="21:00" name="2100'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="21:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="22:00" name="2200'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="22:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='<td><label class="customcheck"><input value="23:00" name="2300'+n+'" type="checkbox"';
          if(item.fromdate<=$('#date').val() && item.todate >= $('#date').val())
          {

            if(item.hoursfrom=="23:00")
            {
              html+='checked ';
              if(item.memberid!=$('#memberid').val())
              {
                html+='disabled';
              }
            }
          }
          html+=' ><span class="checkmark"></span></label></td>';
          html +='</tr>'; 
            $('#assigntrainer').empty();
            $('#l1').empty();
            // if(item.MemberId!=$('#memberid').val())
            {
              $('#l1').attr('style','color: green');
              $('#l1').append('Assign Schedule');
              $('#assigntrainer').append('Save');
              $('#form').attr('action','{{URL::route("assignpttomember")}}');
            }
            n= Number(n)+1;
            });
            // return false;
      }
        html +='</table>';

          $('#grid').append(html);
        },
        dataType:'json',

      });

    $('#example1').DataTable({
       stateSave: false,
       paging:  true,

       "lengthMenu": [[7, 10, 15, -1], [7, 10, 15, "All"]]
   });

     });
  </script>
<div class="modal fade" id="trainertime" tabindex="-1" role="dialog" aria-labelledby="titleymodalLabel" aria-hidden="true">'

    <form data-toggle="validator" id="form" action="{{URL::route('assignpttomember')}}" role="form" method="POST" class="form-horizontal">
{{csrf_field()}}
    <div class="modal-dialog modal-lg" style="width: auto;">

        <div class="modal-content">
            
            <div class="modal-header">
                
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                
                <h4 class="modal-title" id="Label">Trainer Time-Slot</h4>
            
            </div>
            
            <div class="modal-body" style="display:none; text-align:center" id="bagtypemodalprogress">
                
                <img src="./img/progress.gif" alt="Loading..." />
            
            </div>
            
            <div class="modal-body" id="trainermodalcontent"> 

                <div id="trainermodalalert" class="alert alert-danger alert-dismissable" style="display:none">
                    
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    
                    Can Not Assign Trainer.
                
                </div>
                
                  <div class="form-group">
                  <center><h4><label id="l1"> </label></h4><div class="input-group " style="max-width:180px" >
                   <!--  <?php 
                      $query=DB::table('')
                    ?> -->
                    <input type="date" value="{{date('Y-m-d')}}" class="form-control" name="fromdate" />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                  </div></center>
                </div>
                <div class="form-group" id="grid" style="overflow: scroll;">
                
                </div>
            
            </div>
            
            
            <div class="modal-footer">
                
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                
                <button name="assigntrainer" id="assigntrainer" type="button" class="btn btn-primary">Save</button>
            
            </div>
            <script type="text/javascript">
              $('#assigntrainer').on('click',function(){
                // alert($("input[name='pkgtype']:checked").val());
                var countchecked = $(":checkbox:checked").length;
                if(countchecked==$("input[name='pkgtype']:checked").val())
                {
                  $('#assigntrainer').attr('type','submit');
                }
                else
                {
                  swal("Compulsory Check "+ $("input[name='pkgtype']:checked").val()+ " Value","Error!","error");
                  $('#assigntrainer').attr('type','button');
                }
              });
            </script>
        
        </div>
    
    </div>
    
    </form>

</div>
</div>
</div>
</div>
<!-- <script type="text/javascript">
  $(document).ready( function (){
  $('#example1').DataTable();
});
</script> -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection