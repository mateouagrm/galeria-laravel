<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $table='foto';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable=[
         'imagen','id_album'  
    ];

    protected $guarded=[

    ];
}
