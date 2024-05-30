<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'category',
        'isbn',
        'author',
        'description'
    ];



    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public function isLoaned()
    {
        return $this->loans()->whereNull('returned_at')->exists();
    }
}
