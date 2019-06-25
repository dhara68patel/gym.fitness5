<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gym</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('bower_components/jvectormap/jquery-jvectormap.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">

<!-- <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/jquery.dataTables.css') }}" /> -->
<!-- <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/dataTables.responsive.css') }}" /> -->
<link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.datetimepicker.min.css') }}" />
<link href="{{ asset('bower_components/bootstrap/dist/css/bootstrap-toggle.min.css') }}" rel="stylesheet">
<link href="{{ asset('bower_components/bootstrap/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">

<!-- <script src="//code.jquery.com/jquery.min.js"></script> -->

<!-- <script src="alert.js"></script> -->
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
<script  src="{{ asset('bower_components/bootstrap/dist/js/moment.js') }}"></script>
<script  src="{{ asset('bower_components/bootstrap/dist/js/transition.js') }}">
</script>
<script  src="{{ asset('bower_components/bootstrap/dist/js/collapse.js') }}"></script>
<script  src="{{ asset('bower_components/bootstrap/dist/js/
bootstrap.datetimepicker.min.js') }}"></script>


<!-- <script  src="{{ asset('bower_components/bootstrap/dist/js/jquery.dataTables.js') }}"></script> -->
<!-- <script  src="{{ asset('bower_components/bootstrap/dist/js/dataTables.responsive.js') }}"></script> -->
<!-- <script  src="{{ asset('bower_components/bootstrap/dist/js/dataTables.bootstrap.js') }}"></script> -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap-toggle.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap-select.min.js') }}"></script>



<!-- <link rel="stylesheet" href="css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'> -->
<style type="text/css">
  //
// Modals
// --------------------------------------------------

// .modal-open      - body class for killing the scroll
// .modal           - container to scroll within
// .modal-dialog    - positioning shell for the actual modal
// .modal-content   - actual modal w/ bg and corners and shit

// Kill the scroll on the body
.modal-open {
  overflow: hidden;
}

// Container that the modal scrolls within
.modal {
  display: none;
  overflow: hidden;
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: @zindex-modal;
  -webkit-overflow-scrolling: touch;

  // Prevent Chrome on Windows from adding a focus outline. For details, see
  // https://github.com/twbs/bootstrap/pull/10951.
  outline: 0;

  // When fading in the modal, animate it to slide down
  &.fade .modal-dialog {
    .translate(0, -25%);
    .transition-transform(~"0.3s ease-out");
  }
  &.in .modal-dialog { .translate(0, 0) }
}
.modal-open .modal {
  overflow-x: hidden;
  overflow-y: auto;
}

// Shell div to position the modal with bottom padding
.modal-dialog {
  position: relative;
  width: auto;
  margin: 10px;
}

// Actual modal
.modal-content {
  position: relative;
  background-color: @modal-content-bg;
  border: 1px solid @modal-content-fallback-border-color; //old browsers fallback (ie8 etc)
  border: 1px solid @modal-content-border-color;
  border-radius: @border-radius-large;
  .box-shadow(0 3px 9px rgba(0,0,0,.5));
  background-clip: padding-box;
  // Remove focus outline from opened modal
  outline: 0;
}

// Modal background
.modal-backdrop {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: @zindex-modal-background;
  background-color: @modal-backdrop-bg;
  // Fade for backdrop
  &.fade { .opacity(0); }
  &.in { .opacity(@modal-backdrop-opacity); }
}

// Modal header
// Top section of the modal w/ title and dismiss
.modal-header {
  padding: @modal-title-padding;
  border-bottom: 1px solid @modal-header-border-color;
  &:extend(.clearfix all);
}
// Close icon
.modal-header .close {
  margin-top: -2px;
}

// Title text within header
.modal-title {
  margin: 0;
  line-height: @modal-title-line-height;
}

// Modal body
// Where all modal content resides (sibling of .modal-header and .modal-footer)
.modal-body {
  position: relative;
  padding: @modal-inner-padding;
}

// Footer (for actions)
.modal-footer {
  padding: @modal-inner-padding;
  text-align: right; // right align buttons
  border-top: 1px solid @modal-footer-border-color;
  &:extend(.clearfix all); // clear it in case folks use .pull-* classes on buttons

  // Properly space out buttons
  .btn + .btn {
    margin-left: 5px;
    margin-bottom: 0; // account for input[type="submit"] which gets the bottom margin like all other inputs
  }
  // but override that for button groups
  .btn-group .btn + .btn {
    margin-left: -1px;
  }
  // and override it for block buttons as well
  .btn-block + .btn-block {
    margin-left: 0;
  }
}

// Measure scrollbar width for padding body during modal show/hide
.modal-scrollbar-measure {
  position: absolute;
  top: -9999px;
  width: 50px;
  height: 50px;
  overflow: scroll;
}

// Scale up the modal
@media (min-width: @screen-sm-min) {
  // Automatically set modal's width for larger viewports
  .modal-dialog {
    width: @modal-md;
    margin: 30px auto;
  }
  .modal-content {
    .box-shadow(0 5px 15px rgba(0,0,0,.5));
  }

  // Modal sizes
  .modal-sm { width: @modal-sm; }
}

@media (min-width: @screen-md-min) {
  .modal-lg { width: @modal-lg; }
}

    .center_div{
    align-items: center;
    align-self: center;
    float: center;
    
    width:100% /* value of your choice which suits your alignment */
}
h1{
      margin-left: 20px;
    text-decoration-line: underline;
}
label{
   display: inline-block;
}
.container-fluid {
    overflow: auto;
}
.col-xs-4{
  float:right;
  position: absolute;
  margin-left: 200px;
}
.container-fluid{
  overflow: auto;
}
.content-fit-box{
   width: fit-content;
}
table.table  {
    table-layout: auto;
  
}
.table-bordered{
     border-color: gray; 
}
table td {
  table-layout: relative;
    white-space: nowrap;
     width: auto;
     text-indent: all;

}

element.style {
}
* {
    margin: 0;
    padding: 0;
}
* {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.skin-yellow-light .sidebar-menu>li>a {
    border-left: 3px solid transparent;
    font-weight: 600;
}
.skin-yellow-light .sidebar a {
    color: #444;
}
a {
    color: #3c8dbc;
}
a {
    color: #337ab7;
    text-decoration: none;
}
user agent stylesheet
a:-webkit-any-link {
    color: -webkit-link;
    cursor: pointer;
}
user agent stylesheet
li {
    text-align: -webkit-match-parent;
}
.sidebar-menu, .main-sidebar .user-panel, .sidebar-menu>li.header {
    white-space: nowrap;
    overflow: hidden;
}
.sidebar-menu {
    list-style: none;
    margin: 0;
    padding: 0;
}
user agent stylesheet
ul {
    list-style-type: disc;
}

.table-wrapper{
  width: auto;
}
.main-header{
    /*background-color:#eabb10;*/
  }
  .skin-green-light{
    background-color: #9CBF70;
}
.skin-black-light{
   background-color:#525454; 
}
/*.skin-orange-light{
   background-color:#525454; 
}*/
  
    .table-title .add-new{
    background-color: none;
    border-color: #367fa9;
    border-radius: 3px;
}
.btn-primary{
  background-color: black;
}

</style>
</head>
<body class="sidebar-mini skin-yellow-light" id="bodyheader">


<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap  -->
<!-- <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script> -->
<!-- SlimScroll -->
<script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('bower_components/chart.js/Chart.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard2.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>

@include('layouts.adminLayout.admin_header')

@yield('content')
@include('layouts.adminLayout.admin_footer')

<script type="text/javascript">

//$('#form').on('submit', function(event) {

function validateform(){
   // event.preventDefault();
  // var searchIDs = $('input[type="checkbox"]').map(function(){     return $(this).val();    }).get(); // <----
     // $next = $('input[type="checkbox"]').next('td').find('[type=text]');
     //  $next.attr('required','required');
     var x= true;
          $('input[type="checkbox"]').map(function(){
            if($(this).prop("checked") == true){
              var y=  $(this).closest('tr').find('[type=text]').val();
             $(this).closest('tr').find('[type=text]').attr('required','required');
                if (y == "")
                {
                  
                  // alert("kindly enter values of selected terms !");
                 x= false;
              }
            }
            else if($(this).prop("checked") == false){
              
            }
        });
          //alert(x);
       if (x == false)
         return false;
       else
        return true;
  }
  function validateform1(){
   // event.preventDefault();
  // var searchIDs = $('input[type="checkbox"]').map(function(){     return $(this).val();    }).get(); // <----
     // $next = $('input[type="checkbox"]').next('td').find('[type=text]');
     //  $next.attr('required','required');
     var x= true;
          $('input[type="checkbox"]').map(function(){
            if($(this).prop("checked") == true){
              var y=  $(this).closest('tr').find('[type=text]').val();
             $(this).closest('tr').find('[type=text]').attr('required','required');
                if (y == "")
                {
                  alert("kindly enter values of selected terms !");
                 x= false;
              }
            }
            else if($(this).prop("checked") == false){
              
            }
        });
          //alert(x);
       if (x == false)
         return false;
       else
        return true;
  }
      // $('input[type="text"]').attr('required','required');

//});
    // $('input[type="checkbox"]').checked(function() {

    //         alert("Checkbox");
    //     if ($('input[type="text"]').attr('required')) {
    //         $('input[type="text"]').removeAttr('required');
    //     } 

    //     else {
    //         $('input[type="text"]').attr('required','required');
    //     }

    // });


  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  // function goPage (newURL) {

  //     // if url is empty, skip the menu dividers and reset the menu selection to default
  //     if (newURL != "") {
      
  //         // if url is "-", it is this page -- reset the menu:
  //         if (newURL == "-" ) {
  //             resetMenu();            
  //         } 
  //         // else, send page to designated URL            
  //         else {  
  //           document.location.href = newURL;
  //         }
  //     }
  // }

// resets the menu selection upon entry to this page:
// function resetMenu() {
//    document.gomenu.selector.selectedIndex = 2;
// }

//  $( function() {
//     $( "#datepicker" ).datepicker();
//   } );
 $(".number").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $(this).find('.errmsg').html("Digits Only are allowed ").show().fadeOut("slow");
               return false;
    }
   });

</script>
</body>
</html>
