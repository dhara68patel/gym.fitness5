@extends('layouts.adminLayout.admin_design')
@section('content')

 <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
<script src="../../bower_components/datatables.net/js/jquery.js"></script>
<script data-require="datatables@*" data-semver="1.10.12" src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net/js/dataTables.bootstrap.min.js"></script>
<script src="../../bower_components/datatables.net/js/dataTables.responsive.js"></script>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <br>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Dashboard</li>
      </ol>
    </section>

<script type="text/javascript">
$(document).ready( function () {
    $('#contractdata').DataTable();
} );
</script>
    <!-- Main content -->
    <section class="content">
      <section class="content-header"><h2
        >Id Pending</h2></section>
        <br>
      <!-- Info boxes -->
   <div class="box">

    <div class="box-body">
       <table id="contractdata" cellspacing="0" width="100%" class="table table-striped table-bordered dt-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Gender</th>
                                                    <th>Mobile No.</th>
                                                     <th>City</th>
                                                    <th>ID Proof</th>
                                                    <th>Profile Photo</th>
                                                    <th>Joining Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                              @foreach($members  as $member)
                                              
                                                <tr><td>{{$member->firstname}}{{ $member->lastname }}</td>
                                                  <td>{{$member->gender}}</td>
                                                  <td>{{$member->mobileno}}</td>
                                                   <td>{{$member->city}}</td>
                                                  <td>Pending</td>
                                                  <td>@if($member->photo) <a href="/files/{{$member->photo}}" target="_blank">{{$member->photo}}</a>
                                                  @else {{'Pending'}}</td>@endif
                                                  @if($member->joindate)
                                                   <td>{{date("d-m-Y",strtotime($member->joindate))}}</td>
                                                   @else
                                                    <td></td>
                                                  @endif
                                                 
                                                  </tr>
                                                  @endforeach
                                            </tbody>
                                        </table>
                                        </div>
                                      </div>

            <!-- /.box-body -->
          </div>
      </div>
    </section>
      </div>
      
       <!--  <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">CPU Traffic</span>
              <span class="info-box-number">90<small>%</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
       <!-- </div> -->
        <!-- /.col -->
        <!-- <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Likes</span>
              <span class="info-box-number">41,410</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        <!--</div> -->
        <!-- /.col -->

        <!-- fix for small devices only -->
      <!--   <div class="clearfix visible-sm-block"></div> -->

       <!--  <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Sales</span>
              <span class="info-box-number">760</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
       <!--  </div> -->
        <!-- /.col -->
        <!-- <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">New Members</span>
              <span class="info-box-number">2,000</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
       <!--  </div> --> 
        <!-- /.col -->
      <!-- </div> -->
      <!-- /.row -->

      <!-- <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Monthly Recap Report</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!- /.box-header -->
         <!--    <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <p class="text-center">
                    <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                  </p>

                  <div class="chart">-->
                    <!-- Sales Chart Canvas -->
                   <!-- <canvas id="salesChart" style="height: 180px;"></canvas>
              -->
              <!-- /.row -->
           <!--  </div>
          <!- ./box-body -->
            <!-- <div class="box-footer">
              <div class="row">
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                    <h5 class="description-header">$35,210.43</h5>
                    <span class="description-text">TOTAL REVENUE</span>
                  </div>-->
                  <!-- /.description-block -->
               <!--  </div> -->
                <!-- /.col -->
             
              </div>
              <!-- /.row -->
       <!--      </div> -->
            <!-- /.box-footer -->
          <!-- </div> -->
          <!-- /.box -->
        <!-- </div> -->
        <!-- /.col -->
      <!--</div> -->
      <!-- /.row -->

      <!-- Main row -->
    
      <!-- /.row -->

    <!-- /.content -->
    
@endsection