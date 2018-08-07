@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

                      @include('mensaje.mensaje')                    
            
             <form class="form-horizontal" method="POST" action="{{ url('photo_store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-4">
                        <div> 
                            <input   name="formType" type="radio"  onclick="seleccion()" checked="checked">
                            <label for="opinion">seleccionar Album</label>
                         </div>
                         <div>   
                            <input  name="formType" type="radio" onclick="nuevo()" >
                            <label for="budget">crear Album</label>
                          </div>       
                    </div>
                       <div class="col-md-8">
                               <div id="seleccion" class="form-group">
                                <label for="id_album" class="col-md-4 control-label">seleccion Album</label> 
                                <div class="col-md-8">
                                   <select name="id_album" class="form-control" required="">
                                        @foreach ($album as $alb)
                                           <option value="{{$alb->id}}">{{$alb->nombre}}</option>  
                                        @endforeach
                                   </select>
                                </div>
                               </div>

                                <div id="crear" class="form-group">
                                    <label for="nombre_album" class="col-md-4 control-label">Nombre album</label>
                                    <div class="col-md-8">
                                        <input type="text" id="crear_input" class="form-control" name="nombre_album" value="">
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
                       </div>   
                </div>


                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Upload photo
                                </button>
                            </div>
                        </div>
                    </form>
		</div>
	</div>
</div>


   @push('scripts')
  <script>
    function seleccion() {
        console.log('seleccion');
        document.getElementById("crear").style.display ="none";
        document.getElementById("crear_input").value="";

        document.getElementById("seleccion").style.display ="block";
    }

    function nuevo() {
        console.log('nuevo');
        document.getElementById("crear").style.display ="block";
        document.getElementById("seleccion").style.display ="none";
    }

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