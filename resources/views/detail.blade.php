<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        body {
            background-color: #C7E8CA;
        }

        .btn-outline-custom {
            color: black;
            border: 2px solid transparent;
        }

        .btn-outline-custom:hover {
            background-color: #00d8b2;
            color: black;
        }
    </style>
</head>

<body>

    @if (auth()->check())
        @include('nav2')
    @else
        @include('nav1')
    @endif

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-sm-10">
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <div class="row justify-content-center mt-3">
                                <div class="col-sm mb-4">
                                    <img src="{{ $data->gambar }}" alt="" width="300">
                                </div>
                                <div class="col-sm">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm">
                                                <h2 class="card-title">{{ $data->namaproduk }}</h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm">
                                                <h6 class="card-subtitle mb-2 text-muted">{{ $total }} Terjual
                                                </h6>
                                                <h4 class="card-title mb-4">Rp{{ $data->hargaproduk }}</h4>
                                                <p class="card-text">{{ $data->keterangan }}</p>
                                            </div>
                                        </div>
                                        <form action="/keranjang/{{ $data->id }}/K" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm mt-4">
                                                    <div class="row g-3 align-items-center">
                                                        <div class="col-auto">
                                                            <label for="inputPassword6"
                                                                class="col-form-label">Kuantitas</label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <input type="number" id="jumlah" name="jumlah"
                                                                class="form-control" min="1" required>
                                                        </div>
                                                        <div class="col-auto">
                                                            <h6 class="card-subtitle mb-2 text-muted">tersisa
                                                                {{ $data->stokproduk }}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-sm mb-3">
                                                    <button type="submit" class="btn btn-outline-success">Masukkan
                                                        Keranjang</button>
                                                </div>
                                                {{-- <div class="col-sm-4">
                                                    <a href="/buynow/{{ $data->id }}/K" class="btn btn-success">Beli
                                                        Sekarang</a>
                                                </div> --}}
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
</body>

</html>
