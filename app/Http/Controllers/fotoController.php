<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Album;
use App\Galeria;
use App\Foto;
use Auth;
class fotoController extends Controller
{
    public function upload_photo(){
    	$galeria=Galeria::where('id_usuario','=',Auth::user()->id)->first();
    	$album=Album::where('id_galeria','=',$galeria->id)->get();
    	return view('galeria.album.foto.upload_photo',['album'=>$album]);
    }

    public function photo_store(Request $request){
   
   		$foto=new Foto;
    	   if ($request->hasFile('foto')) {
                $dir          = 'uploads/';
                $extension    = strtolower($request->file('foto')->getClientOriginalExtension()); // get image extension
                $fileName     = str_random() . '.' . $extension; // rename image
                $request->file('foto')->move($dir, $fileName);
                $foto->imagen   = $fileName;
            }else{
            return redirect('upload_photo')->with('msjs',"No se guardaron los datos");              
            }

            if ($request->get('nombre_album')!="") {
            	$galeria=Galeria::where('id_usuario','=',Auth::user()->id)->first();
            	$album=new Album;
            	$album->nombre=$request->get('nombre_album');
            	$album->id_galeria=$galeria->id;
            	$album->save();

            	$foto->id_album=$album->id;
            }else{
            	$foto->id_album=$request->get('id_album');
            }
            $foto->save();
              return redirect('upload_photo')->with('msjs',"Se guardaron los datos");
    }

    public function my_photos(){
    	
    }
}
