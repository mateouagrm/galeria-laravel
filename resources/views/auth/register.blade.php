@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="display: flex;"> 
                  Register
                  <div style="margin: auto;">
                      @include('mensaje.mensaje')                    
                  </div>  
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="#" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required autofocus>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="apellido" class="col-md-4 control-label">Apellido</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="apellido" value="{{ old('apellido') }}" required autofocus>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" for="foto">foto</label>
                          <div class="col-md-4">
                            <input  id="f" name="foto" class="input-file" type="file" required>
                          </div>
                        </div>


                         <div class="form-group" style="display: flex;justify-content: center;">
                            <div class="input-group">
                                <img src="http://soulbook.blog.hu/media/image/facebook-default-photo.jpg" id="i"  alt="avatar"  
                                  style=" width: 200px; height: 200px;" >
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


   @push('scripts')
  <script>
      $('#f').on('change',function(ev){
             var f =ev.target.files[0];
             var fr = new FileReader();
             fr.onload = function(ev2){
              console.dir(ev2);
               $('#i').attr('src',ev2.target.result);
             };
             fr.readAsDataURL(f);
            
      });
  </script>
  @endpush  


@endsection
