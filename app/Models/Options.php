<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Quiz;

class Options extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id','option','status'
    ];

    protected $table = 'options';

    protected $primaryKey = 'option_id';

    public function quiz()
    {
    	return $this->belongsTo(Quiz::class);
    }
}
