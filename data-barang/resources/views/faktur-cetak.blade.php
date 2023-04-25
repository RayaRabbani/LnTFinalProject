<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Faktur Pembelian</title>
</head>

<body>
    <h4 class="text-center mt-5">Faktur Pembelian</h4>
    <div class="container mt-5">
        <div class="row">
            <div class="col-4">No Invoice</div>
            <div class="col-8">: {{$faktur->kode_invoice}} </div>
        </div>
        <div class="row mt-3">
            <div class="col-4">Nama Pembeli</div>
            <div class="col-8">: {{ ucwords($faktur->user->name)}}</div>
        </div>
        <div class="row mt-3">
            <div class="col-4">Nama Barang</div>
            <div class="col-8">: {{ ucwords($faktur->cart->barang->nama_barang)}}</div>
        </div>
        <div class="row mt-3">
            <div class="col-4">Kategori Barang</div>
            <div class="col-8">: {{ ucwords($faktur->cart->barang->kategori->nama_kategori)}}</div>
        </div>
        <div class="row mt-3">
            <div class="col-4">Harga</div>
            <div class="col-8">: @currency($faktur->cart->barang->harga)</div>
        </div>
        <div class="row mt-3">
            <div class="col-4">Jumlah</div>
            <div class="col-8">: {{ $faktur->cart->jumlah}}</div>
        </div>
        <div class="row mt-3">
            <div class="col-4">Total</div>
            <div class="col-8">: @currency($faktur->cart->barang->harga * $faktur->cart->jumlah)</div>
        </div>
        <div class="row mt-3">
            <div class="col-4">Sub Total</div>
            <div class="col-8">: @currency($faktur->subtotal)</div>
        </div>
        <div class="row mt-3">
            <div class="col-4">Alamat</div>
            <div class="col-8">: {{ $faktur->alamat}}</div>
        </div>
        <div class="row mt-3">
            <div class="col-4">Kode Pos</div>
            <div class="col-8">: {{ $faktur->kode_pos}}</div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script>
        window.print();

    </script>
</body>

</html>
