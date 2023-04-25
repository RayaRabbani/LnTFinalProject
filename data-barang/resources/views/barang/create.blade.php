<x-app-layout title="Tambah Barang">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Barang</h1>
        </div>

        <div class="section-body">
            <div class="col-12 col-md-7 col-lg-7">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.barang.store')}}" method="post" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 col-md-8 col-sm-12">
                                    <div class="row">
                                        <!-- input kategori barang -->
                                        <div class="col-12">
                                            <div class="form-group mb-3">
                                                <label class="mb-1">Kategori Barang<span
                                                        class="text-danger">*</span></label>
                                                <select
                                                    class="form-control @error('kategori_id') is-invalid @enderror selectric"
                                                    name="kategori_id">
                                                    <option value="">-- pilih kategori --</option>
                                                    @foreach ($kategoris as $kategori)
                                                    <option value="{{$kategori->id}}">
                                                        {{ $kategori->nama_kategori }}</option>
                                                    @endforeach
                                                </select>
                                                @error('kategori_id')
                                                <div class="invalid-feedback">
                                                    {{ $message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- input nama barang -->
                                        <div class="col-12">
                                            <div class="form-group mb-3">
                                                <label class="mb-1">Nama Barang<span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('nama_barang') is-invalid @enderror"
                                                    name="nama_barang" value="{{ old('nama_barang') }}">
                                                @error('nama_barang')
                                                <div class="invalid-feedback">
                                                    {{ $message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Gambar<span class="text-danger">*</span></label>
                                                <img class="preview img-fluid mb-2 col-sm-5">

                                                <div class="custom-file">
                                                    <input type="file"
                                                        class="custom-file-input @error('gambar') is-invalid @enderror"
                                                        name="gambar" id="gambar" onchange="Preview()">
                                                    <label class="custom-file-label" for="gambar">Choose
                                                        file</label>
                                                </div>
                                                @error('gambar')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">Harga</label>
                                                <input type="number" name="harga" class="form-control" min="1">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">Jumlah</label>
                                                <input type="number" name="jumlah" class="form-control" min="1">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Deskripsi<span class="text-danger">*</span></label>
                                                <textarea class="form-control" name="deskripsi" id="" cols="30"
                                                    rows="10"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <x-button>Submit</x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @push('css-library')
    <link rel="stylesheet" href="{{ asset('stisla/node_modules/selectric/public/selectric.css') }}">
    @endpush

    @push('js-library')
    <script src="{{ asset('stisla/node_modules/selectric/public/jquery.selectric.min.js') }}"></script>
    @endpush

    @push('js-spesific')
    {{-- <script src="{{ asset('stisla/assets/js/page/forms-advanced-forms.js') }}"></script> --}}




    <script>
        function Preview() {
            const image = document.querySelector('#gambar');
            const imgPreview = document.querySelector('.preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);


            oFReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

    </script>

    @endpush

</x-app-layout>
