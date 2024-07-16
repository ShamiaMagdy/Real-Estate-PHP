<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable=[
        'rating',
        'comment',
        'userID',
        'propertyID'
    ];

    public function user(){
        return $this->belongsTo(User::class,'userID') ;
    }
    public function property(){
        return $this->belongsTo(Property::class,'propertyID') ;
    }
}
