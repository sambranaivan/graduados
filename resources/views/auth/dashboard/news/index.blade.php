@extends('layouts.dashboard')
@section('content')
<button type="button" id="alta" class="btn btn-success pull-left"  data-toggle="modal" data-target="#myModal">Agregar noticia general</button><br><br>

@include('auth.dashboard.news.modal_alta')
<div class="table-responsive" id="noticia_general">
<table class="table table-bordered" id="new">

</table>
</div>
@endsection
@section('script')
    {!! Html::script('assets/js/personalizado/news.js') !!}
    <script type="text/javascript">
		(function() {
			app.news.init();
		})();
	</script>
@endsection


