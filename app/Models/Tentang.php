<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tentang extends Model
{
    use HasFactory;
    protected $fillable = ['image','judul','deskripsi'];
    protected $visible = ['image', 'judul', 'deskripsi'];

}
