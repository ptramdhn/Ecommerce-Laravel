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
                        <a class="nav-link" href="/tambah">Tambah Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <h4 class="text-center">PRODUK TERLARIS</h4>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-sm text-center">
                                    <img src="{{ $produknya->gambar }}" alt="" width="100">
                                </div>
                                <div class="col-sm text-center mt-2">
                                    <p class="card-text">{{ $produknya->namaproduk }}</p>
                                    <p class="text-muted">{{ $jumlahnya }} Terjual</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card mb-3">
                    <div class="card-body text-center">
                        <h4>JUMLAH TRANSAKSI</h4>
                        <h3>Rp{{ $totalBiaya }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card mb-3">
                    <div class="card-body text-center">
                        <h4>JUMLAH PEMBELI</h4>
                        <h3>{{ $totalPembeli }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-sm">
                <div class="card mb-5">
                    @if (session('success'))
                        <div class="alert alert-warning">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <th>No</th>
                                    <th>Gambar Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th width="300">Keterangan</th>
                                    <th>Aksi</th>
                                </thead>
                                <?php $no = 1; ?>

                                <tbody>
                                    @foreach ($produk as $data)
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><img src="{{ $data->gambar }}" alt="" width="100"></td>
                                            <td>{{ $data->namaproduk }}</td>
                                            <td>Rp{{ $data->hargaproduk }}</td>
                                            <td>{{ $data->stokproduk }}</td>
                                            <td>{{ $data->keterangan }}</td>
                                            <td>
                                                <button class="btn btn-warning mb-3" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal{{ $data->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        width="16" height="16">
                                                        <path fill="none" d="M0 0h24v24H0z" />
                                                        <path
                                                            d="M9.243 19H21v2H3v-4.243l9.9-9.9 4.242 4.244L9.242 19zm5.07-13.556l2.122-2.122a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414l-2.122 2.121-4.242-4.242z" />
                                                    </svg>
                                                </button>
                                                <form action="/hapus/{{ $data->id }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger mb-3" type="submit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            width="16" height="16">
                                                            <path fill="none" d="M0 0h24v24H0z" />
                                                            <path
                                                                d="M17 6h5v2h-2v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8H2V6h5V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3zm-8 5v6h2v-6H9zm4 0v6h2v-6h-2zM9 4v2h6V4H9z" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            @foreach ($produk as $data)
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Produk</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/ubah/{{ $data->id }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="namaproduk" class="form-label">Nama Produk</label>
                                                        <input type="text" class="form-control" id="namaproduk"
                                                            name="namaproduk" value="{{ $data->namaproduk }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="hargaproduk" class="form-label">Harga
                                                            Produk</label>
                                                        <input type="number" class="form-control" id="hargaproduk"
                                                            name="hargaproduk" value="{{ $data->hargaproduk }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="stokproduk" class="form-label">Stok Produk</label>
                                                        <input type="number" class="form-control" id="stokproduk"
                                                            name="stokproduk" value="{{ $data->stokproduk }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="keterangan" class="form-label">Example
                                                            textarea</label>
                                                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{ $data->keterangan }}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <input class="form-control" type="file" id="gambar"
                                                            name="gambar">
                                                    </div>
                                                    <div class="mb-3">
                                                        <img src="{{ $data->gambar }}" alt="{{ $data->namaproduk }}"
                                                            width="100">
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Ubah
                                                    Data</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
