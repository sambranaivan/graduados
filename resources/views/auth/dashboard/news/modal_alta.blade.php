<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
            {!! Form::open(['id'=>'form_new', 'files' => true]) !!}
                <input type="hidden" id="id">
                <div class="row">
                  <div class="col-xs-6">
                    <div class="form-group">
                        {!! Form::label('title', 'Titulo de la noticia:',['class'=>'control-label']) !!}
                        {!! Form::text('title',null,['id'=>'title','class'=>'form-control', 'placeholder'=>'Ingrese titulo de la noticia']) !!}
                    </div>
                  </div> 
                  <div class="col-xs-6">
                    <div class="form-group">
                        {!! Form::label('pompadour', 'Subtitulo de la noticia:',['class'=>'control-label']) !!}
                        {!! Form::text('pompadour', null, ['id'=>'pompadour','class'=>'form-control', 'placeholder'=>'Ingrese subtitulo de la noticia']) !!}
                    </div>
                  </div>   
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            {!! Form::label('body', 'Contenido de la noticia:',['class'=>'control-label']) !!}
                            {!! Form::textarea('body', null, ['id'=>'body','class'=>'form-control', 'placeholder'=>'Ingrese contenido principal de la noticia']) !!}
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            {!! Form::label('photo', 'Imagen de la noticia:',['class'=>'control-label']) !!}
                            {!! Form::image('','success',['id'=>'photo_mm','class'=>'img-responsive', 'width' => 150, 'height' => 150 ] )  !!}
                            {!! Form::file('photo',null,['id'=>'photo','name'=>'photo','class'=>'form-control', 'placeholder'=>'Imagen de la noticia']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('carrera', 'Carrera:',['class'=>'control-label']) !!}
                            {!! Form::select('carrera', $carrera , null, ['class'=>'form-control','style'=>'width:100%','id'=>'carrera'])!!}          
                        </div>
                        <div class="form-group">
                            {!! Form::label('type', 'Tipo de Noticia:',['class'=>'control-label']) !!}
                            {!! Form::text('type', 'General', ['id'=>'1','class'=>'form-control', 'readonly'=>'readonly']) !!}        
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-6">
                                {!! Form::label('publication_date', 'Inicio de publicación:',['class'=>'control-label']) !!}
                                {!! Form::text('publication_date', null, ['id'=>'publication_date','class'=>'form-control', 'placeholder'=>'____/__/__', 'data-provide'=>'datepicker']) !!}          
                            </div>
                            <div class="form-group col-xs-6">
                                {!! Form::label('end_publication', 'Fin de publicación:',['class'=>'control-label']) !!}
                                {!! Form::text('end_publication', null, ['id'=>'end_publication','class'=>'form-control', 'placeholder'=>'____/__/__', 'data-provide'=>'datepicker']) !!}             
                            </div> 
                        </div>
                    </div>
                </div> 
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="cerrar" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success" id="agregar_new">Registrar</button>
                    <button type="submit" class="btn btn-warning" id="modif_new">Modificar</button>
                </div>
            </div>       
            {!! Form::close() !!}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
