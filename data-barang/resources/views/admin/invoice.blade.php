<x-app-layout title="Invoice">
    <section class="section">
        <div class="section-header">
            <h1>Invoice</h1>
            {{-- <x-a-link-create href="{{ route('admin.barang.create')}}">Create</x-a-link-create> --}}
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Invoice</th>
                                            <th>Nama Pembeli</th>
                                            <th>Nama Barang</th>
                                            <th>Kategori Barang</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Sub total</th>
                                            <th>Alamat</th>
                                            <th>Kode Pos</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    @foreach ($invoices as $invoice)
                                    <tr>
                                        <td class="align-middle">{{ $loop->iteration}}</td>
                                        <td class="align-middle" style="width: 35%;">{{ $invoice->kode_invoice }}</td>
                                        <td class="align-middle" style="width: 15%;">{{ $invoice->user->name ?? '' }}
                                        </td>
                                        <td class="align-middle">
                                            {{ $invoice->cart->barang->nama_barang ?? '' }}</td>
                                        <td class="align-middle">
                                            {{ $invoice->cart->barang->kategori->nama_kategori ??'' }}</td>
                                        <td class="align-middle">@currency($invoice->cart->barang->harga ??'0')</td>
                                        <td class="align-middle">{{ $invoice->cart->jumlah ?? '' }}</td>
                                        <td class="align-middle">
                                            @currency($invoice->subtotal ?? '0')
                                        </td>
                                        <td class="align-middle">
                                            {{ $invoice->alamat}}
                                        </td>
                                        <td class="align-middle">
                                            {{ $invoice->kode_pos}}
                                        </td>
                                        <td class="align-middle">
                                            <a href="{{ route('cetakInvoice', $invoice->id ?? '')}}" target="_blink"
                                                class="btn btn-primary">Cetak</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('css-library')
    <link rel="stylesheet"
        href="{{ asset('stisla/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('stisla/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    @endpush

    @push('js-library')
    <script src="{{ asset('stisla/node_modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('stisla/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('stisla/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
    @endpush

    @push('js-spesific')
    <script src="{{ asset('stisla/assets/js/page/modules-datatables.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('.delete').submit(function (e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
            });
        });

    </script>

    @if (session('success'))
    <script>
        var success = "{{ session('success')}}";
        Swal.fire({
            title: 'Success',
            text: success,
            icon: 'success',
            showConfirmButton: false,
            timer: 1500
        });

    </script>
    @endif
    @endpush

</x-app-layout>
