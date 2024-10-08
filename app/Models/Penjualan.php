<?php

namespace App\Models;
use App\Models\Pelanggan;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function Pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'PelangganID','id');

    }
    public function User()
    {
        return $this->belongsTo(User::class, 'UserID','id');

    }
    public function Produk()
    {
        return $this->belongsTo(Produk::class, 'ProdukID','id');
    }

    public function DetailPenjualan()
    {
        return $this->hashMany(DetailPenjualan::class, '','id');
    }
}
