<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Akun;
class AkunController extends Controller
{
    public function getAkun($email){
        return Akun::where('email', $email)->first();
    }
    
    public function index($limit){
        return Akun::paginate($limit);
    }
}
