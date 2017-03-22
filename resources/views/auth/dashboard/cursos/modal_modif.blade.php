<div class="modal fade" tabindex="-1" role="dialog" id="myModal_modif">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modificar datos del curso</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['id'=>'form_new_modif', 'files' => true]) !!}
        <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
        <input type="hidden" name="_method" id="_method" value="PUT">
        <input type="hidden" id="id">
        <div class="row">
          <div class="col-xs-6">
            <div class="form-group">
              {!! Form::label('title_m', 'Titulo de la noticia:') !!}
              {!! Form::text('title_m',null,['id'=>'title_m','class'=>'form-control', 'placeholder'=>'Ingrese titulo de la noticia']) !!}
            </div>
          </div> 
          <div class="col-xs-6">
            <div class="form-group">
              {!! Form::label('pompadour_m', 'Subtitulo de la noticia:') !!}
              {!! Form::text('pompadour_m', null, ['id'=>'pompadour_m','class'=>'form-control', 'placeholder'=>'Ingrese subtitulo de la noticia']) !!}
            </div>
          </div>   
        </div>
        <div class="row">
          <div class="col-xs-6">
            <div class="form-group">
              {!! Form::label('body_m', 'Contenido de la noticia:') !!}
              {!! Form::textarea('body_m', null, ['id'=>'body_m','class'=>'form-control', 'placeholder'=>'Ingrese contenido principal de la noticia']) !!}
            </div>
          </div>
          <div class="col-xs-6">
            <div class="form-group">
              {!! Form::label('photo_m', 'Imagen de la noticia:') !!}
              {!! Form::image('','success',['id'=>'photo_mm','class'=>'img-responsive', 'width' => 150, 'height' => 150 ] )  !!}
              {!! Form::file('photo_m',null,['id'=>'photo_m','name'=>'photo_m','class'=>'form-control', 'placeholder'=>'Imagen de la noticia']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('carrera_m', 'Carrera:') !!}
              {!! Form::select('carrera_m', $carrera , null, ['placeholder'=>'Seleccione carrera',  'class'=>'form-control','style'=>'width:100%','id'=>'carrera_m'])!!}          
            </div>
            <div class="form-group">
              {!! Form::label('type_m', 'Tipo de Noticia:') !!}
              {!! Form::text('type_m', 'Cursos', ['id'=>'2','class'=>'form-control', 'readonly'=>'readonly']) !!}              
            </div>
            <div class="form-group col-xs-6">
              {!! Form::label('publication_date_m', 'Inicio de publicación:') !!}
              {!! Form::text('publication_date_m', null, ['id'=>'publication_date_m','class'=>'form-control', 'placeholder'=>'____/__/__', 'data-provide'=>'datepicker']) !!}          
            </div>
            <div class="form-group col-xs-6">
              {!! Form::label('end_publication_m', 'Fin de publicación:') !!}
              {!! Form::text('end_publication_m', null, ['id'=>'end_publication_m','class'=>'form-control', 'placeholder'=>'____/__/__', 'data-provide'=>'datepicker']) !!}             
            </div>
          </div>
        </div>       
        {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-warning" id="modif_new" data-dismiss="modal">Modificar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->