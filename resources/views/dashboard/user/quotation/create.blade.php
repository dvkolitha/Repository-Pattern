@extends('dashboard.user.userDashboard')
@section('page-style')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style type="text/css" media="screen">
  .close-btn:hover {
   color: red;
   cursor: pointer;
  }
  .add-button:hover {
    color: blue;
    cursor: pointer;
  }
  .option-button:hover {
    color: #5e35b1;
    cursor: pointer;
  }
  .add-button-other:hover {
    color: blue;
    cursor: pointer;
  }
</style>
@endsection
@section('page-content')
<!-- page content -->
<div class="row">
     <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"action="" method="">
        {{csrf_field()}}
       <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
           <label for="name">Name</label>
           @if ($errors->has('name'))
           <span class="help-block" style="color:red">
               <strong>{{ $errors->first('name') }}</strong>
           </span>
           @endif
           <input id="name" class="form-control" type="text" name="name">
         </div>
         <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">  
               <label for="customer">Customer</label>
               <select id="customer" class="form-control" name="customer"  >
                     <option selected disabled>Please selecte the Customer </option>
                   @foreach($customers as $id => $name)
                     <option value="{{$id}}">{{$name}}</option>
                   @endforeach
               </select>
         </div> 
       </div>
       <div class="ln_solid"></div>  
       @php
        $num = 0 ;  
       @endphp
{{--        //modal for view product photos
 --}}       <!-- Modal -->
         <div class="modal fade" id="myModal" role="dialog">
           <div class="modal-dialog">
           
             <!-- Modal content-->
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title">Modal Header</h4>
               </div>
               <div class="modal-body">
                 <div class="row">
                   <div class="col-12">
                     <h4 style="text-align: center">Main Image</h4>
                     <div class="forMainImage">
                        
                     </div>
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-12">
                     <h4 style="text-align: center">Gallery Image</h4>
                     <div class="forGalleryImages">
                       
                     </div>
                   </div>
                 </div>
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
             </div>
             
           </div>
         </div>
{{--        //modal for view product photos
 --}}       <div class="ln_solid"></div>
                 <div id='row'>
                   <div id="1"  class="form-group input-row" data-card={{$num}}>
                      <div class="col-md-2 col-sm-6 col-xs-12 form-group has-feedback">
                       <label for="area">Area</label>
                       @if ($errors->has('area'))
                       <span class="help-block" style="color:red">
                           <strong>{{ $errors->first('area') }}</strong>
                       </span>
                       @endif
                       <input class="form-control area" type="text" name="area">
                     </div>
                     <div class="col-md-1 col-sm-6 col-xs-12 form-group has-feedback">
                       <label for="product_category">Category</label>
                       @if ($errors->has('product_category'))
                       <span class="help-block" style="color:red">
                           <strong>{{ $errors->first('product_category') }}</strong>
                       </span>
                       @endif
                       <select id="productCategory" class="form-control productCategory " name="product_category"  >
                               <option selected disabled value="">Select Product Category</option>
                             @foreach($productCategory as $id => $name)
                               <option    value="{{$id}}">{{$name}}</option>
                             @endforeach
                       </select>
                     </div>
                     <div id="watt" class="">
                        
                     </div>
                     <div id="voltage" class="">
                       
                     </div> 
                     <div id="diffuser" class="">
                        
                     </div>
                     <div id="fittingColor" class="">
                        
                     </div>
                     <div id="waterProofed">
                       
                     </div>
                     <div id ="cct">
                      
                     </div>
                     <div id="product">

                     </div>
                      <div class="col-md-1 col-sm-6 col-xs-12 form-group ">
                        <label for="price">Price</label>
                        <input  id="price1"  class="form-control priceInput"  placeholder="Price" name="price[]" value="" disabled>
                      </div>
                      <div class="col-md-1 col-sm-6 col-xs-12 form-group has-feedback">
                          <label for="quantity">Qty</label>
                              @if ($errors->has("quantity"))
                                 <span class="help-block" style="color:red"><strong>{'+'{ $errors->first("quantity") }}</strong>;
                                </span>
                              @endif
                          <div style="display:inline;">
                                    <input id="quantity"{{$num}} type="" class="form-control qty" placeholder="Qty" type="number" name="quantity[]">
                                    <i class="fas fa-plus-square add-button-other" data-toggle="tooltip" title="Add New Row" style="font-size:24px;display:inline;position:relative;top:6px;left:9px;"></i>
                                     <div class="dropdown">
                                           <i class="fas fa-bars option-button dropdown-toggle" data-toggle="dropdown" style="font-size:24px;display:inline;position:relative;top:-20px;left:35px;"></i>
                                           <ul class="dropdown-menu" style="position:relative;top:-20px;left:-100px;">
                                             <li><a parentRowNumber="1" class="photoViewButton" href="#" data-toggle="modal" data-target="#myModal">View Photos</a></li>
                                           </ul>
                                     </div> 
                          </div>
                      </div>
                      <div class="product-total col-md-0 col-sm-6 col-xs-12 form-group has-feedback" style="display: none">
                        <label for="product-total">Total</label>
                        <input id="product-total1"  type="" class="form-control product-total" placeholder="total" type="number" name="product-total[]" value="">
                        <div style="position: relative;left: 50px;top: -42px; font-size:35px;i:hover:color:red;" >
                          <a style="a:hover:background-color:black;" >
                          <i  class="close-btn fas fa-window-close"  data-card={{$num}}></i>
                          </a>
                        </div>
                      </div>
                   </div>
                 </div>  
                   @php
                    $num ++ ;  
                   @endphp
       <div class="row"> 
        <div class="well" style="overflow: auto">
          <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
             <label for="discountRate">Discount Rate  </label>
             <input type="text" class="form-control" id="discountRate" placeholder="Discount Rate" name="discountRate">
             <span class="form-control-feedback right" aria-hidden="true"> % </span>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
           
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
            <label for="end">Total Cost  </label>
            <input type="number" name="end" id="total" class="form-control priceInput">
          </div>
        </div>
       </div>
       <div id="parent">
       </div>  
       <div id="validation-errors">
          @if ($errors)
             @foreach($errors as $error)
               {{$error}}
             @endforeach
          @endif
       </div>                
       <div class="ln_solid"></div>
       <button type="submit" class="btn btn-primary">Create</button>
     </form>
