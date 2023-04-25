<?php

namespace App\Http\Controllers\Frondend;

use App\Models\Barang;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $barangs = Barang::all();

        // $countKeranjang = Invoice::where('user_id', auth()->user()->id)->count();
     
        return view('frondend.home', compact('barangs'));
    }
}
