<?php 
  include('..///config/database.php');
?>
<style type="text/css">
 @import url(https://fonts.googleapis.com/css?family=Montserrat);
</style>
  <aside class="main-sidebar">
    @php $us = session('username');
     $photo ='';
    $user =   DB::table('employee')->where('username',$us)->get()->first();

      if($user->photo){
        $photo = $user->photo;
    }
     else{
    $photo =  'default.png';
  }
          
     @endphp  

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('images/'.$photo) }}" class="img-circle" style="height: 40px;" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Welcome</p> 
          {{session('username')}}
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
      
        <li class="active treeview menu-open">
   
            <li><a  href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i>
              <span><b>Dashboard </b></span>
            <span class="pull-right-container">   
                </span> 
          </a>
        </li>
       
       <!--  <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Layout Options</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-chevron-right"></i> Top Navigation</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-chevron-right"></i> Boxed</a></li>
            <li><a href="pages/layout/fixed.html"><i class="fa fa-chevron-right"></i> Fixed</a></li>
            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-chevron-right"></i> Collapsed Sidebar</a></li>
          </ul>
        </li> -->
         <!--
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-chevron-right"></i> ChartJS</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-chevron-right"></i> Morris</a></li>
            <li><a href="pages/charts/flot.html"><i class="fa fa-chevron-right"></i> Flot</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-chevron-right"></i> Inline charts</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>UI Elements</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/UI/general.html"><i class="fa fa-chevron-right"></i> General</a></li>
            <li><a href="pages/UI/icons.html"><i class="fa fa-chevron-right"></i> Icons</a></li>
            <li><a href="pages/UI/buttons.html"><i class="fa fa-chevron-right"></i> Buttons</a></li>
            <li><a href="pages/UI/sliders.html"><i class="fa fa-chevron-right"></i> Sliders</a></li>
            <li><a href="pages/UI/timeline.html"><i class="fa fa-chevron-right"></i> Timeline</a></li>
            <li><a href="pages/UI/modals.html"><i class="fa fa-chevron-right"></i> Modals</a></li>
          </ul>
        </li> -->
     @php $menu ='admin' @endphp 


        <li class="treeview {{ $menu ==  'admin' ? 'active' : ''  }}" >
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Admin</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="treeview">
          <a href="#">
            <i class="fa fa-dot-circle-o"></i>
            <span><b>Roles</b></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu ">
            <li><a  href="{{ url('addrole') }}"><i class="fa fa-chevron-right"></i> Add Role</a></li>
            <li><a href="{{ url('roles') }}"><i class="fa fa-chevron-right"></i> View roles</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span><b>Users</b></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a  href="{{ url('addUser') }}"><i class="fa fa-chevron-right"></i> Add User</a></li>
            <li><a href="{{ url('users') }}"><i class="fa fa-chevron-right"></i>View Users</a></li> 
          </ul>
        </li>
        <ul class="nav nav-second">
          <li class="treeview {{ $menu ==  'company' ? 'active' : ''  }}">
          <a href="#">
            <i class="fa fa-bank"></i>&nbsp;
            <span><b>Company</b></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <!--  <li><a  href="{{ url('addUser') }}"><i class="fa fa-chevron-right"></i> Add User</a></li> -->
            <li><a href="{{ url('addCompany') }}"><i class="fa fa-chevron-right"></i>Add company</a></li>
             <li><a href="{{ url('company') }}"><i class="fa fa-chevron-right"></i>View company</a></li>
          </ul>
        </li>
      </ul>
           <li class="treeview {{ $menu ==  'paymenttypes' ? 'active' : ''  }}">
          <a href="#">
            <i class="fa fa-inr"></i>
            <span><b>PaymentTypes</b></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('addpaymenttype') }}"><i class="fa fa-book"></i> <span>Add Payment Type</span></a></li>
            <li><a href="{{ url('paymenttypes') }}"><i class="fa fa-chevron-right"></i>View Payment Type</a></li>
            
          </ul>
        </li>
       <li><a href="{{ url('settings') }}"><i class="fa fa-cog"></i> <span><b>Settings</b></span></a></li>
      
          </ul>
        </li>

        <li class="treeview {{ $menu ==  'scheme' ? 'active' : ''  }}">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Scheme</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
                <li class="treeview {{ $menu ==  'scheme-rootscheme' ? 'active' : ''  }}">
          <a href="#">
            <i class="fa fa-bookmark"></i>
            <span><b>Root Scheme</b></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a  href="{{ url('addrootscheme') }}"><i class="fa fa-chevron-right"></i> Add Root Scheme</a></li>
            <li><a href="{{ url('rootschemes') }}"><i class="fa fa-chevron-right"></i> View Root Scheme</a></li>
            
          </ul>
        </li> 
        <li class="treeview {{ $menu ==  'schemes' ? 'active' : ''  }}">
          <a href="#">
            <i class="fa fa-bookmark"></i>
            <span><b>Schemes</b></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu margin">
            <li><a href="{{ url('addscheme') }}"><i class="fa fa-book"></i> <span> Add Scheme</span></a></li>
            <li><a href="{{ url('schemes') }}"><i class="fa fa-chevron-right"></i> View Scheme</a></li>
            
          </ul>
        </li>
           <li class="treeview {{ $menu ==  'terms' ? 'active' : ''  }}">
          <a href="#">
            <i class="fa fa-bookmark"></i>
            <span><b>Terms</b></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('addterms') }}"><i class="fa fa-book"></i> <span> Add Terms</span></a></li>
            <li><a href="{{ url('terms') }}"><i class="fa fa-chevron-right"></i> View Terms</a></li>
            <li><a href="{{ url('assignedterms') }}"><i class="fa fa-book"></i> Manage Terms</a></li>
          </ul>
        </li>
         </ul>
        </li>

            <li class="treeview {{ $menu ==  'inquiry' ? 'active' : ''  }}">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Inquiry</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="{{ url('addinquiry') }}"><i class="fa fa-chevron-right"></i> Add Inquiry</a></li>
            <li><a href="{{ url('inquiry') }}"><i class="fa fa-chevron-right"></i> View Inquiry</a></li>
            <li><a href="{{ url('followup') }}"><i class="fa fa-chevron-right"></i> Manage followup</a></li>
                 <li class="treeview {{ $menu ==  'reason' ? 'active' : ''  }}">
          <a href="#">
            <i class="fa fa-dot-circle-o"></i>
            <span><b>Reason</b></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a  href="{{ url('addReason') }}"><i class="fa fa-chevron-right"></i> Add Reason</a></li>
            <li><a href="{{ url('reasons') }}"><i class="fa fa-chevron-right"></i> View Reason</a></li>
          </ul>
        </li>
           <!--<li><a href="{{ url('manageinquiry') }}"><i class="fa fa-chevron-right"></i> Manage Inquiry </a></li>
            <li><a href="{{ url('managefollowup') }}"><i class="fa fa-chevron-right"></i> Manage Followups</a></li>
            <li><a href="{{ url('addreson') }}"><i class="fa fa-chevron-right"></i> Add Reason</a></li>
            <li><a href="{{ url('sendsms') }}"><i class="fa fa-chevron-right"></i> Send SMS</a></li> -->
          </ul>
        </li>
          <li class="treeview {{ $menu ==  'membership' ? 'active' : ''  }}">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Membership</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span><b>Member</b></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a  href="{{ url('addMember') }}"><i class="fa fa-chevron-right"></i> Add Member</a></li>
            <li><a href="{{ url('members') }}"><i class="fa fa-chevron-right"></i> View Members</a></li>
          </ul>
        </li>
