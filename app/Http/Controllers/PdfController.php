<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function pdf(){
        $products = Product::all();
        $data = [
            'products' => $products
        ];
        $pdf = \PDF::loadView('generatepdf',$data);
        
        return $pdf->stream('reporte_productos.pdf');
    }
}
