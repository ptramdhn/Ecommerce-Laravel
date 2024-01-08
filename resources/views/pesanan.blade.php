<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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

    @include('nav2')

    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center mt-5 mb-4">Pesanan</h3>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($data as $item)
                <div class="col-sm-3">
                    <a href="/info/{{ $item->id }}" class="btn btn-outline-custom">
                        <div class="card mb-4">
                            <img src="{{ $item->gambar }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->namaproduk }}</h5>
                                <p class="text-muted">Dipesan pada {{ $item->created_at }}</p>
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
                            <p class="text-muted">Dipesan pada <?= date('d/m/Y') ?></p>
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
