<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Pengurus extends Model
{
    use HasFactory;

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'pengurus_user_id');
    }

    protected $table = 'pengurus';

    protected $primaryKey = 'pengurus_id';

    protected $fillable = [
        'pengurus_user_id','tgl_lahir','jenis_kelamin','alamat','umur'
    ];
}
