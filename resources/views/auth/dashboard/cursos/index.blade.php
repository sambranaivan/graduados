@extends('layouts.dashboard')
@section('content')
<button type="button" id="alta" class="btn btn-success pull-left"  data-toggle="modal" data-target="#myModal">Agregar Curso</button><br><br>

@include('auth.dashboard.cursos.modal_alta')
<div class="table-responsive" id="cursos">
    <table class="table table-bordered display nowrap" id="new" >
            
    </table>
</div>
@endsection
@section('script')
	{!! Html::script('assets/js/noticias/news.js') !!}
@endsection