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
