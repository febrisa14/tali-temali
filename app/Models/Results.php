<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
    use HasFactory;

    protected $fillable=['user_id','quiz_id','total_mark','yes_ans','no_ans','date','status','result_json'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function quiz()
    {
    	return $this->belongsTo(Quiz::class);
    }
}
