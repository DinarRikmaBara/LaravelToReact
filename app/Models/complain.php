<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class complain extends Model
{
    use HasFactory;
    protected $table = 'complain';
    protected $fillable = ['ulasan','ranting'];
}
