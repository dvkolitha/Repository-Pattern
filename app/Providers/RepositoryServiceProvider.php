<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bind the interface to an implementation repository class
     */
    public function register()
    {

        $this->app->bind(
            'App\Interfaces\ProductCategory\ProductCategoryAttribute\WattRepositoryInterface','App\Repositories\ProductCategory\ProductCategoryAttribute\WattRepository');
        $this->app->bind( 'App\Interfaces\ProductCategory\ProductCategoryAttribute\VoltageRepositoryInterface','App\Repositories\ProductCategory\ProductCategoryAttribute\VoltageRepository');
        $this->app->bind( 'App\Interfaces\ProductCategory\ProductCategoryAttribute\CCTRepositoryInterface','App\Repositories\ProductCategory\ProductCategoryAttribute\CCTRepository');
        $this->app->bind( 'App\Interfaces\Quotation\QuotationRepositoryInterface','App\Repositories\Quotation\QuotationRepository');
        $this->app->bind( 'App\Interfaces\Quotation\QuVerificationRepositoryInterface','App\Repositories\Quotation\QuVerificationRepository');
        $this->app->bind('App\Interfaces\Product\ProductConfigure\ProductConfigureRepositoryInterface','App\Repositories\Product\ProductConfigure\ProductConfigureRepository');

    }
}