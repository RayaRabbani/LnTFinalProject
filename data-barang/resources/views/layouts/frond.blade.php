@php
if (auth()->user()) {
$countKeranjang = App\Models\Cart::where('user_id', auth()->user()->id)->where('status', 'cart')->count();
}
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? ''}}</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Custom CSS -->
    {{-- <link rel="stylesheet" href="style.css"> --}}
    {{-- sweetalert 2 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.min.css"
        integrity="sha256-sWZjHQiY9fvheUAOoxrszw9Wphl3zqfVaz1kZKEvot8=" crossorigin="anonymous">
    <style>
        /* Customize Navbar */
        .navbar {
            height: 80px;
        }

        .navbar-brand {
            font-size: 2rem;
            font-weight: bold;
        }

        .nav-link {
            font-size: 1.2rem;
            margin-left: 20px;
        }

        /* Customize Shopping Cart */
        .fa-shopping-cart {
            font-size: 1.5rem;
        }

        .badge {
            position: absolute;
            top: 5px;
            right: -10px;
            font-size: 0.8rem;
            padding: 0.3rem 0.5rem;
        }

        /* Customize Login and Register Buttons */
        .nav-link:last-child {
            margin-right: 20px;
        }

        .btn {
            font-size: 1.2rem;
            padding: 0.5rem 1rem;
            margin-left: 20px;
        }

        .btn-primary {
            background-color: #8A2BE2;
            border-color: #fff;
        }

        .btn-primary:hover {
            background-color: #6B238E;
            border-color: #6B238E;
            color: #fff;
        }

    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-purple">
        <a class="navbar-brand" href="#">Penjualan</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('produk.index')}}">Produk</a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('getInvoiceByUSer')}}">Faktur</a>
                </li>
                @endauth
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link position-relative" href="{{ route('keranjang')}}">
                        <i class="fas fa-shopping-cart"></i>
                        @auth
                        <span class="badge badge-pill badge-light position-absolute top-0 start-100 translate-middle">
                            {{ $countKeranjang ?? ''}}
                        </span>
                        @endauth
                    </a>
                </li>
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Selamat datang, {{ auth()->user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <form action="{{ route('logout')}}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="fas fa-sign-out-alt mr-2"></i>Keluar</button>
                        </form>

                    </div>
                </li>
                @else
                <li class="nav-item">
                    <a class="btn btn-primary" href="{{ route('login.create')}}">Masuk</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-secondary" href="{{ route('register.create')}}">Daftar</a>
                </li>
                @endauth
            </ul>
        </div>
    </nav>


    {{ $slot }}

    <!-- Menggunakan Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-vqxq3/9/C/y2J/q/8Zf+MjK60wdrDDLM+cyCOxJyNG/pSTsk3q3O9/W2bJ8LlAXi" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    {{-- sweetalert 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.all.min.js"
        integrity="sha256-5WYg3s9NxGKR2MpEBTy0QMT3Gvgxl3yKjbW4l0CfUUY=" crossorigin="anonymous"></script>
    <script src="{{ asset('stisla/node_modules/izitoast/dist/js/iziToast.min.js') }}"></script>

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

    @if (session('error'))
    <script>
        var error = "{{ session('error')}}";
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: error,
            // footer: '<a href="">Why do I have this issue?</a>'
        })

    </script>
    @endif
</body>

</html>
