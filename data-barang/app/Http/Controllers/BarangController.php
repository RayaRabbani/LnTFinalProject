<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = Barang::with('kategori')->get();
        return view('barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('barang.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_barang' => ['required'],
            'kategori_id' => ['required'],
            'gambar'      => 'required|image|mimes:jpg,jpeg,png|max:4096',
            'harga'       => ['required'],
            'jumlah'      => ['required'],
        ]);

        $data['deskripsi'] = $request->deskripsi;
        $data['gambar']    = $request->file('gambar')->store('images/barang');

        Barang::create($data);

        return redirect()->route('admin.barang.index')->with('success', 'Berhasil menambhakan data barang!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        $kategoris = Kategori::all();
        return view('barang.edit', compact('kategoris', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
 
        $data = $request->validate([
            'nama_barang' => ['required'],
            'kategori_id' => ['required'],
            'harga'       => ['required'],
            'jumlah'      => ['required'],
        ]);


        $data['deskripsi'] = $request->deskripsi;

        if ($request->file('gambar')) {
            $data['gambar']    = $request->file('gambar')->store('images/barang');
        }

        $barang->update($data);

        return redirect()->route('admin.barang.index')->with('success', 'Berhasil mengubah data barang!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {

         // hapus file gambar terkait dengan data module
         if (Storage::disk('public')->exists($barang->gambar)) {
            Storage::disk('public')->delete($barang->gambar);
        }

        $barang->delete();

        return redirect()->route('admin.barang.index')->with('success', 'Berhasil menghapus data barang!');

    }
}
