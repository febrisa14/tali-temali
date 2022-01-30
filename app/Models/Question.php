<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';

    protected $primaryKey = 'question_id';

    protected $fillable = [
        'quiz_id','question','answer','status','options','user_id',
    ];

    public function optionsdata()
    {
    	return $this->hasMany(Options::class)->inRandomOrder();
    }
     public function quiz()
    {
    	return $this->belongsTo(Quiz::class);
    }
}
