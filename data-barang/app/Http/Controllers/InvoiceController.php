<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Barang;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InvoiceController extends Controller
{
   
    public function proses_keranjang($id = null)
    {

        $cart = Cart::where('id', $id)->first();

        // dd($cart);
        return view('frondend.invoice', compact('cart'));
    }

    public function Invoice(Request $request)
    {

        $data = $request->validate([
            'alamat' => 'required',
            'kode_pos' => 'required'
        ]);

        $data['kode_invoice'] = 'INV-' . date('YmdHis') . '-' . str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
        $data['user_id'] = auth()->user()->id;
        $data['cart_id'] = $request->cart_id;
        $data['subtotal'] = $request->subtotal;

        Invoice::create($data);

        $cart = Cart::find($request->cart_id);
        $cart->update([
            'status' => 'inv'
        ]);

        return redirect()->route('keranjang')->with('success', 'berhasil menambahkan data invoice');
    }

    public function getInvoiceByUSer(){

        $invoices = Invoice::where('user_id', auth()->user()->id)->get();

        return view('frondend.faktur', compact('invoices'));
    }

    public function cetakInvoice($id = null){

        $faktur = Invoice::findOrFail($id);

        return view('faktur-cetak', compact('faktur'));

    }
}
