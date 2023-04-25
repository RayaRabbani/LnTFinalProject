<x-guest-layout title="Daftar">
    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
        <div class="card card-primary">
            <div class="card-header">
                <h4>Daftar</h4>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('register.store') }}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="name">Nama</label>
                            <input id="name" type="text" class="form-control" name="name" autofocus>
                        </div>
                        <div class="form-group col-6">
                            <label for="no_hp">No Hp</label>
                            <input id="no_hp" type="text" class="form-control" name="no_hp">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email">
                        <div class="invalid-feedback">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="password" class="d-block">Password</label>
                            <input id="password" type="password"
                                class="form-control  @error('password') is-invalid @enderror pwstrength"
                                data-indicator="pwindicator" name="password">
                            @error('password')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                            <div id="pwindicator" class="pwindicator">
                                <div class="bar"></div>
                                <div class="label"></div>
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label for="password2" class="d-block">Password Konfirmasi</label>
                            <input id="password2" type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                name="password_confirmation">
                            @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Daftar
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="mt-5 text-muted text-center">
            sudah punya akun? <a href="{{ route('login.create') }}">Masuk</a>
        </div>
</x-guest-layout>
