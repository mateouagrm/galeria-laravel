@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h2>Este Album le pertenece a la galeria: {{$galeria->nombre}}</h2>
    </div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
            <table class="table">
                <thead class="negro">
                    <tr>
                        <th  scope="col">id</th>
                        <th  scope="col">album</th>
                        <th  scope="col">Cantidad de fotos</th>
                        <th  scope="col">opciones</th>
                    </tr>   
                </thead>
                <tbody>
                     @foreach ($albums as $album)
                            <tr>
                                <td>{{$album->id}}</td>
                                <td>{{$album->nombre}}</td>
                                <td>
                                   <?php 
                                    $cantidad= App\Foto::where('id_album','=',$album->id)->count();
                                    ?>
                                     {{$cantidad}}
                                </td>
                                <td>
                                    <a class='form-control btn btn-info' href="#">
                                     Ver todas las Fotos</a>        
                                </td>
                            </tr>
                        @endforeach 
                </tbody>
            </table>
		</div>
	</div>
</div>

@endsection