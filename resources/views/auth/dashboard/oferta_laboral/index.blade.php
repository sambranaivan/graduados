@extends('layouts.dashboard')
@section('content')
<button id="alta" type="button" class="btn btn-success pull-left"  data-toggle="modal" data-target="#myModal">Agregar ofertas laborales</button><br><br>

@include('auth.dashboard.oferta_laboral.modal_alta')
<div class="table-responsive" id="ofertas_laborales">
<table class="table table-bordered display nowrap" id="new">

</table>
</div>
@endsection
@section('script')
    {!! Html::script('public/assets/js/personalizado/news.js') !!}
    <script type="text/javascript">
		(function() {
			app.news.init();
		})();
	</script>
@endsection


