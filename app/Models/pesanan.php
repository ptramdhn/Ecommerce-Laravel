<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'nama',
        'nomorhp',
        'alamat',
        'produk',
        'variasi',
        'jumlah',
        'totalharga',
        'status',
    ];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::saved(function ($data) {
    //         // ambil data produk yang terkait dengan pesanan
    //         $produk = $data->produk;

    //         // kurangi stok produk sesuai dengan jumlah pembelian pada pesanan
    //         $produk->stokproduk -= $data->jumlah;
    //         $produk->save();
    //     });
    // }

    // public function produk()
    // {
    //     return $this->belongsTo(produk::class);
    // }
}
