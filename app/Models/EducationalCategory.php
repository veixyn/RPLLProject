<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'name',
        'description',
    ];

    // 1 Category dapat memiliki banyak Articles
    public function educationals()
    {
        return $this->hasMany(Educational::class);
    }
}
