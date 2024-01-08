<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\produk;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $role = $user->role;
            $produk = produk::all();

            if ($role == 'admin') {

                $produkTerlaris = DB::table('pesanans')
                    ->select(DB::raw('produk, sum(jumlah) as total_penjualan'))
                    ->groupBy('produk')
                    ->orderBy('total_penjualan', 'desc')
                    ->first();

                $jumlahnya = $produkTerlaris->total_penjualan;

                $idproduknya = $produkTerlaris->produk;

                $produknya = produk::findOrFail($idproduknya);

                // dd($produknya);

                $totalBiaya = DB::table('pesanans')
                    ->join('produks', 'pesanans.produk', '=', 'produks.id')
                    ->where('status', 'CO')
                    ->sum(DB::raw('jumlah * hargaproduk'));

                $totalPembeli = DB::table('pesanans')
                    ->where('status', 'CO')
                    ->distinct('user')
                    ->count('user');



                return view('admin', compact('produk', 'totalBiaya', 'totalPembeli', 'jumlahnya', 'produknya'));
            } else {

                // $produk = Produk::all();

                return view('index', compact('produk'));
            }
        } else {

            // $produk = Produk::all();

            return view('index', compact('produk'));
        }
    }

    public function pesanan()
    {
        $user = Auth::user();
        $idUser = $user->id;
        $data = DB::table('pesanans')
            ->join('produks', 'pesanans.produk', '=', 'produks.id')
            ->where('pesanans.user', '=', $idUser)
            ->where('pesanans.status', '=', 'CO')
            ->select('pesanans.id', 'produks.gambar', 'produks.namaproduk', 'pesanans.created_at')
            ->get();

        return view('pesanan', compact('data'));
    }

    public function test(Request $request)
    {
        $id = $request->input('chkbox');

        return view('test', compact('id'));
    }
}
