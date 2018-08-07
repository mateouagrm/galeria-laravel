<?php

//base de datos : minuscula
namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
     protected $table='galeria';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable=[
         'nombre','id_usuario' ] ;
}
