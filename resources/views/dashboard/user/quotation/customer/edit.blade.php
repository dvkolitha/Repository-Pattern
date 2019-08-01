@extends('dashboard.user.userDashboard')
@section('page-content')
<!-- page content -->

       <div class="clearfix"></div>
  <br/>
                  <form  method="POST" action="{{route('customer.update',$customer->id)}}">
                     {{csrf_field()}}
                     {{ method_field('PUT') }}

                   <div class="row">

                     <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                       <label class="col-md-2 col-sm-12 col-xs-12" for="name">Name</label>
                       <input class="col-md-10 col-sm-12 col-xs-12" type="text" placeholder="name" class="form-control" name="name" value="{{$customer->name}}">
                     </div>  
                                       
                     <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                         <label class="col-md-2 col-sm-12 col-xs-12"  for="address">Address</label>
                         <textarea class="col-md-10 col-sm-12 col-xs-12" name="address">{{$customer->address}}</textarea>
                     </div>
                     <div class="form-group">
                         <label class="col-md-2 col-sm-12 col-xs-12" for="contact_number">Contact Number</label>
                         <input class="col-md-10 col-sm-12 col-xs-12" type="number" name="contact_number" placeholder="{{$customer->contact_number}}" value=" {{$customer->contact_number}}">
                     </div>
                     <div class="form-group">
                         <label  class="col-md-2 col-sm-12 col-xs-12" for="email">Email</label>
                         <input class="col-md-10 col-sm-12 col-xs-12" type="email" name="email" placeholder="email" value=" {{$customer->email}}">
                         <br/> 
                     </div>    
                    <br>
                        
                    <div class="form-group " >
                         <button style="margin-top: 35px; margin-left: 25px;" type="submit" class="btn btn-primary">Submit</button>
                    </div>     
                   </div> 
                  </form>
  <div class="clearfix"></div>


  @include('errors.error')
<!-- /page content -->
@endsection
