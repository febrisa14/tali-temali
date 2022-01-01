<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $table = 'materi';

    protected $primaryKey = 'materi_id';

    protected $fillable = [
        'judul','deskripsi','kategori','slug','url_video','cover_photo',
    ];

    // public function Kategori()
    // {
    //     return $this->belongsTo(Kategori::class, 'kategori_id', 'materi_kategori_id');
    // }
}
