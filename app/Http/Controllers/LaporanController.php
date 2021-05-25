<?php 
namespace App\Http\Controllers; 
use Illuminate\Http\Request; 
use App\Models\Product; 
use PDF; 

class LaporanController extends Controller 
{ 

        public function product(Request $request) { 
        $data = product::get(); 
        $tampil['data'] = $data; 

        $pdf = PDF::loadView("product.pdf", $tampil); 
        return $pdf->download('Laporan_Masuk.pdf'); 
        } 

} 