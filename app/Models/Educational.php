<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class Educational extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'body',
        'educational_category_id',
    ];

    protected $append = [
        'image_url',
    ];

    public function getImageUrlAttribute()
    {
        //Cek apakah image merupakan URL, jika ya maka gunakan URL tersebut
        if (filter_var($this->image, FILTER_VALIDATE_URL)) {
            return $this->image;
        }
        //Jika bukan URL, maka gunakan Storage::url untuk mengambil URL dari path gambar
        return $this->image ? Storage::url($this->image) : null;
    }

    public function educationalCategory()
    {
        return $this->belongsTo(EducationalCategory::class);
    }
}
