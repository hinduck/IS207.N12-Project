<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use Livewire\Component;

class AdminExportPDF extends Component
{
    public function render(Request $request)
    {
        $products = Product::all();
        if ($request->has('download')) {
            $pdf = PDF::loadView('livewire.admin.admin-export-p-d-f', $products);
            return $pdf->download('product.pdf');
        }
        return view('livewire.admin.admin-export-p-d-f', ['products' => $products])->layout("layouts.base");
    }
}
