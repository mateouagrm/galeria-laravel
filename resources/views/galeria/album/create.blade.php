@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

                      @include('mensaje.mensaje')                    
            
             <form class="form-horizontal" method="POST" action="{{ url('album_store') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="nombre" class="col-md-4 control-label">Nombre</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Crear Album
                                </button>
                            </div>
                        </div>
                    </form>
		</div>
	</div>
</div>

@endsection