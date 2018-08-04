@if(Session::has('msjs'))
<!-- success -->
<div id="msj" class ="alert alert-danger alert-dismissible  avatar rounded img-thumbnail" role="alert" style="margin-bottom: 0px; text-align: center">
  <button type="button" class="close" data-dismiss="alert" ><span aria-hidden="true">&times;</span></button>
  {{Session::get('msjs')}}
</div>

@endif