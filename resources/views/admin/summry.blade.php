

<style type="text/css">
  .rating {
    float:left;
}

/* :not(:checked) is a filter, so that browsers that don’t support :checked don’t 
   follow these rules. Every browser that supports :checked also supports :not(), so
   it doesn’t make the test unnecessarily selective */
.rating:not(:checked) > input {
    position:absolute;
    top:-9999px;
    clip:rect(0,0,0,0);
}

.rating:not(:checked) > label {
    float:right;
    width:1em;
    padding:0 .1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:200%;
    line-height:1.2;
    color:#ddd;
    text-shadow:1px 1px #bbb, 2px 2px #666, .1em .1em .2em rgba(0,0,0,.5);
}

.rating:not(:checked) > label:before {
    content: '★ ';
}

.rating > input:checked ~ label {
    color: #f70;
    text-shadow:1px 1px #c60, 2px 2px #940, .1em .1em .2em rgba(0,0,0,.5);
}

.rating:not(:checked) > label:hover,
.rating:not(:checked) > label:hover ~ label {
    color: gold;
    text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
}

.rating > input:checked + label:hover,
.rating > input:checked + label:hover ~ label,
.rating > input:checked ~ label:hover,
.rating > input:checked ~ label:hover ~ label,
.rating > label:hover ~ input:checked ~ label {
    color: #ea0;
    text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
}

.rating > label:active {
    position:relative;
    top:2px;
    left:2px;
}

/* end of Lea's code */

/*
 * Clearfix from html5 boilerplate
 */

.clearfix:before,
.clearfix:after {
    content: " "; /* 1 */
    display: table; /* 2 */
}

.clearfix:after {
    clear: both;
}

/*
 * For IE 6/7 only
 * Include this rule to trigger hasLayout and contain floats.
 */

.clearfix {
    *zoom: 1;
}

/* my stuff */
#status, button {
    margin: 20px 0;
}




/*//////////////////////////////////////////////////////////////////
[ FONT ]*/

@font-face {
  font-family: Poppins-Regular;
  src: url('../fonts/poppins/Poppins-Regular.ttf'); 
}

@font-face {
  font-family: Poppins-Medium;
  src: url('../fonts/poppins/Poppins-Medium.ttf'); 
}

@font-face {
  font-family: Poppins-Bold;
  src: url('../fonts/poppins/Poppins-Bold.ttf'); 
}

@font-face {
  font-family: Poppins-SemiBold;
  src: url('../fonts/poppins/Poppins-SemiBold.ttf'); 
}

/*//////////////////////////////////////////////////////////////////
[ RESTYLE TAG ]*/

* {
  margin: 0px; 
  padding: 0px; 
  box-sizing: border-box;
}

/*body, html {
  height: 100%;
  font-family: Poppins-Regular, sans-serif;
}*/

/*---------------------------------------------*/
a {
  font-family: Poppins-Regular;
  font-size: 14px;
  line-height: 1.7;
  color: #666666;
  margin: 0px;
  transition: all 0.4s;
  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
}

a:focus {
  outline: none !important;
}

a:hover {
  text-decoration: none;
}

/*---------------------------------------------*/
h1,h2,h3,h4,h5,h6 {
  margin: 0px;
}

p {
  font-family: Poppins-Regular;
  font-size: 14px;
  line-height: 1.7;
  color: #666666;
  margin: 0px;
}

ul, li {
  margin: 0px;
  list-style-type: none;
}


/*---------------------------------------------*/
input {
  outline: none;
  border: none;
}

input[type="number"] {
    -moz-appearance: textfield;
    appearance: none;
    -webkit-appearance: none;
}

input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
}

textarea {
  outline: none;
  border: none;
}

textarea:focus, input:focus {
  border-color: transparent !important;
}

input:focus::-webkit-input-placeholder { color:transparent; }
input:focus:-moz-placeholder { color:transparent; }
input:focus::-moz-placeholder { color:transparent; }
input:focus:-ms-input-placeholder { color:transparent; }

textarea:focus::-webkit-input-placeholder { color:transparent; }
textarea:focus:-moz-placeholder { color:transparent; }
textarea:focus::-moz-placeholder { color:transparent; }
textarea:focus:-ms-input-placeholder { color:transparent; }

