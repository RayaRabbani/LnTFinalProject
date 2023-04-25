<x-app-layout title="Kategori Barang">
    <section class="section">
        <div class="section-header">
            <h1>Kategori Barang</h1>
            <x-a-link-create href="{{route('admin.kategori.create')}}">Tambah</x-a-link-create>
        </div>

        <div class="section-body">
            <div class="col-12 ">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-md">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Tanggal Buat</th>
                                    <th>Aksi</th>
                                </tr>
                                @foreach ($kategoris as $kategori)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $kategori->nama_kategori }}</td>
                                    <td> {{ date('Y/m/d', strtotime($kategori->created_at)) }} </td>
                                    <td>
                                        <x-a-link-edit href="{{ route('admin.kategori.edit', $kategori->id)}}">
                                        </x-a-link-edit>
                                        <x-button-delete action="{{ route('admin.kategori.destroy', $kategori->id)}}">
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
    </section>
    @push('css-library')

    @endpush

    @push('js-library')

    @endpush

    @push('js-spesific')
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
