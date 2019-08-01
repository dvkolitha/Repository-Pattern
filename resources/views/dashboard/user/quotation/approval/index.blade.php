@extends('dashboard.user.userDashboard')
@section('page-content')
<!-- page content -->
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Quotation Approval<small>table</small></h2>
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
            <th>quotation number</th>
            <th>customer details</th>
            <th>total cost</th>
            <th>created by</th>
            <th>state</th>
            <th>discount rate</th>
            <th>action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($quotations as $quotation)
                <tr>
                  <td>{{$quotation->id}}</td>
                  <td>
                    @php
                     $customer = App\Customer::find($quotation->customer_id);  
                    @endphp
                    name: {{$customer->name}}   </br>
                    address: {{$customer->address}} </br>
                    contact number: {{$customer->contact_number}} </br>
                    email: {{$customer->email}} </br>
                  </td>
                  <td>
                    @php
                      $quotationDetails = App\Quotation\QuotationDetails::where("quotation_id",$quotation->id)->first();
                    @endphp
                    Rs {{$quotationDetails->total_cost}}.00
                  </td>
                  <td>
                    @php
                      $createdBy = \App\User::find($quotation->created_by);  
                    @endphp
                    {{$createdBy->firstName}}
                  </td>
                  <td>
                     @if($quotation->state !== 0)
                          <button class="btn btn-success btn-sm">Approved</button>
                     @else
                          <button class="btn btn-danger btn-sm">Not Approved</button>
                     @endif
                  </td>
                  <td>{{$quotationDetails->discount_rate}}</td>
                  <td>
                    <a href="{{url('/quotation/approval/'. $quotation->id .'')}}" class="btn btn-success btn-xs"><i class="fas fa-user-check" aria-hidden="true"></i>
                     Approval</a>
                    <br>
                    <a href="{{url('/quotation/exportExcel/'. $quotation->id .'')}}" class="btn btn-primary btn-xs"><i class="fa fa-file-excel" aria-hidden="true"></i>
                     Export Excel</a>
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
