<?php
namespace App\Repositories\Quotation;

use App\Customer;
use App\Interfaces\Quotation\QuVerificationRepositoryInterface;
use App\Quotation\Quotation;
use App\Quotation\QuotationApproval;
use App\Quotation\QuotationDetails;
use App\Quotation\QuotationRecord;
use App\Repositories\BaseRepository;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use League\Flysystem\Exception;


/**
 * summary
 */
class QuVerificationRepository extends BaseRepository implements QuVerificationRepositoryInterface
{
    protected $model;

    public function __construct(Quotation $quotation)
    {
        $this->model = $quotation;
    }
     
    public function sendEmail($customerId,$quotationId,$sender,$receiver,$attachMent){
    	$customer  = Customer::find($customerId);
        $customerName  = $customer->name;
        $quotation = Quotation::find($quotationId);
            $data = [ 
             "title"   => "Quotation",
             "content" => "Dear Vaid Customer, ",
             "contentBody" => "Thank you selecting us.Please refer your quotation attached to this email and Please Confirm your Order(Please click Confirm button).",
             "url"=> "https://ecosolveerp.lk/quotation/emailVerification/confirm/".$quotation->token.""

            ];
            Mail::send('dashboard.user.quotation.emailVerfiy.email', $data, function ($message) use ($sender,$receiver,$customerName,$attachMent) {
                $message->from($sender, 'Eco Solve');
                $message->to($receiver, $customerName);
                $message->subject('Quotation');
                $message->attach($attachMent->getRealPath(), ['as' => $attachMent->getClientOriginalName(), 'mime' => $attachMent->getMimeType()
     ]);
            });
    } 

    public function emailVerify($token)
    {
        $quotation = Quotation::where('token',$token)->first();
        
        if ($quotation) {
          $quotation->update([
          'state'=>1,
          'token'=>null,
          ]);  
          return true;
        }
    }

    public function emailVerified($id)
    {
        $quotation = Quotation::where('id',$id)->first();
        if ($quotation) {
            return true;
        }
    }

    public function customVerfiy($quotationId)
    {
       
       DB::beginTransaction();
       $quotation = Quotation::find($quotationId);
       try {
         $quotation->update(['state'=>1,'token'=>null]);
         $quotationApproval = new QuotationApproval(['quotation_id'=>$quotation->id,'approved_by'=>auth()->user()->id,'advanced_taken'=>0]);
         $quotation->approvals()->save($quotationApproval);
         DB::commit();
       } catch (Exception $e) {
         DB::rollback();
         throw new Exception('There is an Error', 404);
       }
    }
}