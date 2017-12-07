@extends('layouts.dashboard')
@section('content')
<button type="button" id="alta" class="btn btn-success pull-left"  data-toggle="modal" data-target="#myModal">Agregar preguntas frecuentes</button><br><br>

@include('auth.dashboard.faqs.modal_alta')
<div class="table-responsive">
    <table class="table table-bordered display nowrap" id="frecuentes" >

    </table>
</div>
@endsection
@section('script')
  {!! Html::script('public/assets/js/personalizado/faqs.js') !!}
  <script type="text/javascript">
    (function() {
      app.faqs.init();
    })();
  </script>
@endsection