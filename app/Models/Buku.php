<?php

namespace App\Models;

use App\Models\Kategoribuku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';

    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'tahunterbit'
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Kategoribuku::class, 'kategoribuku_relasi', 'buku_id', 'kategori_id');
    }

}
