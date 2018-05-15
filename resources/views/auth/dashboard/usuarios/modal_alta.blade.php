<div class="modal fade" id="myModal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                </h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['id'=>'form_new', 'files' => true]) !!}
                <input id="id" type="hidden">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                {!! Form::label('name', 'Username:',['class'=>'control-label']) !!}
                        {!! Form::text('name',null,['id'=>'name','class'=>'form-control', 'placeholder'=>'Ingrese username']) !!}
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                {!! Form::label('password', 'Contraseña:',['class'=>'control-label']) !!}
                        {!! Form::text('password', null, ['id'=>'password','class'=>'form-control', 'placeholder'=>'Ingrese contraseña']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                {!! Form::label('phone', 'Teléfono:',['class'=>'control-label']) !!}
                        {!! Form::text('phone',null,['id'=>'phone','class'=>'form-control', 'placeholder'=>'Ingrese número de telefono']) !!}
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                {!! Form::label('email', 'Correo:',['class'=>'control-label']) !!}
                        {!! Form::text('email', null, ['id'=>'email','class'=>'form-control', 'placeholder'=>'Ingrese correo']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                        </div>
                        <div class="col-xs-6">
                            <div class="modal-footer">
                                <button class="btn btn-default" data-dismiss="modal" id="cerrar" type="button">
                                    Cerrar
                                </button>
                                <button class="btn btn-success" id="agregar_new" type="submit">
                                    Registrar
                                </button>
                                <button class="btn btn-warning" id="modif_new" type="submit">
                                    Modificar
                                </button>
                            </div>
                        </div>
                    </div>
                </input>
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
