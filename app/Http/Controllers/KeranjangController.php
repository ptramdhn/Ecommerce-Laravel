<?php

namespace App\Http\Controllers;

use App\Models\pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KeranjangController extends Controller
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

        $total = 0;
        foreach ($data as $row) {
            $total += $row->hargaproduk * $row->jumlah;
        }

        return view('keranjang', compact('data', 'total'));
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
    public function store(Request $request)
    {
        $checkbox = $request->input('chkbox');
        $variasi = $request->input('variasi');
        $kuantitas = $request->input('jumlah');

        foreach ($checkbox as $key => $produkid) {
            $data = pesanan::where('produk', $produkid)->get();

            foreach ($data as $item) {
                $item->variasi = $variasi[$key];
                $item->jumlah = $kuantitas[$key];
                $item->save();
            }
        }

        return redirect('checkout');
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
    public function destroy($id)
    {
        $user = Auth::user();
        $idUser = $user->id;

        DB::table('pesanans')
            ->where('user', '=', $idUser)
            ->where('status', '=', 'K')
            ->where('produk', '=', $id)
            ->delete();

        return redirect('keranjang');
    }
}
