{!! Form::open(['id'=>'form_type']) !!}
<input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
<input type="hidden" id="id">
<div class="form-group">
	{!! Form::label('description', 'Tipo de noticia:') !!}
	{!! Form::text('description',null,['id'=>'description','class'=>'form-control', 'placeholder'=>'Ingrese nombre para el tipo de noticia']) !!}
</div>
{!! Form::close() !!}