<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name', 'image'
    ];

    public function setImageAttribute($value)
    {
        $this->attributes['image'] = json_encode($value);
    }
}
