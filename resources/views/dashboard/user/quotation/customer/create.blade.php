@extends('dashboard.user.userDashboard')
@section('page-content')
<!-- page content -->
<div class="container-fluide">
  <div class="page-title">
    <div class="title_left">
      <h3>Create Customer</h3>
    </div>
  </div>

  <div class="clearfix"></div>
  <br/>
                  <form  method="POST" action="{{route('customer.store')}}">
                     {{csrf_field()}}
                   <div class="row">

                     <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                       <label class="col-md-2 col-sm-12 col-xs-12" for="name">Name</label>
                       <input class="col-md-10 col-sm-12 col-xs-12" type="text" placeholder="name" class="form-control" name="name">
                     </div>  
                                       
                     <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                         <label class="col-md-2 col-sm-12 col-xs-12"  for="address">Address</label>
                         <textarea class="col-md-10 col-sm-12 col-xs-12" name="address"></textarea>
                     </div>
                     <div class="form-group">
                         <label class="col-md-2 col-sm-12 col-xs-12" for="contact_number">Contact Number</label>
                         <input class="col-md-10 col-sm-12 col-xs-12" type="number" name="contact_number" placeholder="contact number">
                     </div>
                     <div class="form-group">
                         <label  class="col-md-2 col-sm-12 col-xs-12" for="email">Email</label>
                         <input class="col-md-10 col-sm-12 col-xs-12" type="email" name="email" placeholder="email">
                         <br/> 
                     </div>    
                    <br>
                        
                    <div class="form-group " >
                         <button style="margin-top: 35px; margin-left: 25px;" type="submit" class="btn btn-primary">Submit</button>
                    </div>     
                   </div> 
                  </form>
  <div class="clearfix"></div>
</div>
      


  @include('errors.error')
<!-- /page content -->
@endsection
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
  $("select").select2();
</script>
