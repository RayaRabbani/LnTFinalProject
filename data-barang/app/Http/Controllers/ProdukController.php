<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(){
        $barangs = Barang::all();

        // $countKeranjang = Invoice::where('user_id', auth()->user()->id)->count();
     
        return view('frondend.produk', compact('barangs'));
    }
}
