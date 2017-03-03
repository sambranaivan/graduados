<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Registra nueva noticia</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['id'=>'form_new', 'files' => true]) !!}
        <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
        <div class="form-group">
          {!! Form::label('title', 'Titulo de la noticia:') !!}
          {!! Form::text('title',null,['id'=>'title','class'=>'form-control', 'placeholder'=>'Ingrese titulo de la noticia']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('pompadour', 'Subtitulo de la noticia:') !!}
          {!! Form::text('pompadour', null, ['id'=>'pompadour','class'=>'form-control', 'placeholder'=>'Ingrese subtitulo de la noticia']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('body', 'Contenido de la noticia:') !!}
          {!! Form::textarea('body', null, ['id'=>'body','class'=>'form-control', 'placeholder'=>'Ingrese contenido principal de la noticia']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('photo', 'Imagen de la noticia:') !!}
          {!! Form::file('photo',null,['id'=>'photo','name'=>'photo','class'=>'form-control', 'placeholder'=>'Imagen de la noticia']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('type_id', 'Tipo de noticia:') !!}
          {!! Form::select('type_id',['placeholder'=>'Seleccione tipo de noticia'],null, [ 'class'=>'form-control','id'=>'type'])!!}          
        </div>
        {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-success" id="agregar_type" data-dismiss="modal">Registrar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->