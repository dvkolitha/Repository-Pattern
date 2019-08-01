<?php
namespace App\Interfaces\Quotation;

use App\Interfaces\BaseRepositoryInterface;

interface QuVerificationRepositoryInterface extends BaseRepositoryInterface
{
  public function sendEmail($customerId,$quotationId,$sender,$receiver,$attachMent);
  public function emailVerify($attributeOne);
  public function emailVerified($attributeOne);
  public function customVerfiy($quotationId);
}