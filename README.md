[Laravel 11 Invoice Generation: Step-by-Step Guide](https://www.youtube.com/watch?v=79lIfO0EnNY)
[Laravel Invoices](https://github.com/LaravelDaily/laravel-invoices)


- `composer require laraveldaily/laravel-invoices:^4.0`
- `php artisan vendor:publish --tag=invoices.views --force`
- `php artisan make:controller InvoiceController`




- app\http\Controllers\InvoiceController (dari GitHub):

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class InvoiceController extends Controller
{
    public function generateInvoice() {
        $customer = new Buyer([
            'name'          => 'John Doe',
            'custom_fields' => [
                'email' => 'test@example.com',
            ],
        ]);
        
        // $item = InvoiceItem::make('Service 1')->pricePerUnit(2);
        
        // $invoice = Invoice::make()
        //     ->buyer($customer)
        //     ->discountByPercent(10)
        //     ->taxRate(15)
        //     ->shipping(1.99)
        //     ->addItem($item);

        $item = [
            InvoiceItem::make('Service 1')->pricePerUnit(2),
            InvoiceItem::make('Product 1')->pricePerUnit(2),
            InvoiceItem::make('Product 2')->pricePerUnit(2),
        ];

        $invoice = Invoice::make()
            ->buyer($customer)
            ->discountByPercent(10)
            ->taxRate(15)
            ->shipping(1.99)
            ->addItems($item);
        
        return $invoice->stream();
    }
}






- routes\web.php:
// ...

use App\Http\Controllers\InvoiceController;

// ...

Route::get('generateInvoice', [InvoiceController::class, 'generateInvoice']);





- `php artisan serve`

- `127.0.0.1:8000/generateInvoice`
    - Maka akan langsung diunduh file PDF-nya.

- Jika ada error `Class "NumberFormatter" not found`, maka enable ekstensi intl di php.ini