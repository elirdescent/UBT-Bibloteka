<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'age',
        'student_id',
        'study_field'
    ];


    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public function checkInHistories()
{
    return $this->hasMany(CheckInHistory::class);
}

}
