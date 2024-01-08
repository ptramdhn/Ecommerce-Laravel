<?php

namespace App\Http\Controllers;

use App\Models\pesanan;
use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $idUser = $user->id;
        $data = DB::table('pesanans')
            ->join('produks', 'pesanans.produk', '=', 'produks.id')
            ->where('pesanans.user', '=', $idUser)
            ->where('pesanans.status', '=', 'K')
            ->select('*')
            ->get();

        return view('checkout', compact('data', 'user'));
    }

    public function infopesanan($id)
    {
        $data = DB::table('pesanans')
            ->join('produks', 'pesanans.produk', '=', 'produks.id')
            ->where('pesanans.id', '=', $id)
            ->select('*')
            ->get();

        return view('detailPesanan', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $status = $request->status;
        $user = Auth::user();
        $idUser = $user->id;

        $data = new pesanan();
        $data->user = $idUser;
        $data->produk = $id;
        $data->jumlah = $request->input('jumlah');
        $data->status = $status;

        $data->save();

        session()->flash('success', 'Produk dimasukkan keranjang.');

        // Redirect ke halaman yang ingin dituju setelah berhasil menyimpan data
        return redirect('/home');
    }

    public function proses(Request $request)
    {
        $user = Auth::user();
        $idUser = $user->id;
        $idproduk = $request->input('idproduk');
        $data = pesanan::where('user', $idUser)->get();

        foreach ($data as $row) {
            $row->nama = $request->input('name');
            $row->nomorhp = $request->input('nomorhp');
            $row->alamat = $request->input('alamat');
            $row->status = 'CO';
            $jumlah = $row->jumlah;

            $row->save();
        }

        foreach ($idproduk as $key => $produkid) {
            $data = produk::where('id', $produkid)->get();

            foreach ($data as $item) {
                $item->stokproduk = $item->stokproduk - $jumlah;

                $item->save();
            }
        }


        session()->flash('success', 'Terima Kasih Sudah Berbelanja');

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     */
    public function show(pesanan $pesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pesanan $pesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pesanan $pesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pesanan $pesanan)
    {
        //
    }
}
