@extends('dashboard.user.userDashboard')
@section('page-content')
<!-- page content -->
<div class="">
  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Create a New Quotation <small>it's very simple</small></h2>
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
        <p>To create a new Quotaion please click the create button below and follow the instruction.</p>
          <a href="{{route('quotation.create')}}" class="btn btn-default">Create</a>
      </div>
    </div>
  </div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Quotation <small>table</small></h2>
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
            <th>status</th>
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
                    @if($quotation->state == 1)
                          @php
                             $quotationApprovedBy = $quotation->approvals()->where('quotation_id',$quotation->id)->first();
                          @endphp
                              @if($quotationApprovedBy)
                               </br>
                                 @php
                                  $user = App\User::find($quotationApprovedBy->approved_by);  
                                 @endphp
                                  <button class="btn btn-success">Approved By</br>
                                   {{$user->firstName}}
                                  </button>
                              @else
                                  <button class="btn btn-success">Approved </button>
                              @endif
                    @else
                       <button class="btn btn-default" style="background-color: gray">Pending</button>
                    @endif
                  </td>
                  <td>{{$quotationDetails->discount_rate}}</td>
                  <td>
                    <a href="{{url('/quotation/exportExcel/'. $quotation->id .'')}}" class="btn btn-primary btn-xs"><i class="fa fa-file-excel" aria-hidden="true"></i>
                     Excel</a>
                     @if($quotation->state == 0)
                           <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Confirmation
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                              <li>
                                <a class="emailVerBtn" href="#" data-toggle="modal" data-target="#emailConfirmationModal" data-email="{{$customer->email}}" data-customer="{{$customer->id}}" data-quotation="{{$quotation->id}}">Email Confirmation</a>
                              </li>
                              <li>
                                <a class="manualVerBtn" href="#" data-toggle="modal" data-target="#manualConfirmationModal" data-qt="{{$quotation->id}}">Manual Confirmation</a>
                              </li>
                            </ul>
                          </div> 
                     @endif
                  </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      {{-- modal for email confirmation --}}
      <div class="modal fade" id="emailConfirmationModal" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header" style="height:50px;background-color: #009688">
                <button type="button" class="close" ><i class="fas fa-window-close"data-dismiss="modal" style="font-size: 24px;"></i></button>
              </div>
              <div class="modal-body">
                    <form id="emailVeriModal" action="https://ecosolveerp.lk/quotation/emailVerification" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                      {{csrf_field()}}
                          <h4 style="text-align: center;">Email Confirmation</h4>
                          <h3 id="quotation" style="text-align: center;color: red"></h3>
                            <div style="display: none;">
                               <input type="number" name="customerId" id="customerId">
                               <input type="number" name="quotationId" id="quotationId">
                            </div>
                            <div class="form-group">
                              <label for="sender">Sending Email address:</label>
                              <input type="email" class="form-control" name="sender" id="sender">
                            </div>
                            <div class="form-group">
                              <label for="sender">Customer / Receiving Email address:</label>
                              <input type="email" class="form-control" name="receiver" id="receiver">
                            </div>
                            <div class="form-group">
                              <label for="pdf">Upload Quotaion</label>
                              <input type="file"  name="pdf" id="pdf">
                            </div>
                            
                            <button type="submit" class="btn btn-default">Submit</button>
                    </form>
              </div>
              <div class="modal-footer" style="height:40px;background-color: #009688">
                
              </div>
            </div>
          </div>
        </div>
      {{-- modal for email confirmation --}}
      {{-- modal for manual verification --}}
       <div class="modal fade" id="manualConfirmationModal" role="dialog">
           <div class="modal-dialog">
             <!-- Modal content-->
             <div class="modal-content">
               <div class="modal-header" style="height:50px;background-color: #009688">
                 <button type="button" class="close" ><i class="fas fa-window-close"data-dismiss="modal" style="font-size: 24px;"></i></button>
               </div>
               <div class="modal-body">
                     <form id="manualVeriModal" action="https://ecosolveerp.lk/quotation/manualVerification" method="post" accept-charset="utf-8" >
                       {{csrf_field()}}
                           <h4 style="text-align: center;">Manual Confirmation</h4>
                           <h3 id="qt" style="text-align: center;color: red"></h3>
                             <div style="display: none;">
                                <input type="number" name="quotationId" id="qtVal">
                             </div>                           
                             <button type="submit" class="btn btn-success" style="position:relative;left: 45%;">Confirm</button>
                     </form>
               </div>
               <div class="modal-footer" style="height:40px;background-color: #009688">
               </div>
             </div>
           </div>
         </div>
      {{-- modal for manual verification --}}
    </div>
  </div>
</div>
<div class="clearfix"></div>


<!-- /page content -->
@endsection
@section('extra-script')
<script>
  //jquery for email verification
    //todo list
    // 1 on click email verfication button get cutomer details(email)
    // 2 apply customer details/email to email verification modal
    // 3 on submit validate and send required data to the controller
    //ajax header
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
    }); 
    $(document).ready(function () {
    // 1 on click email verfication button get cutomer details
      $(document).on('click','.emailVerBtn',function () {
        let email = $(this).data('email');  
        let customerId = $(this).data('customer');
        let quotationId = $(this).data('quotation');
        addCustomerEmail(email,customerId,quotationId);
      });
       // $('.emailVerBtn').click(function () {
        
       // });
    // 1 on click email verfication button get cutomer details
    // 2 apply customer email to email verification modal
        function addCustomerEmail(email,customerId,quotationId) {
          $('#sender').val(''); 
          $('#receiver').val(''); 
          $('#receiver').val(email); 
          $('#customerId').val(customerId); 
          $('#quotationId').val(quotationId); 
          $('#quotation').text(quotationId);
          
        }
    // 2 apply customer email to email verification modal
    // 3 on submit validate and send required data to the controller
        $(document).on('submit','#emailVeriModal',function (event) {
           
          let customerId = $('#customerId').val();
          let quotationId = $('#quotationId').val(); 
          let sender = $('#sender').val();
          let receiver = $('#receiver').val();
          event.preventDefault();

          if( validation(customerId,quotationId,sender,receiver)){
            $('#emailVeriModal').get(0).submit();
          }else {
            console.log('errors');
          }
        });
        // $('#emailVeriModal').submit(function (event) {
         
          
        // });
        //validation function
        function validation(customerId,quotationId,sender,receiver) {
          if(customerId && sender && receiver && quotationId){
            if (validateEmail(sender) && validateEmail(receiver)) {
               return true;
            }
           return false;
          }
          return false;
        }
        function validateEmail(email) {
          var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
              return re.test(String(email).toLowerCase());
        }
    // 3 on submit validate and send required data to the controller
    });
  //jquery for email verification

  //jquery for manual verification
   $(document).ready(function () {
     $(document).on('click','.manualVerBtn',function () {
       let quotationId = $(this).data('qt');
       addQuotation(quotationId);
     });
     function addQuotation(quotationId) {
        $('#qt').text(quotationId);
        $('#qtVal').val(quotationId);
     }
   });
   $(document).on('submit','#manualVeriModal',function () {
     let quotationId = $('.qt').val();
      $('#manualVeriModal').get(0).submit();
   });
  //jquery for manual verification
</script>
@endsection
