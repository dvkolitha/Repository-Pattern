<?php
namespace App\Repositories\Quotation;

use App\Interfaces\Quotation\QuotationRepositoryInterface;
use App\Notifications\QuotationApproval;
use App\Quotation\Quotation;
use App\Quotation\QuotationDetails;
use App\Quotation\QuotationRecord;
use App\Repositories\BaseRepository;
use App\User;
use Illuminate\Support\Facades\DB;
use League\Flysystem\Exception;
use Illuminate\Http\Request;



/**
 * summary
 */
class QuotationRepository extends BaseRepository implements QuotationRepositoryInterface
{
    protected $model;

    public function __construct(QuotationRecord $quotationRecord)
    {
        $this->model = $quotationRecord;
    }
     
    public function createQuotation(array $masterInfo,array $productList,array $quotationDetails){
    	DB::beginTransaction();
    	try {
    		//insert quotation 
    		$masterInfo['created_by'] = auth()->user()->id;
    		$masterInfo['state'] = false;
    	    $quotation = Quotation::create($masterInfo);
           
           
    		//insert quotation records
            $newProductList = $this->createQuotationRecordArray($productList,$quotation->id);
            $length = count($newProductList);
    		if ($length < 51) {
    	     QuotationRecord::insert($newProductList);
    		}else{
              $arrayChunk = array_chunk($newProductList, 50);
              foreach ($arrayChunk as $set) {
                  QuotationRecord::insert($set);
              }
    		}
             //token generate and update qutation with token
             $token = str_random(7).$quotation->id;
             $quotation->update(['token'=>$token]);

    		 $quotationDetails["quotation_id"] = $quotation->id;
    		 QuotationDetails::create($quotationDetails);
    	    DB::commit();	 
    	} catch (\Exception $e) {
            DB::rollBack();  
            throw new Exception("Quotation was not created!!! Please Contact Administrator");  
    	}
        //create notification
        $this->createNotifications($quotation->id);
    } 

    public function createQuotationRecordArray(array $data,$id)
    {
    	$newArray = [];
         
        foreach ($data as $input) {
        	$newData = [];
        	$newData["quotaion_id"] = $id;
            $newData["area"] = $input["area"];
        	$newData["product_category_id"] = $input["product_category_id"] ;
        	$newData["product_id"] = $input["product_id"];
            $newData["cct_id"] = $input["cct_id"];
        	$newData["price"] = $input["price"];
        	$newData["quantity"] = $input["quantity"];
        	$newData["remark"] = null;
        	array_push($newArray,$newData);
        }

        return $newArray;
    }

    public function createNotifications($quotationId)
    {
        $approvers = User::where("isApprover","=",1)->pluck("id")->toArray();

        foreach ($approvers as $approver) {
            User::find($approver)->notify(new QuotationApproval($quotationId));
        }
    }
}