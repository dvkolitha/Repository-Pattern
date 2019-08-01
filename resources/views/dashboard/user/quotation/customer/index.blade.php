@extends('dashboard.user.userDashboard')
@section('page-content')
<!-- page content -->
<div class="">
  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Create a Customer </h2>
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

        <p>To create a new Customer please click the create button below and follow the instruction.</p>

          <a href="{{route('customer.create')}}" class="btn btn-default">Create</a>

      </div>
    </div>
  </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Customers<small>tables</small></h2>
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
      <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
        <thead>
          <tr>
            <th>id</th>
            <th>name</th>
            <th>address</th>
            <th>contact number</th>
            <th>email</th>
            <th>action</th>
          </tr>
        </thead>


        <tbody>
              @foreach($customers as $customer)
              <tr>
                <td>{{$customer->id}}</td>
                <td>{{$customer->name}}</td>
                <td>{{$customer->address}}</td>
                <td>{{$customer->contact_number}}</td>
                <td>{{$customer->email}}</td>
                <td>
                   <div style="    display: inline;">
                     <a href="{{url('customer/'. $customer->id .'/edit')}}" class="btn btn-danger btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i>
                     Edit</a>
                      <form  method="post" action="{{url('customer/'. $customer->id .'')}}">
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
