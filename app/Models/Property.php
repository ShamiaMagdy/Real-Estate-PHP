<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'location',
        'description',
        'price',
        'area',
        'bedrooms',
        'bathrooms',
        'garden',
        'garage',
        'pool',
        'rentvssell',
        'userID',
        'image',
        'images',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class,"propertyID");
    }
}
