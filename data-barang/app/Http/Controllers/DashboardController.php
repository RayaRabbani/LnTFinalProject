<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if (!auth()->user()->is_admin) {
            return redirect('/');
        }

        $countBarang = Barang::all()->count();
        $countUser = User::where('is_admin', 0)->count();

        return view('dashboard', compact('countBarang', 'countUser'));
    }
}