</div>

  @include('errors.error')
<!-- /page content -->
@endsection 
@section('extra-script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  <script> 
    //ajax header
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
    }); 
    //for select2 plugin
    function select2() {
      $('body').on('DOMNodeInserted', '#productCategory', function () {
          $(this).select2();
      });  
      $("select[name = 'product_category']").select2();
    }
    select2() ;
    // short key for adding row
    function addRowShortKey() {
      $(document).on('keypress','.input-row',function (e) { 
       var idOfRow = $(this).attr('id');
       var key = e.which;
        if(key == 13)  // the enter key code
         {
           e.preventDefault();
           if(e.ctrlKey){
                     e.preventDefault();
              //function for adding a new row
               addRow(idOfRow);
               
            }
         }
      }); 
    }
    addRowShortKey();

    //add button for first row
    $(document).on("click",".add-button",function () {
      var idOfRow = $(this).parent().parent().attr("id");
      if(validateNewRow()){
           addRow(idOfRow);
      }else{
        alert("Please insert all necessary values");
      }
    });
    //add button for other rows
    $(document).on("click",".add-button-other",function () {
      var idOfRow = $(this).parent().parent().parent().attr("id");
      if(validateNewRow()){
           addRow(idOfRow);
      }else{
        alert("Please insert all necessary values");
      }
    });

     //function for add a new row
     var inputRowNumber = 2;

     function addRow(idOfRow) {
      var template = '';
      template += '<div id="'+inputRowNumber+'"  class="form-group input-row" >';
      template +=    '<div class="col-md-2 col-sm-6 col-xs-12 form-group has-feedback">';
      template +=      '<label for="area">Area</label>';
      template +=        '@if ($errors->has("area"))';
      template +=         '<span class="help-block" style="color:red">';
      template +=            '<strong>'+'{'+'{$errors->first("area") }}</strong>';
      template +=         '</span>';
      template +=       '@endif';
      template +=     '<input class="form-control area" type="texr" name="area">';
      template +=   '</div>'; 
      template +=   '<div class="col-md-1 col-sm-6 col-xs-12 form-group has-feedback">';
      template +=     '<label for="product_category">Category</label>';
      template +=       '@if ($errors->has("product_category"))';
      template +=         '<span class="help-block" style="color:red">';
      template +=          ' <strong>{'+'{ $errors->first("product_category") }}</strong>';
      template +=         '</span>';
      template +=       '@endif';
      template +=       '<select id="productCategory" class="form-control productCategory" name="product_category"  >';
      template +=         '<option selected disabled value="">Select Product Category</option>';
      template +=         '@foreach($productCategory as $id => $name)';
      template +=         '<option    value="{{$id}}">{{$name}}</option>';
      template +=         '@endforeach';
      template +=       '</select>';
      template +=   '</div>'; 
      template +=   '<div id="watt" class="">'; 
      template +=   '</div>'; 
      template +=   '<div id="voltage" class="">'; 
      template +=   '</div>';
      template +=   '<div id="diffuser" class="">'; 
      template +=   '</div>';
      template +=   '<div id="fittingColor" class="">'; 
      template +=   '</div>';
      template +=   '<div id="waterProofed" class="">'; 
      template +=   '</div>'; 
      template +=   '<div id="cct" class="">'; 
      template +=   '</div>'; 
      template +=   '<div id="product" class="">'; 
      template +=   '</div>'; 
      template +=  '<div class="col-md-1 col-sm-6 col-xs-12 form-group ">';
      template +=    '<label for="price">Price</label>';
      template +=      '@if ($errors->has("price"))';
      template +=      '<span class="help-block" style="color:red">';
      template +=        '<strong>{'+'{ $errors->first("price") }}</strong>';
      template +=      '</span>';
      template +=     '@endif';
      template +=    '<input id="price'+inputRowNumber+'"  class="form-control priceInput"  placeholder="Price" name="price[]" value="" disabled >';
      template +=  '</div>';
      template +=  '<div class="col-md-1 col-sm-6 col-xs-12 form-group has-feedback">';
      template +=     '<label for="quantity">Qty</label>';
      template +=      '@if ($errors->has("quantity"))';
      template +=      '<span class="help-block" style="color:red">';
      template +=        '<strong>{'+'{ $errors->first("quantity") }}</strong>';
      template +=      '</span>';
      template +=     '@endif';
      template +=     '<div style="display:inline;">';
      template +=          '<input id="quantity'+inputRowNumber+'" type="" class="form-control qty" placeholder="Qty" type="number" name="quantity[]">';
      template +=          '<i class="fas fa-trash-alt close-btn" style="font-size:24px;display:inline;position:relative;top:5px;left:-30px;"></i>';
      template +=          '<i class="fas fa-plus-square add-button-other" style="font-size:24px;display:inline;position:relative;top:6px;left:-20px;"></i>';
      template +=      '<div class="dropdown">';
      template +=          '<i class="fas fa-bars option-button dropdown-toggle" data-toggle="dropdown" style="font-size:24px;display:inline;position:relative;top:-20px;left:30px;"></i>';
      template +=          ' <ul class="dropdown-menu" style="position:relative;top:-16px;left:-100px;">';
      template +=             '<li><a parentRowNumber="'+inputRowNumber+'" class="photoViewButton" href="#" data-toggle="modal" data-target="#myModal">View Photos</a></li>';
      template +=          '</ul>';
      template +=      '</div>';
      template +=      '</div>';
      template +=  '</div>';
      template += '</div>';
      

      $('#'+idOfRow+'').after(template);
      // $('#'+inputRowNumber - 1+'').append(template);
      select2() ;
      inputRowNumber ++;
      deleteRow();
     }
     //delete row
     function deleteRow(){
      $('.close-btn').on('click',function(){
                $(this).parents('.input-row').remove();
      });
     }
     
     $(document).on("change",".qty",function () {
      getTotalProductCost();
     });

     //add attributes
     $(document).on("change",".productCategory",function () {
      //get attributes
      var rowId = $(this).parent().parent().attr("id");
      var productCategoryId = $(this).children("option:selected").val();
      $('#'+rowId+'').find(".product").val("");
      $('#'+rowId+'').find(".priceInput").val("");
      $('#'+rowId+'').find(".qty").val("");
      getAttributes(productCategoryId,rowId);
      // add attributes
     });

     function getAttributes(productCategoryId,rowId) {
       var URL = 'https://ecosolveerp.lk/getProduct/'+productCategoryId +'';
       var METHOD = 'GET';
       $.ajax(URL,{
         method : METHOD,
         error : function(){
           $('#watt').empty();
           $('#voltage').empty();
           $('#diffuser').empty();
           $('#fittingColor').empty();
         },
         success : function(data){
           insertWatt(data,rowId);
           insertVoltage(data,rowId);
           insertDiffuser(data,rowId);
           insertFittingColor(data,rowId);
           insertWaterProofed(data,rowId);
           insertCctValue(data,rowId);
         }
       });
     }
                //subfunction required for add attribute
               //insert values to watt attribute
               function  insertWatt  (data,rowId) {
                var myObj, i, x = "";
                var myObj = JSON.parse(data);
                var watt = $('#'+rowId+'').find("#watt");
                $(watt).empty();

                var template = '';

                template += '<div class="col-md-1 col-sm-12 col-xs-12 form-group" style="position:relative;top:-7px;">';
                template +=      '<label for="watt">Watt</label>';
                template +=      '   <span class="help-block" style="color:red">';
                template +=      '      <strong>{{ $errors->first('watt') }}</strong>';
                template +=      '   </span>';
                template +=      ' @if ($errors->has('watt'))';
                template +=      ' @endif';
                template +=      '<select class="form-control attributes watt"  name="watt"  >';
                template +=      '   <option  value="">Please select Watt Values</option>';
                for (x in myObj) {
                    if (x == 'watts') {
                          for (i in myObj.watts) {
                      template += '   <option value="'+ myObj.watts[i]+'">'+i+'</option>';
                      }
                    }
                    
                }                     
                template +=     '</select>';
                template += '</div';
                             $(template).appendTo(watt);
               }

               //insert values to voltage attribute
               function  insertVoltage  (data,rowId) {
                var myObj, i, x = "";
                var myObj = JSON.parse(data);
                var voltage = $('#'+rowId+'').find("#voltage");
                $(voltage).empty();

                var template = '';

                template += '<div class="col-md-1 col-sm-12 col-xs-12 form-group" style="position:relative;top:-7px;">';
                template += '<label for="voltage">Voltage</label>';
                template += '   <span class="help-block" style="color:red">';
                template += '      <strong>{{ $errors->first('voltage') }}</strong>';
                template += '   </span>';
                template += ' @if ($errors->has('voltage'))';
                template += ' @endif';
                template += '<select class="select2 form-control attributes voltage"  name="voltage"  >';
                template += '   <option value="">Please select Voltage Values</option>';
                for (x in myObj) {
                    if (x == 'voltages') {
                          for (i in myObj.voltages) {
                      template += '   <option value="'+ myObj.voltages[i]+'">'+i+'</option>';
                      }
                    }
                    
                }                     
                template += '</select>';
                template += '</div>';
                             $(template).appendTo(voltage);
               }

               //insert values to diffuser attribute
               function  insertDiffuser  (data,rowId) {
                var myObj, i, x = "";
                var myObj = JSON.parse(data);
                var diffuser = $('#'+rowId+'').find("#diffuser");
                $(diffuser).empty();

                var template = '';

                template += '<div class="col-md-1 col-sm-12 col-xs-12 form-group" style="position:relative;top:-7px;">';
                template += '<label for="diffuser">Diffuser</label>';
                template += '   <span class="help-block" style="color:red">';
                template += '      <strong>{{ $errors->first('diffuser') }}</strong>';
                template += '   </span>';
                template += ' @if ($errors->has('diffuser'))';
                template += ' @endif';
                template += '<select class="select2 form-control attributes diffuser"  name="diffuser"  >';
                template += '   <option value="" >Please selece Diffuser Type</option>';
                for (x in myObj) {
                    if (x == 'diffusers') {
                          for (i in myObj.diffusers) {
                      template += '   <option value="'+ myObj.diffusers[i]+'">'+i+'</option>';
                      }
                    }
                    
                }                     
                template += '</select>';
                template += '</div>';
                template += '';
                             $(template).appendTo(diffuser);
               }

               //insert values to fittingColor attribute
               function  insertFittingColor  (data,rowId) {
                var myObj, i, x = "";
                var myObj = JSON.parse(data);
                var fittingColor = $('#'+rowId+'').find("#fittingColor");
                $(fittingColor).empty();

                var template = '';

                template += '<div class="col-md-1 col-sm-12 col-xs-12 form-group" style="position:relative;top:-7px;">';
                template += '<label for="fittingColor">FC</label>';
                template += '   <span class="help-block" style="color:red">';
                template += '      <strong>{{ $errors->first('fittingColor') }}</strong>';
                template += '   </span>';
                template += ' @if ($errors->has('fittingColor'))';
                template += ' @endif';
                template += '<select class="select2 form-control attributes fittingColor"  name="fittingColor"  >';
                template += '   <option value="" >Please selece Fitting Color </option>';
                for (x in myObj) {
                    if (x == 'fittingColors') {
                          for (i in myObj.fittingColors) {
                      template += '   <option value="'+ myObj.fittingColors[i]+'">'+i+'</option>';
                      }
                    }
                    
                }                     
                template += '</select>';
                template += '</div>';
                             $(template).appendTo(fittingColor);
               }

               //insert Water Proofed
               function insertWaterProofed (data,rowId) {
               var myObj, i, x = "";
               var myObj = JSON.parse(data);
               var waterProofed = $('#'+rowId+'').find("#waterProofed");
               $(waterProofed).empty();


               var template = '';

               template += '<div class="col-md-1 col-sm-12 col-xs-12 form-group" style="position:relative;top:-7px;">';
               template += '<label for="waterProofed">WP</label>';
               template += '   <span class="help-block" style="color:red">';
               template += '      <strong>{{ $errors->first('waterProofed') }}</strong>';
               template += '   </span>';
               template += ' @if ($errors->has('waterProofed'))';
               template += ' @endif';
               template += '<select class="select2 form-control attributes waterProofed"  name="waterProofed"  >';
               template += '   <option value="">Please selece water proofed </option>';
               for (x in myObj) {
                  if (x == 'waterProofed') {
                          if(myObj.waterProofed.waterProofed == 1 && myObj.waterProofed.notWaterProofed == 1){
                            template += '<option value="1">waterproofed</option>';
                            template += '<option value="0">not waterproofed</option>';
                          }else if(myObj.waterProofed.waterProofed == 0 && myObj.waterProofed.notWaterProofed == 1) {
                            template += '<option value="0">not waterproofed</option>';
                          }else if(myObj.waterProofed.waterProofed == 1 && myObj.waterProofed.notWaterProofed == 0) {
                            template += '<option value="1">waterproofed</option>';
                          }
                  }
               }                     
               template += '</select>';
               template += '</div>';
                            $(template).appendTo(waterProofed);
               }

               //insert values to cct attribute
               function  insertCctValue  (data,rowId) {
                var myObj, i, x = "";
                var myObj = JSON.parse(data);
                var cct = $('#'+rowId+'').find("#cct");
                $(cct).empty();

                var template = '';

                template += '<div class="col-md-1 col-sm-12 col-xs-12 form-group" style="position:relative;top:-7px;">';
                template += '<label for="cct">CCT</label>';
                template += '   <span class="help-block" style="color:red">';
                template += '      <strong>{{ $errors->first('cct') }}</strong>';
                template += '   </span>';
                template += ' @if ($errors->has('cct'))';
                template += ' @endif';
                template += '<select class="select2 form-control cct"  name="cct"  >';
                template += '   <option  disabled>CCT</option>';
                for (x in myObj) {
                    if (x == 'ccts') {
                          for (i in myObj.ccts) {
                      template += '   <option value="'+ myObj.ccts[i]+'">'+i+'</option>';
                      }
                    }
                    
                }                     
                template += '</select>';
                template += '</div>';
                             $(template).appendTo(cct);
               }
               //subfunction required for add attribute
               //validation required for add attribute
               function validateNewRow() {

                 if(validateName() && validateCustomer() && validateArea() && validateProductCategory() && validateProduct() && validatePrice() && validateQty()){
                   return true; 
                 }else{
                   return false;
                 }

               }
               //validation required for add attribute
     //add attributes

     //get price of product and insert it

     $(document).on("change",".attributes",function () {
      var rowId = $(this).parent().parent().parent().attr("id");
      if(validateGetPrice(rowId)){
        $('#'+rowId+'').find(".product").val("");
        $('#'+rowId+'').find(".priceInput").val("");
       getPrice(rowId);
      }
     });

     function getPrice(rowId) {
       var productCategoryId = $('#'+rowId+'').find(".productCategory").val();
       var wattId = $('#'+rowId+'').find(".watt").val();
       var voltageId = $('#'+rowId+'').find(".voltage").val();
       var diffuserId = $('#'+rowId+'').find(".diffuser").val();
       var fittingColorId = $('#'+rowId+'').find(".fittingColor").val();
       var waterProofedId = $('#'+rowId+'').find(".waterProofed").val();
       
     
       var data = {
        "product_category_id":productCategoryId,
        "watt_id":wattId,
        "voltage_id":voltageId,
        "diffuser_type_id":diffuserId,
        "fitting_color_id":fittingColorId,
        "watter_proofedId":waterProofedId
       };

       var DATA = JSON.stringify(data);
       $.ajax('https://ecosolveerp.lk/quotation/get/price/'+DATA+'',{
        method : 'get',
        data:'data',
        error : function(data){
        },
        success : function(data){
          var newData = JSON.stringify(data);
          var product = JSON.parse(newData);
          var id = product.id;
          var name = product.name;
          var price = product.price;
          
          insertProduct(rowId,id,name);
          insertPrice(rowId,price);
        }
       });
     }

     function insertProduct(idOfRow,id,name) {
       var product = $('#'+idOfRow+'').find("#product");
       $(product).empty();

       var template = '';

       template += '<div class="col-md-1 col-sm-12 col-xs-12 form-group" style="position:relative;top:-7px;">';
       template +=      '<label for="product">Product</label>';
       template +=      '   <span class="help-block" style="color:red">';
       template +=      '      <strong>{{ $errors->first('product') }}</strong>';
       template +=      '   </span>';
       template +=      ' @if ($errors->has('watt'))';
       template +=      ' @endif';
       template +=      '<select class="form-control attributes product"  name="product"  >';
       template +=      '   <option selected disabled value="'+id+'">'+name+'</option>';     
       template +=     '</select>';
       template += '</div';
                    $(template).appendTo(product);
     }

     function insertPrice(idOfRow,price) {
       //find row & insert data
       $('#'+idOfRow+'').find(".priceInput").val(price);
     }
     
           //validation required for get price of product and insert it
           function validateGetPrice(rowId) {
             var productCategoryId = $('#'+rowId+'').find(".productCategory").val();
             var wattId = $('#'+rowId+'').find(".watt").val();
             var voltageId = $('#'+rowId+'').find(".voltage").val();
             var diffuserId = $('#'+rowId+'').find(".diffuser").val();
             var fittingColorId = $('#'+rowId+'').find(".fittingColor").val();
             var waterProofedId = $('#'+rowId+'').find(".waterProofed").val();

             if(wattId != "" && voltageId != "" && diffuserId != "" && fittingColorId != "" && waterProofedId != ""){
               return true;
             }else{
               return false;
             }
           }
           //validation required for get price of product and insert it

    //get price of product and insert it

    //function required for option
         //function required for view photos

         $(document).on('click','.photoViewButton',function () {
           console.log('hura')
           $('.forMainImage').empty();
           $('.forGalleryImages').empty();

           let parentRow = $(this).attr('parentRowNumber');
           let productId = $('#'+parentRow+'').find('.product').children('option:selected').val();
            
           console.log(parentRow) 
           console.log(productId) 
           //get image
           let URL = 'https://ecosolveerp.lk//quotation/getProductImages/'+productId+''
           $.ajax(URL,{
             method:"GET",
             success:function (data) {
               addImages(data[0],data[1].file,data[2]);
             },
             error:function () {
               
             }
           });
         });
          function addImages(productName,mainImage,galleryImages) {
            var template = '';
            template += '<img src="/images/Product/'+productName+'/mainImage/'+mainImage+'" class="img-rounded" alt="Cinque Terre" width="100%" height="100%">';

            $('.forMainImage').append(template);
            
            for (var i = 0; i < galleryImages.length; i++) {
              var templateForGallery = '';
              templateForGallery += '<img src="/images/Product/'+productName+'/galleryImage/'+galleryImages[i].file+'" class="img-rounded" alt="Cinque Terre" width="100%" height="100%">';
              $('.forGalleryImages').append(templateForGallery);
            }
            
          }
         //function required for view photos
    //function required for option
     
    // submit data   
     var inputRows = [];
     var quotation;
     var quotationDetails;
     var sum;
     $("#demo-form2").submit(function (e) {
      inputRows = [];
      e.preventDefault();
      getData();
      getTotalProductCost();
          swal({
            title: "Are you sure?",
            text: "You are going to create a new quotation",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willcreate) => {
            if (willcreate) {
                   if (validateData()) {
                       sendData()
                   } else {
                     swal("There are one or many errors in the Quotation");
                   } 
            } else {
              swal("Your Quotation hasn't been Created!");
            }
          });
      });  
              //sub function required for submit data
               function getData() {
                 $(".input-row").each(function () {
                   inputRows.push({"row_number":$(this).attr('id'),"area":$(this).find(".area").val(),"product_category_id":$(this).find(".productCategory").val(),"product_id":$(this).find(".product").children("option:selected").val(),"cct_id":$(this).find(".cct").children("option:selected").val(),"price":$(this).find(".priceInput").val(),"quantity":$(this).find(".qty").val()});
                 }); 
                  var name  = $('#name').val();
                  var customer  = $('#customer').children("option:selected").val();
                  var discountRate = $("#discountRate").val();
                  var numberOfRows = inputRows.length;

                  quotation = {
                    "name":name,
                    "customer_id":customer ,
                  }

                  quotationDetails = {
                    "total_cost": sum,
                    "number_of_rows":numberOfRows,
                    "discount_rate":discountRate
                  }
               
               }
                 function getTotalProductCost() {
                 var totalProductCostArray = [];
                  $(".input-row").each(function () {
                 var rowId = $(this).attr("id");
                 var price = $('#'+rowId+'').find(".priceInput").val();
                 var quantity = $('#'+rowId+'').find(".qty").val();
                 var totalProductCost = price * quantity ;
                 totalProductCostArray.push(totalProductCost);
                 });
                 sum = totalProductCostArray.reduce(add);
                 function add(accumulator, a) {
                     return accumulator + a;
                 }
                 $("#total").val(sum);
               }
              //sub function required for submit data
              function sendData() {
               var DATA ={masterInfo:quotation,productList:inputRows,quotationDetails:quotationDetails } ;
               var URL = "https://ecosolveerp.lk/quotation/";
               $.ajax(URL,{
                 method:"post" ,
                 data:DATA ,
                 success:function(data){
                   swal("Poof! Your Quotation has been Created!", {
                     icon: "success",
                   }).then(() => {
                      window.location.href = "http://ecosolveerp.lk/quotation";
                   });
                 },
                  error: function (xhr) {
                   swal("Your Quotation hasn't been Created! Please Contact Administrator");
                    $('#validation-errors').html('');
                    $.each(xhr.responseJSON, function(key,value) {
                      $('#validation-errors').append('<div id="errors-display" class="alert alert-danger">'+value+'</div');
                  }); 
                },
               });
              }
     // submit data

     //validation function 
      function validateData(){
       if(validateName() && validateCustomer() && validateArea() && validateProductCategory() && validateProduct() && validateCct() && validatePrice() && validateQty()){
         return true;
       }else{
         return false;
       }
      }
       //sub function required for validation
       function validateName() {
         var name  = $('#name').val();
         console.log(name)
         if (name) {
          return true;
         }
       }
       function validateCustomer() {
         var customer  = $('#customer').children("option:selected").val();
         console.log(customer)
         if (customer) {
          return true;
         }
       }
       function validateArea() {
        var validateArea = true;
         $(".input-row").each(function () {
        var area = $(this).find(".area").val();
        console.log(area)
           if(!area){
            validateArea = false;
           }
         }); 
         if (validateArea) {
            return true;
         }
       }
       function validateProductCategory() {
        var validateProductCategory = true;
         $(".input-row").each(function () {
        var product_category_id = $(this).find(".productCategory").val();
        console.log(product_category_id)
           if(!product_category_id){
            validateProductCategory = false;
           }
         }); 
         if (validateProductCategory) {
            return true;
         }
       }
       function validateProduct() {
        var validateProduct = true;
         $(".input-row").each(function () {
        var product = $(this).find(".product").children("option:selected").val();
        console.log(product)
           if(!product){
            validateProduct = false;
           }
         }); 
         if (validateProduct) {
            return true;
         }
       }
       function validateCct() {
        var validateCct = true;
         $(".input-row").each(function () {
        var cct = $(this).find(".cct").children("option:selected").val();
           if(!cct){
            validateCct = false;
           }
         }); 
         if (validateCct) {
            return true;
         }
       }
       function validatePrice() {
         var validatePrice = true;
          $(".input-row").each(function () {
         var price = $(this).find(".priceInput").val();
         console.log(price)
            if(!price){
             validatePrice = false;
            }
          }); 
          if (validatePrice) {
             return true;
          }
       }
       function validateQty() {
         var validateQty = true;
          $(".input-row").each(function () {
         var qty = $(this).find(".qty").val();
         console.log(qty)
            if(!qty){
             validateQty = false;
            }
          }); 
          if (validateQty) {
             return true;
          }
       }
       //sub function required for validation
     //validation function
     
  </script>
  @endsection  