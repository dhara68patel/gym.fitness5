@extends('layouts.adminLayout.admin_design')
@section('content')
<!-- left column -->
  <div class="content-wrapper">
   
     
         <section class="content-header"><h2>Assign Terms</h2></section>
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
              <h3 class="box-title">Assign Term</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body"> 
              <div class="col-lg-3">Note: Use '0' for Unlimited</div><div class="col-lg-5">
              <form id="form" action="{{ url('assignterms') }}" method="post"
               onsubmit="return validateform()">
                 {{ csrf_field() }}
                <!-- text input -->
                 <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <div class="form-group"><tr>
                  <label>Scheme</label><td></tr>
                  <select name="assignterms" readonly class="form-control" class="span11"><option selected disabled="">--Please choose an option--</option>
                    @foreach($schemes as $scheme) 
              <option value="{{ $scheme->schemeid }}" {{ ( $SchemeName == $scheme->schemename) ? 'selected' : '' }}>{{ $scheme->schemename }}</option>@endforeach
          </select>
                </div>
                <div class="form-group">
               
          
              @foreach($terms as $term)
           <tr><td><input type="checkbox" name="terms[]"  value="{{$term->termsid}}"><label>{{$term->terms}}</label></td><td><input type="text" disabled="" class="number" class="number" minlength="1" maxlength="10"  name="value[]"></td>
        @endforeach</tr>
                </div></table>


       <!-- <div class="form-group">
                  <label>Description</label>
                 <textarea class="form-control" rows="3"  name="description" placeholder="Enter Descrription"></textarea>
                </div> -->

              <div class="form-group">
                  <div class="col-sm-6">
         <button type="submit" class="btn btn-info btn-block">
         Save</button></div>   <div class="col-sm-6"> <a href="{{ url('assignedterms') }}"class="btn btn-danger btn-block">Cancel</a></div>
     
      </div>
                <!-- Select multiple-->
        

              </form></div><div class="col-lg-3"></div>
            </div>
            <!-- /.box-body -->
          </div>
      
  </section>
</div>
</div>
</div>

<script type="text/javascript">
 $('input[type="checkbox"]').on('change',function(){
   // event.preventDefault();
  // var searchIDs = $('input[type="checkbox"]').map(function(){     return $(this).val();    }).get(); // <----
     // $next = $('input[type="checkbox"]').next('td').find('[type=text]');
     //  $next.attr('required','required');
      
            //  alert('if');
        
     var x= true;
          $('input[type="checkbox"]').map(function(){
            if($(this).prop("checked") == true){
              var y=  $(this).closest('tr').find('[type=text]').val();
             $(this).closest('tr').find('[type=text]').prop("disabled", false).attr('required','');
                if (y == "")
                {
                  // alert("kindly enter values of selected PaymentType !");
                 x= false;
              }
            }
            else if($(this).prop("checked") == false){
            $(this).closest('tr').find('[type=text]').prop("disabled", true).attr('required',false);
               $(this).closest('tr').find('[type=text]').val('');
            }
        });
          //alert(x);
       if (x == false)
         return false;
       else
        return true;
  });
</script>
@endsection