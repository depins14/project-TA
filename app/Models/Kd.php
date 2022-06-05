<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kd extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'kd',
        'nama_kd'
    ];

    public function courses()
    {
        return $this->hasMany(Course::class, 'kd_id', 'id');
    }
}
