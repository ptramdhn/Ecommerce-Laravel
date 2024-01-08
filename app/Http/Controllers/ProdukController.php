<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $data = produk::findOrFail($id);
        $totalProducts = DB::table('pesanans')
            ->select('produk', DB::raw('SUM(jumlah) as total'))
            ->where('produk', '=', $id)
            ->groupBy('produk')
            ->get();

        foreach ($totalProducts as $key) {
            $total = $key->total;
        }


        return view('detail', compact('data', 'total'));
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
        $request->validate([
            'gambar' => 'required',
            'namaproduk' => 'required',
            'hargaproduk' => 'required',
            'stokproduk' => 'required',
            'keterangan' => 'required'
            // dan seterusnya
        ]);

        $path = $request->file('gambar')->store('public/images');
        $url = Storage::url($path);

        $data = new produk();
        $data->gambar = $url;
        $data->namaproduk = $request->input('namaproduk');
        $data->hargaproduk = $request->input('hargaproduk');
        $data->stokproduk = $request->input('stokproduk');
        $data->keterangan = $request->input('keterangan');

        $data->save();

        session()->flash('success', 'Data berhasil disimpan.');

        // Redirect ke halaman yang ingin dituju setelah berhasil menyimpan data
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     */
    public function show(produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(produk $produk, $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, produk $produk, $id)
    {
        $data = produk::findOrFail($id);

        // Jika ada gambar yang diupload
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('public/images');
            $url = Storage::url($path);
            $data->gambar = $url;
        } else {
            // Jika tidak ada gambar yang diupload, tetap gunakan gambar lama
            $data->gambar = $data->gambar;
        }

        $data->namaproduk = $request->input('namaproduk');
        $data->hargaproduk = $request->input('hargaproduk');
        $data->stokproduk = $request->input('stokproduk');
        $data->keterangan = $request->input('keterangan');

        $data->save();

        session()->flash('success', 'Data berhasil diubah.');

        // Redirect ke halaman yang ingin dituju setelah berhasil menyimpan data
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = produk::findOrFail($id); // mencari data berdasarkan id

        $data->delete(); // menghapus data

        session()->flash('success', 'Data berhasil dihapus.');

        return redirect('/home'); // mengembalikan ke halaman awal
    }
}
