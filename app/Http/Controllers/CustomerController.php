<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyRequest;
use App\Models\Property;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $ind=Property::get();
    }
}
