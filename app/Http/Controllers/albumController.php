<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Album;
use App\Galeria;
use Auth;

class albumController extends Controller
{
    public function listaAlbum(){
    	$galeria=Galeria::where('id_usuario','=',Auth::user()->id)->first();
    	$album=Album::where('id_galeria','=',$galeria->id)->get();
    	return view('galeria.album.lista_album',['albums' => $album]);
    }

    public function create(){
    	return view('galeria.album.create');
    }

    public function store(Request $request){
    	$galeria=Galeria::where('id_usuario','=',Auth::user()->id)->first();
    	$album=new Album;
    	$album->nombre=$request->get('nombre');
    	$album->id_galeria=$galeria->id;
    	$album->save();
    	  return redirect('album_create')->with('msjs',"Guardado Correctamente");
    }
}

