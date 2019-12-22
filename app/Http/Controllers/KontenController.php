<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Konten;

class KontenController extends Controller
{
    public function index($limit){
        return Konten::paginate($limit);
    }
}
