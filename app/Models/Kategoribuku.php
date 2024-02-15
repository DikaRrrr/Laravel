<?php

namespace App\Models;

use App\Models\Buku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategoribuku extends Model
{
    use HasFactory;

    protected $fillable = [
        'namakategori'
    ];

    protected $table = 'kategoribuku';
    
    public function books()
    {
        return $this->belongsToMany(Buku::class, 'kategoribuku_relasi', 'kategori_id', 'buku_id');
    }


}
