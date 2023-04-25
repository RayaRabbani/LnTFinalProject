<x-frond-layout title="invoice">
    <div class="container">
        <div class="py-5 text-center">
            <h2>Form Invoice</h2>
        </div>
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Keranjang kamu</span>
                    {{-- <span class="badge badge-secondary badge-pill">3</span> --}}
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">{{ $cart->barang->nama_barang }}</h6>
                            <small class="text-muted">Nama Barang</small>
                        </div>
                        {{-- <span class="text-muted">$12</span> --}}
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">{{ $cart->barang->kategori->nama_kategori}}</h6>
                            <small class="text-muted">Kategori Barang</small>
                        </div>
                        {{-- <span class="text-muted">$8</span> --}}
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">@currency($cart->barang->harga)</h6>
                            <small class="text-muted">Harga</small>
                        </div>
                        {{-- <span class="text-muted">$5</span> --}}
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">{{ $cart->jumlah}}</h6>
                            <small class="text-muted">Jumlah</small>
                        </div>
                        {{-- <span class="text-muted">$5</span> --}}
                    </li>

                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (Rp)</span>
                        <strong>@currency($cart->barang->harga * $cart->jumlah)</strong>
                    </li>
                </ul>


            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Alamat Kamu</h4>
                <form class="needs-validation" action="{{ route('invoice.store')}}" method="POSt" novalidate>
                    @csrf
                    <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                    <input type="hidden" name="subtotal" value="{{ $cart->barang->harga * $cart->jumlah }}">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Nama Pengguna</label>
                            <input type="text" class="form-control" id="firstName" placeholder=""
                                value="{{ $cart->user->name }}" readonly>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">No HP</label>
                            <input type="text" class="form-control" id="lastName" placeholder=""
                                value="{{ $cart->user->no_hp }}" readonly>
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="email">Email <span class="text-muted">(Optional)</span></label>
                        <input type="email" class="form-control" id="email" value="{{ $cart->user->email }}" readonly>
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Alamat</label>
                        <input type="text" class="form-control" id="address" name="alamat">
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="zip">Kode Pos</label>
                            <input type="number" class="form-control" id="zip" placeholder="" name="kode_pos">
                            <div class="invalid-feedback">
                                Zip code required.
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
            </div>
        </div>
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Simpan Faktur</button>
        </form>
    </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018 Company Name</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>
    </div>
</x-frond-layout>
