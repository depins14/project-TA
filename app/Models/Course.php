<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Course extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'kd_id',
        'judul',
        'ringkasan_materi',
        'materi',
        'video',
        'soal',
        'thumbnail'
    ];

    public function questions()
    {
        return $this->hasMany(Question::class, 'materi_id', 'id');
    }

    public function kd()
    {
        return $this->belongsTo(Kd::class, 'kd_id', 'id');
    }

    public function getThumbnail($thumbnail)
    {
        return config('app.url') . Storage::url($thumbnail);
    }

    public function getMateri($materi)
    {
        return config('app.url') . Storage::url($materi);
    }
}
