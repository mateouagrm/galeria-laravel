<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Galeria;
use App\Album;
class galeriaController extends Controller
{
    public function listarGaleria(){
    	$galeria=Galeria::All();
    	return view('galeria.galeria',['galeria'=>$galeria]);
    }

    public function galeria($id){
    	$galeria=Galeria::find($id);
    	$album=Album::where('id_galeria', '=', $galeria->id)->get();
    	return view('galeria.album.album',['galeria'=>$galeria,'albums'=>$album]);
    }
    
}
