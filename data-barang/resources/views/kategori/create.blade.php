<x-app-layout title="Tambah Kategori">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Kategori</h1>
        </div>

        <div class="section-body">
            <div class="col-12 col-md-7 col-lg-7">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.kategori.store')}}" method="post" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 col-md-8 col-sm-12">
                                    <div class="row">
                                        <!-- input role name -->
                                        <div class="col-12">
                                            <div class="form-group mb-3">
                                                <label class="mb-1">Nama Kategori<span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control @error('nama_kategori') is-invalid @enderror"
                                                    type="text" name="nama_kategori" value="{{ old('nama_kategori')}}">
                                                @error('nama_kategori')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
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
</x-app-layout>
