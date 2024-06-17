<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_bahan';
    public $timestamps = false;
    protected $table = 'bahan_baku';

    protected $fillable = [
        'nama_bahan',
        'stok',
        'harga',
        'satuan'
    ];
}
