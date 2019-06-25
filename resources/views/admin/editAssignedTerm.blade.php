@extends('layouts.adminLayout.admin_design')
@section('content')
<!-- left column -->
  <div class="content-wrapper">
   
     
         <section class="content-header"><h2>Edit Assign Terms</h2></section>
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
              <h3 class="box-title">Assigned Term</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body"> <div class="col-lg-3">Note: Use '0' for Unlimited</div><div class="col-lg-5">
         <form role="form" action="{{ url('editassignterms/'.$s[0]->schemetermid) }}" method="post" onsubmit="return validateform1()">
                 {{ csrf_field() }}
                <!-- text input --> <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                 
                <div class="form-group"><tr>
                  <label>Scheme</label><td> </td></tr>
                  <select name="assignterms" readonly class="form-control"><option selected disabled="">--Please choose an option--</option>
                    @foreach($schemes as $scheme)
              <option value="{{ $scheme->schemeid }}" {{ ( $s[0]->schemeid == $scheme->schemeid  ) ? 'selected' : '' }}>
                {{ $scheme->schemename }}</option>@endforeach
          </select>
                </div>
                <div class="form-group">  
         
              <?php
              $i=count($s);
              $sterm = array();
              $k=0;
              
              foreach($terms as $term)
           {
                 $x=null;

              for($j=0; $j<$i; $j++){
             
           
                  if( $s[$j]->termsid == $term->termsid)
                  {
                  $x = $s[$j]->value;
                 
                  }
                     
              }
              
               $sterm[$k]=$x;
              $k++;
               
            
               // echo $k;
              ?>

            
           <tr><td><input type="checkbox" name="terms[]" value="{{$term->termsid}}"  {{ ($sterm[$k-1] !== null ? 'checked' : '') }}><label>{{$term->terms}}</label></td>

            <td><input type="text" name="value[]" class="number"minlength="1" maxlength="10" disabled value="{{($sterm[$k-1] !== null ? $sterm[$k-1]: $sterm[$k-1])}}"></td>
       <?php }  ?> </tr> 
                </div></table>

                <!-- <div class="form-group">
                  <label>Description</label>
                 <textarea class="form-control" rows="3"  name="description" placeholder="Enter Descrription"></textarea>
                </div>
                  <td><a href="{{ url('editassignterms/'.$scheme->id) }}"class="edit" title="Edit"><i class="fa fa-edit"></i></a>
                  <a href="{{ url('deletescheme/'.$scheme->id) }}"class="delete" title="Delete"><i class="fa fa-trash"></i></a>
 -->
                      <div class="form-group">
               
                  <div class="col-sm-6">
         <button type="submit" class="btn bg-orange btn-block">
         Save</button></div>   <div class="col-sm-6"> <a href="{{ url('assignedterms') }}"class="btn bg-red btn-block">Cancel</a></div>
     
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
   $( document ).ready(function() {
    $('input[type="checkbox"]').trigger('change');
   });
   $('input[type="checkbox"]').on('change',function(){

        
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