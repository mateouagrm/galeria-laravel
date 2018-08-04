<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Galeria;
class galeriaController extends Controller
{
    public function listarGaleria(){
    	$galeria=Galeria::All();
    	return view('galeria.galeria',['galeria'=>$galeria]);
    }
}
