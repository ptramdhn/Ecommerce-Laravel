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
            <div class="col-sm">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover bg-light">
                        <thead>
                            <tr>
                                <th>
                                    {{-- <input class="form-check-input" type="checkbox" onchange="checkAll(this)"
                                        name="chk[]"> --}}
                                    No
                                </th>
                                <th>Produk</th>
                                <th>Harga Satuan</th>
                                <th>Kuantitas</th>
                                <th>Total Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php $no = 1; ?>
                        @foreach ($data as $produk)
                            <tbody>
                                <form action="{{ route('prosesco') }}" method="POST">
                                    @csrf
                                    <tr>
                                        <td>
                                            <?= $no++ ?>
                                            <input type="text" name="id[]" value="{{ $produk->id }}" hidden>
                                            <input class="form-check-input" type="checkbox" name="chkbox[]"
                                                value="{{ $produk->id }}" checked hidden>
                                        </td>
                                        <td>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-sm mb-4">
                                                        <img src="{{ $produk->gambar }}" alt="" width="100">
                                                    </div>
                                                    <div class="col-sm">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-sm">
                                                                    <h5>{{ $produk->namaproduk }}</h5>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm">
                                                                    <select class="form-select"
                                                                        aria-label="Default select example"
                                                                        name="variasi[]">
                                                                        <option selected>Variasi</option>
                                                                        <option value="cold">Cold</option>
                                                                        <option value="hot">Hot</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">Rp</span>
                                                <input type="text" class="form-control" name="hargasatuan"
                                                    id="hargasatuan" value="{{ $produk->hargaproduk }}" readonly>
                                            </div>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" id="jumlah" name="jumlah[]"
                                                min="1" value="{{ $produk->jumlah }}" width="100"
                                                oninput="hitungTotal()">
                                        </td>
                                        <td>
                                            <p class="total" id="total">
                                                {{ $produk->hargaproduk * $produk->jumlah }}</p>
                                        </td>
                                        <td>
                                            <a href="/hapuskeranjang/{{ $produk->id }}"
                                                class="btn btn-outline-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    width="32" height="32">
                                                    <path fill="none" d="M0 0h24v24H0z" />
                                                    <path
                                                        d="M17 6h5v2h-2v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8H2V6h5V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3zm1 2H6v12h12V8zm-9 3h2v6H9v-6zm4 0h2v6h-2v-6zM9 4v2h6V4H9z" />
                                                </svg>
                                            </a>
                                            {{-- <form action="/hapus/{{ $data->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger mb-3" type="submit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        width="32" height="32">
                                                        <path fill="none" d="M0 0h24v24H0z" />
                                                        <path
                                                            d="M17 6h5v2h-2v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8H2V6h5V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3zm1 2H6v12h12V8zm-9 3h2v6H9v-6zm4 0h2v6h-2v-6zM9 4v2h6V4H9z" />
                                                    </svg>
                                                </button>
                                            </form> --}}
                                        </td>
                                    </tr>
                            </tbody>
                        @endforeach
                        <tfoot>
                            <tr>
                                <th colspan="6">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <button class="btn btn-success" type="submit">Checkout</button>
                                        </div>
                                    </div>
                                </th>
                                </form>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script async defer>
        function hitungTotal() {
            const hargaElements = document.querySelectorAll("[id='hargasatuan']");
            const kuantitasElements = document.querySelectorAll("[id='jumlah']");
            const totalElements = document.querySelectorAll("[id='total']");

            hargaElements.forEach((element, index) => {
                const kuantitas = kuantitasElements[index];
                const total = totalElements[index];
                const harga = element.value;
                const kValue = kuantitas.value;
                const tValue = harga * kValue;
                total.innerText = tValue;
            })
        }

        function checkAll(ele) {
            var checkboxes = document.getElementsByTagName('input');
            if (ele.checked) {
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].type == 'checkbox') {
                        checkboxes[i].checked = true;
                    }
                }
            } else {
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].type == 'checkbox') {
                        checkboxes[i].checked = false;
                    }
                }
            }

            let totalProduk = document.getElementById("totalProduk");
            totalProduk.innerText = checkboxes.length;
            return totalProduk;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
</body>

</html>
