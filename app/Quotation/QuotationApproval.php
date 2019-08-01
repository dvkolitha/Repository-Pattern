<?php

namespace App\Quotation;

use Illuminate\Database\Eloquent\Model;

class QuotationApproval extends Model
{
    protected $table = 'quotation_approvals';

    protected $fillable = ['quotation_id','approved_by','advanced_taken'];
}
