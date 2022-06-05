<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'materi_id',
        'pertanyaan',
        'option1',
        'option2',
        'option3',
        'option4',
        'option5',
        'key'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'materi_id', 'id');
    }
}
