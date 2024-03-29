<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Registra nuevo tipo de noticia</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['id'=>'form_type']) !!}
        <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
        <div class="form-group">
          {!! Form::label('description', 'Tipo de noticia:') !!}
          {!! Form::text('description',null,['id'=>'description','class'=>'form-control', 'placeholder'=>'Ingrese nombre para el tipo de noticia']) !!}
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