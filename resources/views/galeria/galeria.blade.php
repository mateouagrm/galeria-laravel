@extends('layouts.app')
@section('content')

<h2>Hola Mundo :) </h2>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<table>
				<thead>
					<tr>
						<th>id</th>
						<th>galeria</th>
						<th>usuario</th>
						<th>opciones</th>
					</tr>	
				</thead>
				<tbody>
					 @foreach ($galeria as $gal)
                            <tr>
                                <td>{{$gal->nombre}}</td>
                                <td>{{$gal->monto_total}}</td>
                                <td>
                                  <a class='form-control total btn btn-info' href="#">
                                     Ver Historial</a>
                                </td>
                            </tr>
                        @endforeach 
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection