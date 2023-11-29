<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volume extends Model
{
    use HasFactory;

    protected $fillable = [
        'volume',
        'user_id',
        'type',
        'type_description'
    ];

    public function user(){
        return $this->hasOne(User::class);
    }
}
