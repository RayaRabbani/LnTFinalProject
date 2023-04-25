<x-frond-layout title="faktur">
    <div class="container">
        <div class="py-5 text-center">
            <h2>Faktur Pembelian</h2>
        </div>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">No Invoice</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Kategori Barang</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total</th>
                    <th scope="col">Sub Total</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Kode Pos</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $total = "";
                @endphp
                @foreach ($invoices as $invoice)
                <tr>
                    <th scope="row">{{ $loop->iteration}}</th>
                    <td>{{ $invoice->kode_invoice}}</td>
                    <td>{{ $invoice->cart->barang->nama_barang}}</td>
                    <td>{{ $invoice->cart->barang->kategori->nama_kategori}}</td>
                    <td>@currency($invoice->cart->barang->harga)</td>
                    <td>{{ $invoice->cart->jumlah}}</td>
                    <td>@currency($invoice->cart->barang->harga * $invoice->cart->jumlah )</td>
                    <td>@currency($invoice->subtotal)</td>
                    <td>{{ $invoice->alamat}}</td>
                    <td>{{ $invoice->kode_pos}}</td>
                    <td>
                        <a href="{{ route('cetakInvoice', $invoice->id)}}" class="btn btn-primary"
                            target="_blink">Cetak</a>
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
    </div>
</x-frond-layout>
