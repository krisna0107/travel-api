<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Konten;

class KontenController extends Controller
{
    public static function index($limit){
        return Konten::paginate($limit);
    }

    public function getKonten($id){
        return Konten::find($id);
    }

    public function tambah(request $request){
        $konten = new Konten;
        $konten->judul = $request->judul;
        $konten->harga = $request->harga;
        $konten->deskripsi = $request->deskripsi;
        $konten->url_photo = $request->urlphoto;
        $konten->save();

        return $konten;
    }

    public function edit(request $request, $id){
        $konten = Konten::find($id);
        $konten->judul = $request->judul;
        $konten->harga = $request->harga;
        $konten->deskripsi = $request->deskripsi;
        $konten->url_photo = $request->urlphoto;
        $konten->save();

        return $konten;
    }

    public function hapus($id){
        $konten = Konten::find($id);
        $konten->delete();

        return $konten;
    }
}
