<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Options;
use App\Models\Quiz;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';

    protected $primaryKey = 'question_id';

    protected $fillable = [
        'question_id','quiz_id','question','answer','status','options','user_id',
    ];

    public function optionsdata()
    {
    	return $this->hasMany(Options::class,'question_id')->inRandomOrder();
    }
     public function quiz()
    {
    	return $this->belongsTo(Quiz::class);
    }
}
