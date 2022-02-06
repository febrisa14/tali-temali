<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
    use HasFactory;

    protected $primaryKey = 'result_id';

    protected $fillable=['user_id','quiz_id','tgl_exp','total_mark','yes_ans','no_ans','tgl_selesai','status','result_json'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function quiz()
    {
    	return $this->belongsTo(Quiz::class);
    }

    protected $dates = ['tgl_exp'];
}
