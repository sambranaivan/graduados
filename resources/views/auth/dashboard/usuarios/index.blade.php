@extends('layouts.dashboard')
@section('content')
<button id="alta" type="button" class="btn btn-success pull-left"  data-toggle="modal" data-target="#myModal">Agregar usuario</button><br><br>

@include('auth.dashboard.usuarios.modal_alta')
<div class="table-responsive" id="usuarios_all">
<table class="table table-bordered display nowrap" id="usuario">

</table>
</div>
@endsection
@section('script')
    {!! Html::script('assets/js/personalizado/usuarios.js') !!}
    <script type="text/javascript">
		(function() {
			app.usuarios.init();
		})();
	</script>
@endsection