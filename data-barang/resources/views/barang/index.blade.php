<x-app-layout title="Barang">
    <section class="section">
        <div class="section-header">
            <h1>Barang</h1>
            <x-a-link-create href="{{ route('admin.barang.create')}}">Create</x-a-link-create>
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
                                            <th>Gambar</th>
                                            <th>Nama Barang</th>
                                            <th>Kategori Barang</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Deskripsi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    @foreach ($barangs as $barang)
                                    <tr>
                                        <td class="align-middle">{{ $loop->iteration}}</td>
                                        <td><img src="{{ asset('storage/' . $barang->gambar )}}" class="img-fluid m-2"
                                                alt="gambar"></td>
                                        <td class="align-middle" style="width: 35%;">{{ $barang->nama_barang }}</td>
                                        <td class="align-middle" style="width: 10%;">
                                            {{ $barang->kategori->nama_kategori }}</td>
                                        <td class="align-middle" style="width: 10%;">{{ $barang->jumlah }}</td>
                                        <td class="align-middle" style="width: 10%;">{{ $barang->harga }}</td>
                                        <td class="align-middle" style="width: 15%;">
                                            {{ $barang->deskripsi }}
                                        </td>
                                        <td class="align-middle" style="width: 15%;">
                                            <x-a-link-edit href="{{ route('admin.barang.edit', $barang->id) }}">
                                            </x-a-link-edit>
                                            <x-button-delete action="{{ route('admin.barang.destroy', $barang->id)}}">
                                            </x-button-delete>
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
