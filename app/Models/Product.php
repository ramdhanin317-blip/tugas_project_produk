<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'nama_produk',
        'harga',
        'stok',
        'gambar'
    ];

    // Relasi balik: Produk dimiliki oleh suatu kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}