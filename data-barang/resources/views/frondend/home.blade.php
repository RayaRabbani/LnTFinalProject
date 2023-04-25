<x-frond-layout title="home">
    <div class="jumbotron">
        <h1 class="display-4">Selamat Datang, Di Toko Pak Raja</h1>
        <p class="lead">Kami menyediakan berbagai barang yang berkualitas</p>
        <hr class="my-4">
        <p>Semoga barang yang anda cari ada disini. </p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Lebih banyak</a>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($barangs as $barang)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $barang->gambar)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $barang->nama_barang}}</h5>
                        <h5 class="card-title">@currency($barang->harga)</h5>
                        <p class="card-text">{{ $barang->deskripsi}}</p>
                        <p class="card-text">Stok : {{ $barang->jumlah}}</p>
                        <div class="text-right">
                            @auth
                            <form action="{{ route('add.cart')}}" method="post">
                                @csrf
                                <input type="hidden" name="barang_id" value="{{ $barang->id }}">
                                <div class="form-group row">
                                    <div class="col-sm-4"></div>
                                    <label for="jumlah" class="col-sm-4 col-form-label">jumlah : </label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="jumlah" id="jumlah" value="1"
                                            max="{{$barang->jumlah}}">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-shopping-cart"></i>
                                    Tambah</button>
                            </form>
                            @else
                            <a href="#" class="btn btn-primary" style="pointer-events: none;
                        opacity: 0.5;"> <i class="fas fa-shopping-cart"></i> Tambah</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</x-frond-layout>
