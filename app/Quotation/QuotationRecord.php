<?php

namespace App\Quotation;

use Illuminate\Database\Eloquent\Model;

class QuotationRecord extends Model
{
   protected $fillable = ['quotaion_id','area','product_category_id','product_id','cct_id','price','quantity'];
}
