@extends('layouts.adminLayout.admin_design')
@section('content')

<link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/Jquery.dataTables.min.css">
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.responsive.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

   <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- left column -->
  <div class="content-wrapper">
   
     
         <section class="content-header"><h2>Assign PT Level</h2></section>
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

         <div class="row">
        <div class="col-xs-12 ">
          <div>           
            <div class="box-body">
              <button type="button" onclick="setaddmodal()" class="btn add-new bg-navy" data-toggle="modal" data-target="#modal-default" style="width: 150px;padding: 10px;">
               Assign PT Level
              </button>
            </div>
          </div>
        </div>
      </div>

        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-title">Assign PT Level</h4>
              </div>

              <div class="modal-body">
    
                <div class="box-body"> <div class="col-lg-3"></div><div class="col-lg-6">
                 <form method="POST" role="form" id="form" action="{{ URL::route('addassignptlevel')}}"  >
                   {{ csrf_field() }}

                  <div class="form-group">
                    <input type="hidden" name="id" id="id">
                    <label>Trainer Name</label>
                      <select class="form-control" name="employee" id="employee" onchange="emp()">
                         <option>-- Select employee --</option>
                          @foreach($employee as $emp)
                             <option value="{{$emp->employeeid}}" >{{$emp->username}}</option>
                            @endforeach
                      </select>
                   <!-- <input type="number" class="form-control" name="level" required placeholder="Enter Level"> -->
                  </div>

                  <div class="form-group">
                    <label>Trainer Mobile No</label>
                    
                      <select class="form-control" name="mobile_no" id="mobile_no">
                        @foreach($employee as $emp)
                         <option  value="{{$emp->mobileno}}">{{$emp->mobileno}}</option>  
                         @endforeach
                      </select>
                      <div id="fade"></div>
                      
                   <!-- <input type="number" class="form-control" name="level" required placeholder="Enter Level"> -->
                  </div>

                    <!--  <div class="form-group">
                   <label> Trainer Mobile No</label>
                   <input type="number" class="form-control" name="level" required placeholder="Trainer Mobile No">
                    </div> -->
               
                    <div class="form-group">
                      <label>Level</label>
                      <select class="form-control" id="level" name="level">
                            <option>-- Select Level --</option>
                          @foreach($ptlevel as $ptno)
                          <option value="{{$ptno->level}}">{{$ptno->level}}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                    <label>percentage</label>
                     <input type="number" class="form-control" value="" id="percentage" name="percentage" required placeholder="Enter percentage" readonly="">
                    </div>
                    <script type="text/javascript">
                      $('#level').change(function(){
                        // alert('fgfg');
                        $.ajax({
                             url:"{{ URL::route('setpercentage') }}",
                             method:"GET",
                             data:{_token: "{{ csrf_token() }}",level:$('#level').val()},
                             asnyc:false,
                            success:function(data) {
                              // console.log(data);
                                
                                // $('#mobile_no').fadeIn().html(data);
                               
                               // $('#mobile_no').html('<option value="'+data+'">'+data+'</option>');
                                $.each(data, function(i,item){
                                  // alert(i.percentage);
                               $('#percentage').val(item.percentage);
                             });

                            },
                            dataType:'json'
                        });
                      });
                    </script>

                      <div class="form-group col-lg-6">
                        <button type="submit" id="submit" class="btn btn-info btn-block">Save</button> 
                         </div>

                      <div class="form-group col-lg-6">
                           <a href="" class="btn btn-danger btn-block" data-dismiss="modal">Cancel</a>
                         </div>

                   </form>
            </div>
                  <div class="col-lg-3"></div>
                  </div>
              </div>

            </div>
      
          </div>
  
        </div>

        <div class="">

 

  <!-- Content Wrapper. Contains page content -->
  <div class="">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Trainer Name</th>
                  <th>PT LEVEL</th>
                  <th>PERCENTAGE</th>
                  <th>Edit</th>
                  <!-- <th>Delete</th> -->
                </tr>
                </thead>
                <tbody>
                    @foreach($ptassignlevel as $ptassign)  
                <tr>
                   
                  <td>{{$ptassign->ptassignlevelid}}</td>
                  <td>{{$ptassign->username}}</td>
                  <td>{{$ptassign->levelid}}</td>
                  <td>{{$ptassign->percentage}}</td>
                  <td><a href="#" class="btn add-new"  data-toggle="modal" data-target="#modal-default" id="editassign_pt_level_values" onclick="editassign_pt_level_values('<?php echo $ptassign->ptassignlevelid; ?>','<?php echo $ptassign->levelid; ?>','<?php echo $ptassign->percentage; ?>','<?php echo $ptassign->trainerid; ?>','<?php echo $ptassign->mobileno; ?>')" ><i class="fa fa-edit"></i></a></td>
                  
                 
                </tr>
                @endforeach
                  <script type="text/javascript">
                   function editassign_pt_level_values(id,levelid,percentage,employee_role,mobile_no){

                   $('#id').val(id); 
                   $('#level').val(levelid);
                   $('#percentage').val(percentage);
                   $('#mobile_no').val(mobile_no);
                   $('#employee').val(employee_role);
                   $('#form').attr('action','{{URL::route("editassignptlevel")}}');
                   $('#modal-title').empty();
                   $('#modal-title').append('Edit Assign PT Level');
                    // console.log(x,y,z);
                   }
  
             </script>
           <script type="text/javascript">
                   function setaddmodal(){

                   $('#id').val(''); 
                   $('#level').val('');
                   $('#percentage').val('');
                   $('#mobile_no').val('');
                   $('#employee').val('');
                   $('#form').attr('action','{{ URL::route("addassignptlevel")}}');
                   $('#modal-title').empty();
                   $('#modal-title').append('Assign PT Level');
                    // console.log(x,y,z);
                   }
  
             </script>
              


                </tbody>
                <!-- <tfoot>
                <tr>
                  <th>ID</th>
                  <th>PT LEVEL</th>
                  <th>PERCENTAGE</th>
                  <th>Edit</th>
                  <!- <th>CSS grade</th> --
                </tr>
                </tfoot> -->
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
   
  </div>

 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<script type="text/javascript">
   
   function emp()
   {
   
         var employee = $('#employee').val();
      
   

                $.ajax({
                     url:"{{ URL::route('assignptlevelmobileno') }}",
                     method:"GET",
                     data:{"_token": "{{ csrf_token() }}","employee":employee},
                    success:function(data) {
                      //console.log(data);
                        
                        // $('#mobile_no').fadeIn().html(data);
                       
                       // $('#mobile_no').html('<option value="'+data+'">'+data+'</option>');
                       $('#mobile_no').html('<option value="'+data+'">'+data+'</option>');

                    }

                });
            
                // $('select[name="mobile_no"]').fadeIn();
   }
       
</script>

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<!-- <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.responsive.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<!-- <script src="../../dist/js/adminlte.min.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script type="text/javascript">
  $('#example1').DataTable({
       stateSave: false,
       paging:  true,
       "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]]
   });
</script>

             

      
  </section>
</div>
</div>
</div>
@endsection