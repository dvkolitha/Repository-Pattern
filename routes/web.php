<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

/*
|--------------------------------------------------------------------------
dashboard
*/
Route::get('userDashboard', 'DashBoard@user')->name('userDashboard')->middleware('auth');
Route::get('adminDashboard', 'DashBoard@admin')->name('adminDashboard')->middleware('auth','admin');


/*
|--------------------------------------------------------------------------
Routes under userdashboard
*/
  //Quotation'route
   //product
          Route::get('/getProductCategory/{productCategoryId}/{productId}','Products\ProductController@productCategory')->middleware('cors','auth');  
          Route::get('/getProduct/{productCategoryId}','Products\ProductController@getProduct')->middleware('cors','auth');
          Route::get('/products/configure/{productId}','Products\ProductConfigure\ProductConfigureController@index')->name('productConfigure.index')->middleware('auth');
          
   //quotation routes
   Route::get('/quotation/get/price/{data}', 'Quotation\QuotationController@getPrice')->middleware('auth');
   Route::get('/quotation/exportExcel/{id}', 'Quotation\QuotationController@exportExcel')->middleware('auth');
          //customer details (Sub Route under quotation)
          Route::resource('/customer','CustomerController')->middleware('auth');
          //quotation approval routes
          Route::get('/quotation/approval', 'Quotation\QuotationController@approval')->middleware('auth');
          Route::get('/quotation/approval/{id}', 'Quotation\QuotationController@approvalCreate')->middleware('auth');
   Route::resource('/quotation', 'Quotation\QuotationController')->middleware('auth');
   Route::post('/quotation/emailVerification','Quotation\VerificationController@sendEmail')->middleware('auth');
   Route::get('/quotation/emailVerification/confirm/{token}','Quotation\VerificationController@emailConfirm')->middleware('emailVerify');
   Route::get('/quotation/emailVerification/verified/{id}','Quotation\VerificationController@verified');
   Route::post('/quotation/manualVerification/','Quotation\VerificationController@manualVerify')->middleware('auth');
        //route required for ajax
          Route::get('/quotation/getProductImages/{productId}','Quotation\QuotationController@getProductImages');
        //route required for ajax
      
   /*
   |--------------------------------------------------------------------------
  Routes under  admin's dashboard  
   */

   