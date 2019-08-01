@extends('layouts.adminDashboard')
@section('page-content')
<!-- page content -->
<div class="container-fluide">
  <div class="page-title">
    <div class="title_left">
      <h3>Assign roles to a User</h3>
    </div>
  </div>

  <div class="clearfix"></div>
  <br/>
                  <form  method="POST" action="{{route('userRole.store')}}">
                     {{csrf_field()}}
                   <div class="row">

                     <div class="form-group">
                       <label for="userId">Select the User</label>
                       @if ($errors->has('userId'))
                           <span class="help-block" style="color:red">
                               <strong>{{ $errors->first('userId') }}</strong>
                           </span>
                       @endif
                       <select class=" form-control" name="userId"  >
                                  <option  disabled>Please select the User</option>
                                        @foreach($users as $id => $user)
                                            <option value="{{ $id }}">{{ $user }}</option>
                                          @endforeach
                       </select>
                     </div>
                     <div class="form-group">
                       <label for="roleId">Select Roles</label>
                       @if ($errors->has('roleId'))
                           <span class="help-block" style="color:red">
                               <strong>{{ $errors->first('roleId') }}</strong>
                           </span>
                       @endif
                       <select class="select2_multiple form-control" multiple="multiple" name="roleId[]"  >
                                  <option  disabled>Please select roles </option>
                                        @foreach($roles as $id => $role)
                                            <option value="{{ $id}}">{{ $role }}</option>

                                          @endforeach
                       </select>
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
 
