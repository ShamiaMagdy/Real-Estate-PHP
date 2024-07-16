<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $fillable=[
        'message',
        'propertyID',
        'userID'
    ];

    public function user(){
        return $this->belongsTo(User::class,'userID') ;
    }
    public function property(){
        return $this->belongsTo(Property::class,'propertyID') ;
    }
}