<!-- 
        <li><a href="{{ url('addCashCredit') }}"><i class="fa fa-inr"></i> <span><b>CashCredit</b></span></a></li> -->
        <li><a href="{{ url('assignPackageOrRenewalPackage') }}"><i class="fa fa-cog"></i> <span><b>Assign / Renewal Package</b></span></a></li>
         <li><a href="{{ url('idpendingreport') }}"><i class="fa fa-chevron-right"></i> <span><b>View Id Pending Report</span></b></a></li>
      </ul>
           <li class="treeview">
         <a href="#">
           <i class="fa fa-user"></i>
           <span>Personal Trainer</span>
           <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
         </a>
         <ul class="treeview-menu">

           <li><a href="{{route('addptlevel')}}"><i class="fa fa-plus"></i> Add PT Level</a></li>
           <li><a href="{{route('assignptlevel')}}"><i class="fa fa-user-plus"></i> Assign PT Level</a></li>
           <li><a href="{{route('addpttime')}}"><i class="fa fa-plus"></i> Add PT Time</a></li>
           <li><a href="{{route('assignmembertotrainer')}}"><i class="fa fa-user-plus"></i> Assign Member To PT</a></li>
           <li><a href="{{route('manageassignedmember')}}"><i class="fa fa-user-plus"></i> Manage Member</a></li>


       </li>
      <!--   <li><a href="{{ url('memberProfile') }}"><i class="fa fa-chevron-right"></i>Memebr Profile</a></li>
         -->
    
        <!-- <li><a href="{{ url('posture') }}"><i class="fa fa-book"></i> <span>posture form</span></a></li> -->
         <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-bookmark"></i>
            <span>Schemes Terms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>  <a href="{{url('assignterms')}}"><i class="fa fa-chevron-right"></i>Assign Terms</a></li>
            <li><a href="{{ url('assignedterms') }}"><i class="fa fa-chevron-right"></i>View Assigned Terms</a></li>
            
          </ul>
        </li> -->
      
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/simple.html"><i class="fa fa-chevron-right"></i> Simple tables</a></li>
            <li><a href="pages/tables/data.html"><i class="fa fa-chevron-right"></i> Data tables</a></li>
          </ul>
        </li> -->
        <!-- <li>
          <a href="pages/calendar.html">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <span class="pull-right-container">
              <smView class="label pull-right bg-red">3</smView>
              <smView class="label pull-right bg-blue">17</smView>
            </span>
          </a>
        </li>
        <li>
          <a href="pages/mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <smView class="label pull-right bg-yellow">12</smView>
              <smView class="label pull-right bg-green">16</smView>
              <smView class="label pull-right bg-red">5</smView>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Examples</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/examples/invoice.html"><i class="fa fa-chevron-right"></i> Invoice</a></li>
            <li><a href="pages/examples/profile.html"><i class="fa fa-chevron-right"></i> Profile</a></li>
            <li><a href="pages/examples/login.html"><i class="fa fa-chevron-right"></i> Login</a></li>
            <li><a href="pages/examples/register.html"><i class="fa fa-chevron-right"></i> Register</a></li>
            <li><a href="pages/examples/lockscreen.html"><i class="fa fa-chevron-right"></i> Lockscreen</a></li>
            <li><a href="pages/examples/404.html"><i class="fa fa-chevron-right"></i> 404 Error</a></li>
            <li><a href="pages/examples/500.html"><i class="fa fa-chevron-right"></i> 500 Error</a></li>
            <li><a href="pages/examples/blank.html"><i class="fa fa-chevron-right"></i> Blank Page</a></li>
            <li><a href="pages/examples/pace.html"><i class="fa fa-chevron-right"></i> Pace Page</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-chevron-right"></i> Level One</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-chevron-right"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-chevron-right"></i> Level Two</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-chevron-right"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-chevron-right"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-chevron-right"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-chevron-right"></i> Level One</a></li>
          </ul>
        </li>
        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-chevron-right text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-chevron-right text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-chevron-right text-aqua"></i> <span>Information</span></a></li>
      </ul> -->
    </ul>
     
    </section>
    <!-- /.sidebar -->
  </aside>
   <script type="text/javascript">
  var url = window.location;
// for sidebar menu but not for treeview submenu
$('ul.sidebar-menu a').filter(function() {
    return this.href == url;
}).parent().siblings().removeClass('active').end().addClass('active');
// for treeview which is like a submenu
$('ul.treeview-menu a').filter(function() {
    return this.href == url;
}).parentsUntil(".sidebar-menu > .treeview-menu").siblings().removeClass('active menu-open').end().addClass('active menu-open');
</script>