input::-webkit-input-placeholder {color: #999999;}
input:-moz-placeholder {color: #999999;}
input::-moz-placeholder {color: #999999;}
input:-ms-input-placeholder {color: #999999;}

textarea::-webkit-input-placeholder {color: #999999;}
textarea:-moz-placeholder {color: #999999;}
textarea::-moz-placeholder {color: #999999;}
textarea:-ms-input-placeholder {color: #999999;}

/*---------------------------------------------*/
button {
  outline: none !important;
  border: none;
  background: transparent;
}

button:hover {
  cursor: pointer;
}

iframe {
  border: none !important;
}




/*//////////////////////////////////////////////////////////////////
[ Contact ]*/

.container-contact100 {
  width: 100%;  
  min-height: 100vh;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  padding: 15px;
  background: transparent;
  position: relative;
  z-index: 1;
}

.contact100-map {
  position: absolute;
  z-index: -2;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
}

.wrap-contact100 {
  width: 670px;
  background: #fff;
  border-radius: 10px;
  overflow: hidden;
  position: relative;
}

/*==================================================================
[ Title form ]*/
.contact100-form-title {
  width: 100%;
  position: relative;
  z-index: 1;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  flex-direction: column;
  align-items: center;

  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;

  padding: 64px 15px 64px 15px;
}

.contact100-form-title-1 {
  font-family: Poppins-Bold;
  font-size: 20px;
  color: #fff;
  line-height: 1.2;
  text-align: center;
  padding-bottom: 7px;
}

.contact100-form-title-2 {
  font-family: Poppins-Regular;
  font-size: 15px;
  color: #fff;
  line-height: 1.5;
  text-align: center;
}


.contact100-form-title::before {
  content: "";
  display: block;
  position: absolute;
  z-index: -1;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  background-color: rgba(54,84,99,0.7);
}


/*==================================================================
[ Form ]*/

.contact100-form {
  width: 100%;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  padding: 43px 88px 57px 190px;
}


/*------------------------------------------------------------------
[ Input ]*/

.wrap-input100 {
  width: 100%;
  position: relative;
  border-bottom: 1px solid #b2b2b2;
  margin-bottom: 26px;
}

.label-input100 {
  font-family: Poppins-Regular;
  font-size: 15px;
  color: #808080;
  line-height: 1.2;
  text-align: right;

  position: absolute;
  top: 14px;
  left: -105px;
  width: 80px;

}

/*---------------------------------------------*/
.input100 {
  font-family: Poppins-Regular;
  font-size: 15px;
  color: #555555;
  line-height: 1.2;

  display: block;
  width: 100%;
  background: transparent;
  padding: 0 5px;
}

.focus-input100 {
  position: absolute;
  display: block;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  pointer-events: none;
}

.focus-input100::before {
  content: "";
  display: block;
  position: absolute;
  bottom: -1px;
  left: 0;
  width: 0;
  height: 1px;

  -webkit-transition: all 0.6s;
  -o-transition: all 0.6s;
  -moz-transition: all 0.6s;
  transition: all 0.6s;

  background: #57b846;
}


/*---------------------------------------------*/
input.input100 {
  height: 45px;
}


textarea.input100 {
  min-height: 115px;
  padding-top: 14px;
  padding-bottom: 13px;
}


.input100:focus + .focus-input100::before {
  width: 100%;
}

.has-val.input100 + .focus-input100::before {
  width: 100%;
}


/*------------------------------------------------------------------
[ Button ]*/
.container-contact100-form-btn {
  width: 100%;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  /*padding-top: 8px;*/
}

.contact100-form-btn {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0 20px;
  min-width: 160px;
  height: 50px;
  background-color: #57b846;
  border-radius: 25px;

  font-family: Poppins-Regular;
  font-size: 16px;
  color: #fff;
  line-height: 1.2;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

.contact100-form-btn i {
  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

.contact100-form-btn:hover {
  background-color: #333333;
}

.contact100-form-btn:hover i {
  -webkit-transform: translateX(10px);
  -moz-transform: translateX(10px);
  -ms-transform: translateX(10px);
  -o-transform: translateX(10px);
  transform: translateX(10px);
}


/*------------------------------------------------------------------
[ Responsive ]*/

@media (max-width: 576px) {
  .contact100-form {
    padding: 43px 15px 57px 117px;
  }
}

@media (max-width: 480px) {
  .contact100-form {
    padding: 43px 15px 57px 15px;
  }

  .label-input100 {
    text-align: left;
    position: unset;
    top: unset;
    left: unset;
    width: 100%;
    padding: 0 5px;
  }
}


/*------------------------------------------------------------------
[ Alert validate ]*/

.validate-input {
  position: relative;
}

.alert-validate::before {
  content: attr(data-validate);
  position: absolute;
  max-width: 70%;
  background-color: #fff;
  border: 1px solid #c80000;
  border-radius: 2px;
  padding: 4px 25px 4px 10px;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
  right: 2px;
  pointer-events: none;

  font-family: Poppins-Medium;
  color: #c80000;
  font-size: 13px;
  line-height: 1.4;
  text-align: left;

  visibility: hidden;
  opacity: 0;

  -webkit-transition: opacity 0.4s;
  -o-transition: opacity 0.4s;
  -moz-transition: opacity 0.4s;
  transition: opacity 0.4s;
}

.alert-validate::after {
  content: "\f06a";
  font-family: FontAwesome;
  display: block;
  position: absolute;
  color: #c80000;
  font-size: 15px;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
  right: 8px;
}

.alert-validate:hover:before {
  visibility: visible;
  opacity: 1;
}

@media (max-width: 992px) {
  .alert-validate::before {
    visibility: visible;
    opacity: 1;
  }
}



</style>
@extends('layouts.adminLayout.admin_design')
@section('content')
  <div class="content-wrapper">
   @if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif
     
         <!-- <section class="content-header"><h2>Summary </h2></section> -->
          <!-- general form elements -->
        
        <section class="content container-contact100">
    

    <div class="wrap-contact100">
    <!-- style="background-image: url(/images/physiofit-logo.jpg);" -->
   
          
        </span>

    <div class="col-lg-8">   
        <section class="content-header"><h3>Summary Report</h3></section>
      
      </div>

  <table class="table">
    <thead>
      <tr>
      <td>Full name</td><td>{{$summry['firstname']}}</td></tr>
    <tr>  <td>Package</td> <td>{{$summry['pack']}}</td> </tr>
    <tr>  <td>Starting Date</td> <td>{{$summry['joindate']}}</td> </tr>
    <tr>  <td>Expire Date</td>  <td>{{$summry['enddate']}}</td>  </tr>
    <tr>  <td>Amount</td>   <td>{{$summry['amnt']}}</td> </tr>
    <tr>  <td>InvoiceID</td>   <td>{{$summry['InvoiceID']}}</td> </tr>
    <tr>  <td>Transaction Type</td><td>{{$summry['TransactionType']}}</td>  </tr>
    <tr>  <td>Due Date</td> <td>{{$summry['duedate']}}</td> </tr>
    <tr>  <td>Due Amount</td> <td>{{$summry['dueamnt']}}</td> </tr>
      </tr>
    </thead>
    <tbody>
      <tr>
      
 </tr><td colspan="2" style="text-align: center;"><a href="{{url('paymentforreceiptno/'.$summry['InvoiceID'])}}"><b style="font-size: 20px;">Print  <i class="fa fa-print" style="size: 20px;"></i></b></a></td></tr>
    </tbody>
  </table>


      <!-- <form class="contact100-form validate-form wrap-contact100 " style="border-color: gray">

      <div class="wrap-input100 validate-input" data-validate="Name is required">
          <span class="label-input100">Date</span>
          <input class="input100 form-control" type="date" name="date" placeholder="Enter full name" value="{{Carbon\Carbon::today()->format('Y-m-d')}}">
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Name is required">
          <span class="label-input100">Full Name :</span>
          <input class="input100" type="text" name="name" placeholder="Enter full name" value="{{$summry['firstname']}}">
          <span class="focus-input100"></span>
        </div>


        <div class="wrap-input100 validate-input" data-validate = "Message is required">
          <span class="label-input100">Package :</span>
         <input class="input100" type="text" name="name" placeholder="Enter full name" value="{{$summry['pack']}}">
          <span class="focus-input100"></span>
        </div>
<div class="wrap-input100 validate-input" data-validate = "Message is required">
          <span class="label-input100">Starting Date:</span>
         <input class="input100" type="text" name="name" placeholder="Enter full name" value="{{$summry['joindate']}}">
          <span class="focus-input100"></span>
        </div>
        <div class="wrap-input100 validate-input" data-validate = "Message is required">
          <span class="label-input100">Expire Date :</span>
         <input class="input100" type="text" name="name" placeholder="Enter full name" value="{{$summry['enddate']}}">
          <span class="focus-input100"></span>
        </div>
        
        <div class="wrap-input100 validate-input" data-validate="Phone is required">
          <span class="label-input100">Amount</span>
          <input class="input100" type="text" name="phone" placeholder="Enter phone number"value="{{$summry['amnt']}}">
          <span class="focus-input100"></span>
        </div>
         <div class="wrap-input100 validate-input" data-validate="Phone is required">
          <span class="label-input100">Invoice ID</span>
          <input class="input100" type="text" name="phone" placeholder="Enter phone number"value="{{$summry['InvoiceID']}}">
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
          <span class="label-input100">Transaction Type:</span>
          <input class="input100" type="text" name="email" placeholder="Enter email addess" value="{{$summry['TransactionType']}}">
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Phone is required">
          <span class="label-input100">Due Date:</span>
          <input class="input100" type="text" name="phone" placeholder="Enter phone number" value="{{$summry['duedate']}}">
          <span class="focus-input100"></span>
        </div>

       <div class="wrap-input100 validate-input" data-validate="Phone is required">
          <span class="label-input100">Due amount:</span>
          <input class="input100" type="text" name="phone" placeholder="Enter phone number" value="{{$summry['dueamnt']}}">
          <span class="focus-input100"></span>
        </div>
        @php $no=4; @endphp

      
      </form> -->
      </div>
    </div>
  </section>

</div>
<script Language="javascript">

    function printfile(no) {
      
        //window.frames['objAdobePrint'+no].focus();
          window.frames['objAdobePrint'+no].print();
        
    }

</script>
@endsection