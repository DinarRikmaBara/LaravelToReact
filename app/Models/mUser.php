<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mUser extends Model
{
    use HasFactory;
    protected $table = 'muser';
    protected $fillable = ['userId','provinsi','kabupaten','kecamatan','desa','dusun','alamatDetail'];
}
