@extends('layouts.adminDashboard')
@section('page-content')
<!-- page content -->
<div class="container-fluide">
  <div class="page-title">
    <div class="title_left">
      <h3>Edit a Role</h3>
    </div>
  </div>

  <div class="clearfix"></div>
  <br/>
                  <form  method="POST" action="{{route('role.update',$role)}}" enctype="multipart/form-data">
                     {{csrf_field()}}
                     {{method_field('PUT')}}
                   <div class="row">
                     <div class="form-group">
                         <label class="col-md-2 col-sm-12 col-xs-12" for="name">Name</label>
                         <input class="col-md-10 col-sm-12 col-xs-12" type="text" name="name" placeholder="name" value="{{$role->name}}">
                     </div>
                     <div class="form-group">
                         <label class="col-md-2 col-sm-12 col-xs-12" for="isAdmin">Administrator</label>
                         @if($role->isAdmin == 1)
                          <input name="isAdmin" type="checkbox" class="" checked /> 
                         @endif
                         @if($role->isAdmin !== 1)
                          <input name="isAdmin" type="checkbox" class="" />
                         @endif
                     </div>  
                     <div class="form-group">
                         <label class="col-md-2 col-sm-12 col-xs-12" for="isAccounting">Account Access</label>
                         @if($role->isAccounting == 1)
                          <input name="isAccounting" type="checkbox" class="" checked /> 
                         @endif
                         @if($role->isAccounting !== 1)
                          <input name="isAccounting"  class="" type="checkbox" > 
                         @endif
                         
                     </div>
                     <div class="form-group">
                         <label class="col-md-2 col-sm-12 col-xs-12" for="isProduction">Production Access</label>
                         @if($role->isProduction == 1)
                          <input name="isProduction" type="checkbox" class="" checked /> 
                         @endif
                         @if($role->isProduction !== 1)
                          <input name="isProduction" class="" type="checkbox" > 
                         @endif
                         
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
 
