<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Detail extends Model
{
    use HasFactory;

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'detail_user_id');
    }

    protected $table = 'detail_akun';

    protected $fillable = [
        'detail_user_id','tgl_lahir','jenis_kelamin','alamat','umur'
    ];
}
