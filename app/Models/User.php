<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Anggota;
use App\Models\Pengurus;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function Anggota()
    {
        return $this->hasOne(Anggota::class, 'anggota_user_id', 'user_id');
    }

    public function Pengurus()
    {
        return $this->hasOne(Pengurus::class, 'pengurus_user_id', 'user_id');
    }

    protected $table = 'users';

    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'no_telp',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
