@extends('layouts.dashboard')
@section('content')

<form name="faq" method="POST" action="{{ url('/panel/faqs') }}">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    <label for="exampleInputEmail1">Pregunta</label>
    <input name="title" type="text" class="form-control" id="title" placeholder="Pregunta" required/>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Descripción</label>
    <textarea name="description" class="form-control" id="description" placeholder="Descripcion" required/></textarea>
  </div>
  <button type="submit" class="btn btn-default">Guardar</button>
</form>

@endsection