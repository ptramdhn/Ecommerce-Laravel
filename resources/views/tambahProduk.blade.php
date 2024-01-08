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

    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
        <div class="container">
            <a class="navbar-brand" href="#">Toko Lara</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <form method="POST" action="{{ route('input') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-sm">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Gambar Produk</label>
                        <input class="form-control" type="file" id="gambar" name="gambar">
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="namaproduk" name="namaproduk">
                        <label for="floatingInput">Nama Produk</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="hargaproduk" name="hargaproduk" min="1">
                        <label for="floatingInput">Harga Produk</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="stokproduk" name="stokproduk" min="1">
                        <label for="floatingInput">Stok Produk</label>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Keterangan Produk</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                    </div>
                </div>
        </div>
        <div class="row">
            <button type="submit" name="submit" class="btn btn-success">Tambah Produk</button>
        </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
</body>

</html>
