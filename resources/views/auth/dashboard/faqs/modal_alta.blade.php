<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <div id="mje"></div>
                </div>
            @endif
            {!! Form::open(['id'=>'form_new', 'files' => true]) !!}
                <input type="hidden" id="id">
                <div class="row">
                  <div class="col-xs-6">
                    <div class="form-group">
                        {!! Form::label('title', 'Titulo de la Pregunta:',['class'=>'control-label']) !!}
                        {!! Form::text('title',null,['id'=>'title','class'=>'form-control', 'placeholder'=>'Ingrese titulo de la pregunta']) !!}
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="form-group">
                        {!! Form::label('description', 'Contenido de la pregunta:',['class'=>'control-label']) !!}
                        {!! Form::textarea('description', null, ['id'=>'description','class'=>'form-control', 'placeholder'=>'Ingrese contenido principal de la pregunta']) !!}
                        {!! Form::label('Caracteres ingresados','Caracteres ingresados:', ['id'=>'long'])!!}
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">

                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            {!! Form::label('el_adjunto', 'Archivo adjunto:',['class'=>'control-label']) !!}
                            {!! Form::image('','success',['id'=>'photo_mm','class'=>'img-responsive', 'width' => 150, 'height' => 150 ] )  !!}
                            {!! Form::file('el_adjunto',null,['id'=>'el_adjunto','name'=>'el_adjunto','class'=>'form-control', 'placeholder'=>'Imagen de la noticia']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-xs-6">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" id="cerrar" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-success" id="agregar_new">Registrar</button>
                            <button type="submit" class="btn btn-warning" id="modif_new">Modificar</button>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->