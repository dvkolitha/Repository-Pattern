@extends('layouts.adminDashboard')
@section('page-content')
<!-- page content -->
<div class="container-fluide">
  <div class="page-title">
    <div class="title_left">
      <h3>Edit a User</h3>
    </div>
  </div>

  <div class="clearfix"></div>
  <br/>
                  <form  method="POST" action="{{route('allUsers.updateUser',$user)}}" enctype="multipart/form-data">
                     {{csrf_field()}}
                     {{ method_field('PUT') }}
                   <div class="row">
                     <div class="form-group">
                         <label class="col-md-2 col-sm-12 col-xs-12" for="firstName">Name</label>
                         <input class="col-md-10 col-sm-12 col-xs-12" type="text" name="firstName" placeholder="name" value="{{$user->firstName}}">
                     </div>
                     <div class="form-group">
                         <label class="col-md-2 col-sm-12 col-xs-12" for="middleName">Middle Name</label>
                         <input class="col-md-10 col-sm-12 col-xs-12" type="text" name="middleName" placeholder="middle name" value="{{$user->middleName}}">
                     </div>  
                     <div class="form-group">
                         <label class="col-md-2 col-sm-12 col-xs-12" for="lastName">Last Name</label>
                         <input class="col-md-10 col-sm-12 col-xs-12" type="text" name="lastName" placeholder="last name" value="{{$user->lastName}}">
                     </div>
                     <div class="form-group">
                         <label class="col-md-2 col-sm-12 col-xs-12" for="address">Address</label>
                         <textarea class="col-md-10 col-sm-12 col-xs-12" name="address">{{$user->address}}</textarea>
                     </div>  
                     <div class="form-group">
                         <label class="col-md-2 col-sm-12 col-xs-12" for="dob">Date Of Birth</label>
                         <input class="col-md-10 col-sm-12 col-xs-12" type="date" name="dob" placeholder="DOB" value="{{$user->dob}}">
                     </div>
                     <div class="form-group">
                         <label class="col-md-2 col-sm-12 col-xs-12" for="email">Email</label>
                         <input class="col-md-10 col-sm-12 col-xs-12" type="email" name="email" placeholder="email" value="{{$user->email}}">
                     </div> 
                     <div class="form-group">
                         <label class="col-md-2 col-sm-12 col-xs-12" for="nic_number">NIC Number</label>
                         <input class="col-md-10 col-sm-12 col-xs-12" type="number" name="nic_number" placeholder="NIC" value="{{$user->nic_number}}">
                     </div> 
                     <div class="form-group">
                         <label class="col-md-2 col-sm-12 col-xs-12" for="mobile_number">Contact Number</label>
                         <input class="col-md-10 col-sm-12 col-xs-12" type="number" name="mobile_number" placeholder="Contact Number" value="{{$user->mobile_number}}">
                     </div>
                     <div class="form-group">
                         <label class="col-md-2 col-sm-12 col-xs-12" for="password">PassWord</label>
                         <input class="col-md-10 col-sm-12 col-xs-12" type="password" name="password" placeholder="Password">
                     </div>  
                     <div class="form-group">
                         <label class="col-md-2 col-sm-12 col-xs-12" for="password">PassWord Confirm</label>
                         <input class="col-md-10 col-sm-12 col-xs-12" type="password"  name="password_confirmation"  placeholder="Password">
                     </div>  
                     <div class="form-group">
                         <label class="col-md-2 col-sm-12 col-xs-12" for="photo_id">Profile Picture</label>
                         <input class="col-md-10 col-sm-12 col-xs-12" type="file" name="photo_id" >
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
 
