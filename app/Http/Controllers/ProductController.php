<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

use Barryvdh\DomPDF\Facade\Pdf;

class ProductController extends Controller
{
    public function index() {
        return view('dompdf.index');
    }

    public function viewInvoice(int $productId) {
        $product = Product::findOrFail($productId);

        return view('dompdf.invoice', compact('product'));
    }

    public function generateInvoice(int $productId) {
        $product = Product::findOrFail($productId);
        
        $data = ['product' => $product];
        $pdf = Pdf::loadView('dompdf.invoice', $data);
        $todayDate = Carbon::now()->format('d-m-Y');

        return $pdf->download('invoice-' . $product->id . '-' . $todayDate . '.pdf');
    }
}