<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $table = 'quizzes';

    protected $primaryKey = 'quiz_id';

    protected $fillable = [
        'quiz_name','description','quiz_date','quiz_time','number_of_question','status',
    ];
}
