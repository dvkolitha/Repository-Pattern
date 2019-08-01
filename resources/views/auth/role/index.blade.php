@extends('layouts.adminDashboard')
@section('page-content')
<!-- page content -->
<div class="">
  <h2>Role Management</h2>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Create a new Role</h2>
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

        <p>To create a new Role please click the create button below and follow the instruction.</p>

          <a href="{{route('role.create')}}" class="btn btn-default">Create</a>

      </div>
    </div>
  </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Role<small>tables</small></h2>
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
              @foreach($roles as $role)
              <tr>
                <td>{{$role->name}}</td>
                <td>{{$role->name}}</td>
                <td>{{$role->name}}</td>
                <td>{{$role->name}}</td>
                <td>{{$role->name}}</td>
                <td>{{$role->name}}</td>
                <td>
                   <div style="    display: inline;">
                     <a href="{{route('role.edit',$role)}}" class="btn btn-danger btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i>
                     Edit</a>
                      <form  method="post" action="{{route('role.destroy',$role)}}">
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
  <div class="">
    <h2>Assign Roles to User </h2>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Assign a new Role</h2>
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

          <p>To assign a new Role please click the create button below and follow the instruction.</p>

            <a href="{{route('userRole.create')}}" class="btn btn-default">Create</a>

        </div>
      </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>
<div class="x_panel">
  <div class="x_title">
    <h2>Role<small>tables</small></h2>
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
    <table  id="datatable" class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>name</th>
          <th>email</th>
          <th>address</th>
          <th>roles</th>
          <th>actions</th>
        </tr>
      </thead>
      <tbody>
            @foreach($users as $user)
                  <tr>
                         <td>{{$user->firstName}}</td>
                         <td>{{$user->email}}</td>
                         <td>{{$user->address}}</td>
                         <td>
                              @php
                                $userRoles = $user->roles;
                              @endphp
                                  <ul>
                                        @foreach($userRoles as $userRole)
                                          @php
                                            $role = $user->role($userRole->role_id);
                                          @endphp
                                              <li>
                                                {{$role->name}}
                                                <form  method="post" action="{{route('userRole.destroy',$userRole)}}">
                                                      {{csrf_field()}}
                                                      {{ method_field('DELETE') }}

                                                     <button type="submit"  class="btn btn-danger btn-xs" name="submit"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                                                 </form>
                                              </li>
                                        @endforeach 
                                  </ul>
                         </td>
                         <td>
                         </td> 
                  </tr>
            @endforeach
      </tbody>
    </table>
  </div>
  <div class="">
    <h2>Assign Approval to User </h2>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Assign a Approval</h2>
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

          <p>To assign a approval to a user , please click the create button below and follow the instruction.</p>

            <a href="{{route('userApproval.create')}}" class="btn btn-default">Create</a>

        </div>
      </div>
    </div>
  </div>
  <div class="x_content">
    <p class="text-muted font-13 m-b-30">
     
    </p>
    <table  id="datatable" class="table table-responsive table-bordered">
      <thead>
        <tr>
          <th>name</th>
          <th>email</th>
          <th>address</th>
          <th>Approver</th>
        </tr>
      </thead>
      <tbody>
            @foreach($users as $user)
                  <tr>
                         <td>{{$user->firstName}}</td>
                         <td>{{$user->email}}</td>
                         <td>{{$user->address}}</td>
                         <td>
                            @if($user->isApprover == 0)
                             -
                            @else
                              Approver
                            @endif
                         </td>
                  </tr>
            @endforeach
      </tbody>
    </table>
  </div>
</div>

<!-- /page content -->
@endsection
