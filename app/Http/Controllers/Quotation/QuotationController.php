<?php

namespace App\Http\Controllers\Quotation;

use App\Customer;
use App\Exports\QuotationExport;
use App\Http\Controllers\Controller;
use App\Interfaces\Quotation\QuotationRepositoryInterface;
use App\Notifications\QuotationApproval;
use App\ProductCategory\ProductCategory;
use App\Product\Product;
use App\Product\ProductConfigure\Photos\ProductPhoto;
use App\Quotation\Quotation;
use App\Quotation\QuotationDetails;
use App\Quotation\QuotationRecord;
use App\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class QuotationController extends Controller
{
    private $quotationRepo;

    public function __construct(QuotationRepositoryInterface $quotationRepository)
    {
        $this->quotationRepo = $quotationRepository;
    }

    public function index()
    {
        $quotations = Quotation::all();
        return view('dashboard.user.quotation.index',compact('quotations'));
    }


    public function create()
    {   
        $productCategory = ProductCategory::pluck('name','id');
        $customers = Customer::pluck("name","id");
        return view('dashboard.user.quotation.create',compact('productCategory','customers'));
    }

    public function store(Request $request)
    {
        $this->quotationRepo->createQuotation($request->masterInfo,$request->productList,$request->quotationDetails);
        return response()->json(["success"=>"Quotation was created"]);

    }



    public function getPrice( $request)
    {
        $value = json_decode($request);
        $is_water_proofed = intval($value->watter_proofedId);
  
      $product = Product::where("product_category_id",$value->product_category_id)->where("watt_id",$value->watt_id)->where("voltage_id",$value->voltage_id)->where("diffuser_id",$value->diffuser_type_id)->where("fitting_color_id",$value->fitting_color_id)->where("is_water_proofed","=",$is_water_proofed)->first();

      if ($product == null) {
          return   response()->json(["errors"=>"no data found"],401);
      }
      return   response()->json($product);     
    }

    public function exportExcel($id)
    {
            return Excel::download(new QuotationExport($id), ''.$id.'.xlsx');
    }

    public function approval()
    {
        $quotations = Quotation::all();
        return view('dashboard.user.quotation.approval.index',compact('quotations'));
    }

    public function approvalCreate($id)
    {
        $quotation = Quotation::find($id);
        $quotationDetails = QuotationDetails::where('quotation_id','=',$quotation->id)->first();
        $quotationRecords = QuotationRecord::where('quotaion_id','=',$quotation->id)->get();
        $productCategory = ProductCategory::pluck('name','id');
        $customers = Customer::pluck("name","id");
        return view('dashboard.user.quotation.approval.create',compact('quotation','quotationDetails','quotationRecords','productCategory','customers'));
    }

    function getProductImages($productId)
    {
        $mainImage = ProductPhoto::where('product_id','=',$productId)
                                 ->where('is_main_image','=',1)
                                 ->first();
        $galleryImage = ProductPhoto::where('product_id','=',$productId)
                                    ->where('is_gallery_image','=',1)
                                    ->get();
        $product = Product::find($productId);
        $images = array($product->name,$mainImage, $galleryImage);
        
        return   response()->json($images);                                               
    }
}
