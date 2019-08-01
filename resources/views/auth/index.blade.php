@extends('layouts.adminDashboard')
@section('page-content')
<!-- page content -->
<div class="">
  <h2>User Management</h2>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Create a new User</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <p>To create a new User please click the create button below and follow the instruction.</p>

          <a href="{{route('register')}}" class="btn btn-default">Create</a>

      </div>
    </div>
  </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>User<small>tables</small></h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Settings 1</a>
            </li>
            <li><a href="#">Settings 2</a>
            </li>
          </ul>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <p class="text-muted font-13 m-b-30">
       
      </p>
      <table  id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
        <thead>
          <tr>
            <th>name</th>
            <th>email</th>
            <th>address</th>
            <th>nic number</th>
            <th>mobile number</th>
            <th>date of birth</th>
            <th>actions</th>
          </tr>
        </thead>


        <tbody>
              @foreach($users as $user)
              <tr>
                <td>{{$user->firstName}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->address}}</td>
                <td>{{$user->nic_number}}</td>
                <td>{{$user->mobile_number}}</td>
                <td>{{$user->dob}}</td>
                <td>
                   <div style="    display: inline;">
                     <a href="{{route('allUsers.editUser',$user)}}" class="btn btn-danger btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i>
                     Edit</a>
                      <form  method="post" action="{{route('allUsers.deleteUser',$user)}}">
                            {{csrf_field()}}
                            {{ method_field('DELETE') }}

                           <button type="submit"  class="btn btn-danger btn-xs" name="submit"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                       </form>
                   </div>
                </td> 
              </tr>
              @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="clearfix"></div>


<!-- /page content -->
@endsection
