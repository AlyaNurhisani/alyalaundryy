<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $table = 'members';
    protected $fillable = ['nama','alamat','jenis_kelamin','tlp'];
}

