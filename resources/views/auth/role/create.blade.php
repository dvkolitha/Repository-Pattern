@extends('layouts.adminDashboard')
@section('page-content')
<!-- page content -->
<div class="container-fluide">
  <div class="page-title">
    <div class="title_left">
      <h3>Create a Role</h3>
    </div>
  </div>

  <div class="clearfix"></div>
  <br/>
                  <form  method="POST" action="{{route('role.store')}}" enctype="multipart/form-data">
                     {{csrf_field()}}
                   <div class="row">
                     <div class="form-group">
                         <label class="col-md-2 col-sm-12 col-xs-12" for="name">Name</label>
                         <input class="col-md-10 col-sm-12 col-xs-12" type="text" name="name" placeholder="name">
                     </div>
                     <div class="form-group">
                         <label class="col-md-2 col-sm-12 col-xs-12" for="isAdmin">Administrator</label>
                         <input name="isAdmin" type="checkbox" class="" /> 
                     </div>  
                     <div class="form-group">
                         <label class="col-md-2 col-sm-12 col-xs-12" for="isAccounting">Account Access</label>
                         <input name="isAccounting"  class="" type="checkbox" >
                     </div>
                     <div class="form-group">
                         <label class="col-md-2 col-sm-12 col-xs-12" for="isProduction">Production Access</label>
                         <input name="isProduction" class="" type="checkbox" >
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
 
