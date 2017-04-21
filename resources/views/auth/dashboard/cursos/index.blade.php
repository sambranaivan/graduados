@extends('layouts.dashboard')
@section('content')
<button type="button" class="btn btn-success pull-left"  data-toggle="modal" data-target="#myModal">Agregar Curso</button><br><br>

@include('auth.dashboard.cursos.modal_alta')
@include('auth.dashboard.cursos.modal_modif')
<div class="table-responsive">
    <table class="table table-bordered" id="new">
    		
    </table>
</div>
@endsection
@section('script')
 <script>
    $('#carrera').select2({       
       dropdownParent: $("#myModal")
    });
    $('#carrera_m').select2({       
       dropdownParent: $("#myModal_modif")
    });
    /* Formatting function for row details - modify as you need */
    function format ( d ) {
        // `d` is the original data object for the row
        return '<table cellpadding="4" cellspacing="0" border="0" style="padding-left:50px;">'+
            '<tr>'+
                '<td>Contenido:</td>'+
                '<td>'+d.body+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Fecha de publicación:</td>'+
                '<td>'+d.publication_date+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Fecha fin publicación:</td>'+
                '<td>'+d.end_publication+'</td>'+
            '</tr>'+
        '</table>';
    }
    $(function() {
    	load_news();
      
    })
    var load_news = function (){
        $('#new').empty();
    	var table = $('#new').DataTable({
        	"destroy":true,
        	"order":[[0,"asc"]],
          "lengthChange": false,
          "language":{
        		"url": "{{asset('plugins/datatables/Spanish.json')}}"
        	},               
        	"ajax":{
        		"method":"GET",
        		"url":"{{url('panel/cursos')}}",
                "dataType":"JSON"
        	},
        	"columns":[
               {"data":'new_id',"title":"#"}, 
               {"data":'type.description',"title":"Tipo de Noticia"},
               {"data":'title',"title":"Titulo"},
               {"data":'pompadour',"title":"Subtitulo"},
               {"data":null,"title":"Editar <i class='fa fa-pencil-square-o' aria-hidden='true'></i>",
                "defaultContent":"<button type='button' class='editar btn btn-danger' data-toggle='modal' data-target='#myModal_modif'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Editar</button>" 
               },
               {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,"title":"Ver <i class='fa fa-eye' aria-hidden='true'></i>",
                "defaultContent": ''
               }

        	]
        });
        // Add event listener for opening and closing details
        $('#new tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row( tr );
     
            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                row.child( format(row.data()) ).show();
                tr.addClass('shown');
            }
        });
        
    }
    //Validate form ***MEJORAR***
    
    $(document).ready(function() {
            //Validate form in modal_alta   
            var validador = $("#form_new").validate({
                rules: {
                    title: {
                        required: true,
                        minlength: 5
                    },
                    pompadour: {
                        required: true,
                        minlength: 5
                    },
                    body: {
                        required: true,
                        minlength: 150
                    },
                    photo: {
                        required: true
                    },
                    carrera: {
                        required: true
                    },
                    publication_date: {
                        required: true
                    },
                    end_publication: {
                        required: true
                    }
                },
                messages: {
                  title: {
                    required: "Por favor ingrese un título para el curso",
                    minlength: "El título del curso debe contener como minimo 5 caracteres"
                  },
                  pompadour: {
                    required: "Por favor ingrese un subtítulo para el curso",
                    minlength: "Debe contener una minima descripción no debe quedar vacio"
                  },
                  body: {
                    required: "Por favor ingrese una descripción del contenido del curso",
                    minlength: "Debe contener al menos 150 caracteres"
                  },
                  photo: {
                    required: "Debe cargar una imagen"
                  },
                  carrera: {
                    required: "Debe seleccionar una carrera"
                  },
                  publication_date: {
                    required: "Seleccione una fecha"
                  },
                  end_publication: {
                    required: "Seleccione una fecha"
                  }
                },
                errorElement: "em",
                errorPlacement: function(error, element) {
                  // Add the `help-block` class to the error element
                  error.addClass("help-block");

                  // Add `has-feedback` class to the parent div.form-group
                  // in order to add icons to inputs
                  element.parents(".form-group").addClass("has-feedback");

                  if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.parent("label"));
                  } else {
                    error.insertAfter(element);
                  }

                  // Add the span element, if doesn't exists, and apply the icon classes to it.
                  if (!element.next("span")[0]) {
                    $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>").insertAfter(element);
                  }
                },
                success: function(label, element) {
                    // Add the span element, if doesn't exists, and apply the icon classes to it.
                    if (!$(element).next("span")[0]) {
                        $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>").insertAfter($(element));
                    
                    }
                    
                },
                highlight: function(element, errorClass, validClass) {
                  $(element).parents(".form-group").addClass("has-error").removeClass("has-success");
                  $(element).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");
                },
                unhighlight: function(element, errorClass, validClass) {
                  $(element).parents(".form-group").addClass("has-success").removeClass("has-error");
                  $(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
                },
                submitHandler: function() {
                    $.ajax({
                        url: "{{url('panel/noticias')}}",
                         headers:{'X-CSRF-TOKEN':token},
                        type: "POST",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: new FormData($("#form_new")[0]),
                        success: function(){
                          load_news();
                          $('#myModal').modal('toggle');
                          $("#form_new").resetForm();
                        }
                    });
                }
            });
            
            //Validate form modal_modif
            var validador_m = $("#form_new_modif").validate({
                rules: {
                    title_m: {
                        required: true,
                        minlength: 5
                    },
                    pompadour_m: {
                        required: true,
                        minlength: 5
                    },
                    body_m: {
                        required: true,
                        minlength: 150
                    },
                    carrera_m: {
                        required: true
                    },
                    publication_date_m: {
                        required: true
                    },
                    end_publication_m: {
                        required: true
                    }
                },
                messages: {
                  title_m: {
                    required: "Por favor ingrese un título para el curso",
                    minlength: "El título del curso debe contener como minimo 5 caracteres"
                  },
                  pompadour_m: {
                    required: "Por favor ingrese un subtítulo para el curso",
                    minlength: "Debe contener una minima descripción no debe quedar vacio"
                  },
                  body_m: {
                    required: "Por favor ingrese una descripción del contenido del curso",
                    minlength: "Debe contener al menos 150 caracteres"
                  },
                  carrera_m: {
                    required: "Debe seleccionar una carrera"
                  },
                  publication_date_m: {
                    required: "Seleccione una fecha"
                  },
                  end_publication_m: {
                    required: "Seleccione una fecha"
                  }
                },
                errorElement: "em",
                errorPlacement: function(error, element) {
                  // Add the `help-block` class to the error element
                  error.addClass("help-block");

                  // Add `has-feedback` class to the parent div.form-group
                  // in order to add icons to inputs
                  element.parents(".form-group").addClass("has-feedback");

                  if (element.prop("type_m") === "checkbox") {
                    error.insertAfter(element.parent("label"));
                  } else {
                    error.insertAfter(element);
                  }

                  // Add the span element, if doesn't exists, and apply the icon classes to it.
                  if (!element.next("span")[0]) {
                    $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>").insertAfter(element);
                  }
                },
                success: function(label, element) {
                    // Add the span element, if doesn't exists, and apply the icon classes to it.
                    if (!$(element).next("span")[0]) {
                        $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>").insertAfter($(element));
                    
                    }
                    
                },
                highlight: function(element, errorClass, validClass) {
                  $(element).parents(".form-group").addClass("has-error").removeClass("has-success");
                  $(element).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");
                },
                unhighlight: function(element, errorClass, validClass) {
                  $(element).parents(".form-group").addClass("has-success").removeClass("has-error");
                  $(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
                },
                submitHandler: function() {
                    var value = $("#id").val();
                    var token = $("#token").val();
                    $.ajax({
                        url: "{{url('panel/noticias')}}"+'/'+value,
                        headers:{'X-CSRF-TOKEN':token},
                        type: "POST",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: new FormData($("#form_new_modif")[0]),
                        success: function(){
                          load_news();
                          $('#myModal_modif').modal('toggle');
                          $("#form_new_modif").resetForm();
                        }
                    });
                }
            });
            //Removing the error and success elements from the from-group
            $(".modal").on('hidden.bs.modal', function () {
              $(this).find("#title,#pompadour,#publication_date,#end_publication, textarea, :file").val('').end();
              $('.form-group').removeClass('has-success has-feedback');
              $('span').removeClass('glyphicon-ok glyphicon-remove');
              $('.form-group').removeClass('has-error has-feedback');
              $('em').remove();              
            });
    }); 
    
    $("body").on("click","button.editar",function(){
        var id = $(this).parent("td").prev("td").prev("td").prev("td").prev("td").text();
        var route = "{{url('panel/noticias')}}"+'/'+id+'/edit';
        $.get(route, function(res){
            $("#id").val(res.new_id);
            $("#title_m").val(res.title);
            $("#pompadour_m").val(res.pompadour);
            $("#body_m").val(res.body);
            $("#photo_mm").attr('src', '../'+res.photo);
            $("#publication_date_m").val(res.publication_date);
            $("#end_publication_m").val(res.end_publication);            
        });
    });
 </script>
@endsection


