<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Barang;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add_cart(Request $request){

        $existingInvoice = Cart::where('user_id', auth()->user()->id)->where('barang_id', $request->barang_id)->where('status', 'cart')->first();

    if ($existingInvoice) {
        return redirect()->back()->with('error', 'Gagal memasukan barang, coba cek di keranjang');
       
    }
         
        // Jika data valid, tambahkan item ke keranjang
        $barang = Barang::find($request->barang_id);

        // kurangi stok
        $barang->jumlah -= $request->jumlah;
        $barang->save();

        $invoice = new Cart([
            'barang_id' => $barang->id,
            'jumlah' => $request->jumlah,
        ]);
        $invoice->user()->associate(auth()->user());
        $invoice->save();
        
        // Alihkan pengguna kembali ke halaman sebelumnya
        return redirect()->back()->with('success', 'Item berhasil ditambahkan ke keranjang.');
    }

    public function keranjang(){

          $keranjangs = Cart::where('user_id', auth()->user()->id)->where('status', 'cart')->get();

         return view('frondend.keranjang', compact('keranjangs'));
    }

}
