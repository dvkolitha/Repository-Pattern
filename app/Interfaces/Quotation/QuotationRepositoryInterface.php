<?php
namespace App\Interfaces\Quotation;

use App\Interfaces\BaseRepositoryInterface;

interface QuotationRepositoryInterface extends BaseRepositoryInterface
{
  public function createQuotation(array $attributeOne,array $attributeTwo,array $attributeThree);
  public function createQuotationRecordArray(array $attributeOne,$id);
  public function createNotifications($quotationId);
}