<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckInHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'action',
        'timestamp',
    ];

    public function student()
{
    return $this->belongsTo(Student::class);
}
}
