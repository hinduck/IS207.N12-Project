<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExportPDF extends Controller
{
    public function exportProduct(Request $request) 
    {
        $products = DB::table('products')->get();
        view()->share('products', $products);
        if ($request->has('download')) {
            $pdf = PDF::loadView('livewire.export.exportProductPDF', $products);
            return $pdf->download('product.pdf');
        }
        return view('livewire.export.exportProductPDF', $products);
    }
}
