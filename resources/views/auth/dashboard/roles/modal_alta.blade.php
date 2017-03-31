<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Registre nuevo rol</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['id'=>'form_rol']) !!}
        <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
        <div class="form-group">
          {!! Form::label('rol_name', 'Nombre del Rol:') !!}
          {!! Form::text('rol_name',null,['id'=>'rol_name','class'=>'form-control', 'placeholder'=>'Ingrese nombre para el rol']) !!}
        </div>
        {!! Form::close() !!}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-success" id="agregar_rol" data-dismiss="modal">Registrar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->