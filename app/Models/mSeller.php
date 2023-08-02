<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mSeller extends Model
{
    use HasFactory;
    protected $table = 'mSeller';
    protected $fillable = ['sellerId','provinsi','kabupaten','kecamatan','desa','jalan','alamatDetail'];
}
