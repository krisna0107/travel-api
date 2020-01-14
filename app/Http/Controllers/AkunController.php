<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Akun;
class AkunController extends Controller
{
    
    public static function getEmail($id){
        $acc = Akun::find($id);
        return $acc->email;
    }

    public function getAkun($email){
        $akun = Akun::where('email', $email)->first();
        if(!$akun){
            $create = new Akun;
            $create->email = $email;
            $create->save();

            return $create;
        }else{
            return $akun;
        }
    }

    public function setTelp($email, $telp){
        $akun = Akun::where('email', $email)->first();
        $akun->telp = $telp;
        $akun->save();

        return $akun;
    }
    
    public function index($limit){
        return Akun::paginate($limit);
    }
}
