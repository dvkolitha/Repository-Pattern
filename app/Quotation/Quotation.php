<?php

namespace App\Quotation;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $fillable = ['name','state','customer_id','created_by','token'];

    public function approvals()
    {
    	return $this->hasOne('App\Quotation\QuotationApproval');
    }
}
