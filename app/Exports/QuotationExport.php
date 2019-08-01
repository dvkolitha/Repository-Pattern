<?php

namespace App\Exports;

use App\Customer;
use App\Quotation\Quotation;
use App\Quotation\QuotationDetails;
use App\Quotation\QuotationRecord;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;


class QuotationExport implements FromView
{
	protected $quotation;
	protected $quotationDetails;
	protected $quotationRecords;
	protected $customer;

	public function __construct($id)
	{
		$this->quotation = Quotation::find($id);
		$this->customer = Customer::find($this->quotation->customer_id);
		$this->quotationDetails = QuotationDetails::where('quotation_id','=',$this->quotation->id)->first();
		$this->quotationRecords = QuotationRecord::where('quotaion_id','=',$this->quotation->id)->get();
	}
    /**
    * @return \Illuminate\Contracts\View\View
    */
    public function view(): View
        {
            return view('excel.quotation', [
                'quotation' => $this->quotation,
                'customer' => $this->customer,
                'quotationDetails' => $this->quotationDetails,
                'quotationRecords' => $this->quotationRecords,
            ]);
        }
}
