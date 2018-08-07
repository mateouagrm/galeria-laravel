@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th  scope="col">id</th>
						<th  scope="col">galeria</th>
						<th  scope="col">cantidad Album</th>
						<th  scope="col">opciones</th>
					</tr>	
				</thead>
				<tbody>
					 @foreach ($galeria as $gal)
                            <tr>
                            	<td>{{$gal->id}}</td>
                                <td>{{$gal->nombre}}</td>
                                <td>
                                   <?php 
                                    $cantidad= App\Album::where('id_galeria','=',$gal->id)->count();
                                    ?>
                                     {{$cantidad}}
                                </td>
                                <td>
                                	<div class="row">
                                		<div class="col-md-3">
                                			<a class='btn btn-info' href="{{url('galeria/'.$gal->id)}}">
                                     Ver Album</a>			
                                		</div>
                                		<div class="col-md-5">
                                			<a class=' btn btn-info' href="#">
                                     Ver todas las Fotos</a>		
                                		</div>
                                	</div>
                                </td>
                            </tr>
                        @endforeach 
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection