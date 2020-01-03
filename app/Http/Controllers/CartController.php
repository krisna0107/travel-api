<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Konten;

class CartController extends Controller
{
    public function getCart($kdbook){
        return Cart::where('kd_book', $kdbook)->get();
    }

    public function getCartKontenByUserKdBook($kdbook, $userid){
        $clause =[['kd_book', $kdbook], ['user_id', $userid]];
        $cart = Cart::select('konten_id')->where($clause);
        return Konten::whereIn('id', $cart)->get();
    }

    public function cekCart($kdbook, $userid, $kontenid){
        $clause = [['kd_book', $kdbook], ['user_id', $userid], ['konten_id', $kontenid]];
        $cart = Cart::where($clause)->first();
        if(!$cart)
            return response()->json([
                "cart" => "sukses",
                "status"=> false
            ], 200);
        else 
            return response()->json([
                "cart" => "sukses",
                "status"=> true
            ], 200);
    }

    public function tambah(request $request, $kdbook, $userid, $kontenid){
        $cart = new Cart;
        $cart->kd_book = $kdbook;
        $cart->konten_id = $kontenid;
        $cart->user_id = $userid;
        $cart->pinjam = $request->pinjam;
        $cart->kembali = $request->kembali;
        $cart->save();
        
        return $cart;
    }

    public function hapus($kdbook, $userid, $kontenid){
        $clause = [['kd_book', $kdbook], ['user_id', $userid], ['konten_id', $kontenid]];
        $cart =  Cart::where($clause)->first();
        $cart->delete();

        return $cart;
    }
}
