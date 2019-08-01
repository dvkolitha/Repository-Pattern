<?php

namespace App\Quotation;

use Illuminate\Database\Eloquent\Model;

class QuotationDetails extends Model
{
    protected $fillable = ['quotation_id','total_cost','discount_rate'];
}
