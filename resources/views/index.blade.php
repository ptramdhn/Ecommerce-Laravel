<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Toko Lara</title>
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
        <div class="row">
            <div class="col-sm text-center mt-5 mb-5">
                <h1>Daftar Produk</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            @if (session('success'))
                <div class="alert alert-warning">
                    {{ session('success') }}
                </div>
            @endif
            @foreach ($produk as $data)
                <div class="col-sm-3">

                    <a href="/detail/{{ $data->id }}" class="btn btn-outline-custom">
                        <div class="card mb-4">
                            <img src="{{ $data->gambar }}" class="card-img-top" alt="{{ $data->namaproduk }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $data->namaproduk }}</h5>
                                <p class="card-text">Rp{{ $data->hargaproduk }}</p>
                            </div>
                        </div>
                    </a>

                </div>
            @endforeach
            {{-- <div class="col-sm-3">
                <a href="/detail" class="btn btn-outline-custom">
                    <div class="card mb-4">
                        <img src="images/capuccino.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Good Day Cappuccino</h5>
                            <p class="card-text">Rp5.000</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-3">
                <a href="/detail" class="btn btn-outline-custom">
                    <div class="card mb-4">
                        <img src="images/nutrisari.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Nutri Sari Jeruk Peras</h5>
                            <p class="card-text">Rp4.000</p>
                        </div>
                    </div>
                </a>
            </div> --}}
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
