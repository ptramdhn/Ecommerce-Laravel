<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
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
        <div class="row text-center mt-4">
            <div class="col-sm">
                <h2>Checkout Produk</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm">
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Informasi Pembeli</h5>
                        <form action="{{ route('proses') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Penerima</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $user->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="nomorhp" class="form-label">Nomor Telepon</label>
                                <input type="number" class="form-control" id="nomorhp" name="nomorhp"
                                    value="62{{ $user->nomorhp }}">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat Penerima</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ $user->alamat }}</textarea>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm">
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Produk Dipesan</h5>
                        <table class="table table-hover">
                            <thead>
                                <th colspan="2">Nama Produk</th>
                                <th>Harga Satuan</th>
                                <th>Jumlah</th>
                                <th>Variasi</th>
                                <th>Subtotal Produk</th>
                            </thead>
                            <tbody>
                                @foreach ($data as $row)
                                    <tr>
                                        <td>
                                            <input type="number" name="idproduk[]" value="{{ $row->produk }}" hidden>
                                            <img src="{{ $row->gambar }}" alt="" width="100">
                                        </td>
                                        <td>{{ $row->namaproduk }}</td>
                                        <td>Rp{{ $row->hargaproduk }}</td>
                                        <td>{{ $row->jumlah }}</td>
                                        <td>{{ $row->variasi }}</td>
                                        <td>{{ $row->hargaproduk * $row->jumlah }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <button type="submit" class="btn btn-success mt-2 mb-5">Buat Pesanan</button>
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
