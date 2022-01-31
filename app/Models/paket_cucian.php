<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paket_cucian extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $table = 'paket_cucians';
    protected $fillable = ['id_outlet','nama_paket', 'jenis', 'harga'];
    
}
