<x-frond-layout title="Keranjang">
    <div class="container">
        <div class="py-5 text-center">
            <h2>Daftar Keranjang</h2>
        </div>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $total = "";
                @endphp
                @foreach ($keranjangs as $keranjang)
                <tr>
                    <th scope="row">{{ $loop->iteration}}</th>
                    <td>{{ $keranjang->barang->nama_barang}}</td>
                    <td>@currency($keranjang->barang->harga)</td>
                    <td>{{ $keranjang->jumlah}}</td>
                    <td>
                        @php
                        $harga = $keranjang->barang->harga;
                        $jumlah = $keranjang->jumlah;
                        $total = $harga * $jumlah;
                        @endphp
                        @currency($total)
                    </td>
                    <td>
                        <a href="{{ route('keranjang.proses', $keranjang->id)}}" class="btn btn-primary">Proses</a>
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
    </div>
</x-frond-layout>
