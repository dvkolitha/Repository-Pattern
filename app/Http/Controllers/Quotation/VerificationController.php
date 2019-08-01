<?php

namespace App\Http\Controllers\Quotation;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Interfaces\Quotation\QuVerificationRepositoryInterface;
use App\Quotation\Quotation;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
	protected $verifyRepo;

	public function __construct(QuVerificationRepositoryInterface $verfyRepository)
	{
		$this->verifyRepo = $verfyRepository;
	}

    public function sendEmail(Request $request)
    {
    	$request->validate([
         'customerId'=>'required',
         'quotationId'=>'required',
         'sender'=>'required',
         'receiver'=>'required',
         'pdf'=>'required|file'
        ]);
    	$this->verifyRepo->sendEmail($request->customerId,$request->quotationId,$request->sender,$request->receiver,$request->file('pdf'));
        return redirect('/quotation');
    }
    public function emailConfirm($token)
    {
        if ($this->verifyRepo->emailVerify($token)) {
            return redirect('/quotation/emailVerification/verified/'.$token.'');
        }
    }
    public function verified($id)
    {
       return view('dashboard.user.quotation.emailVerfiy.confirmed');
    }
    public function manualVerify(Request $request)
    {
        $this->verifyRepo->customVerfiy($request->quotationId);
        return redirect('/quotation');
    }
}
