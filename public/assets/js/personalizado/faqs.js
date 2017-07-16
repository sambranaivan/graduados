var app = app || {};
(function() {
  app.faqs = function() {
    var table = $('#frecuentes');
    function load_news() {
      $('#frecuentes').empty();
      cargarTabla();
    }
    function cargarTabla() {
    	$('#frecuentes').DataTable({
    		"destroy":true,
    		"order":[[0,"asc"]],
    		"lengthChange": true,
    		"language":{
    			"url": "../plugins/datatables/Spanish.json"
    		},
    		"ajax":{
    			"method":"GET",
    			"url": "preguntas_frecuentes",
    			"dataType":"JSON"
    		},
    		"columns":[
    		{
    			"className":      'details-control',
    			"orderable":      false,
    			"data":           null,
    			"defaultContent": ''
    		},
    		{"data":'id',"title":"#"},
    		{"data":'title',"title":"Titulo de la pregunta"},
    		{"data":'description',"title":"Descripción"},
    		{"data":null,"title":"Editar <i class='fa fa-pencil-square-o' aria-hidden='true'></i>",
    		"defaultContent":"<button type='button' id='editar' class='editar btn btn-warning' data-toggle='modal' data-target='#myModal'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Editar</button>"
    	}

    	]
    });
    	eventosAttach();
    }
    function eventosAttach() {
       // Add event listener for opening and closing details
       $('#frecuentes tbody').on('click', 'td.details-control', function() {
       	var tr = $(this).closest('tr');
       	var row = table.DataTable().row( tr );

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

            $("body").on("click","button.editar",function(){
             	$('#modif_new').show();
             	$('#agregar_new').hide();
             	$('.modal-title').html('Modificar contenido seleccionado');
             	$('#form_new').append( "<input type='hidden' name='_method' id='_method' value='PUT'>" );

             	var id = $(this).parent("td").prev("td").prev("td").prev("td").text();
              var route = "faqs"+'/'+id+'/edit';
              $.get(route, function(res){
                $("#id").val(res.id);
                $("#title").val(res.title);
             		$("#description").val(res.description);
                var iframe = '<div><iframe src="'+'../'+res.url_file+'"></iframe></div>'
                $('.pdf').html(iframe);
                $('#long').html('Caracteres ingresados: <span>'+res.description.length+'</span>');
             	});
            });
    }
    function format (d) {
      // `d` is the original data object for the row
      return "<div class='table-responsive'><table cellpadding='4' cellspacing='0' border='0' style='padding-left:50px;'>"+
      "<tr>"+
      "<td>Url del archivo:</td>"+
      "<td><textarea rows='4' cols='100' readonly>"+d.url_file+"</textarea></td>"+
      "</tr>"+
      "<tr>"+
      "<td>Fecha de creación:</td>"+
      "<td>"+d.created_at+"</td>"+
      "</tr>"+
      "<tr>"+
      "<td>Fecha ultima modificación:</td>"+
      "<td>"+d.updated_at+"</td>"+
      "</tr>"+
      "</table></div>";
    }
    function ocultarBotones() {
      $('#alta').click(function() {
        $('#modif_new').hide();
        $('#_method').remove();
        $('#great').hide();
        $('#great_l').hide();
        mostrarBotones();
        agregarContenidoModal();
      });
    }
    function limpiarModals() {
      //Removing the error and success elements from the from-group
      $("#myModal").on('hidden.bs.modal', function () {
        $(this).find("#title,#description,#pdf,:file").val('').end();
        $('.form-group').removeClass('has-success has-feedback');
        $('i').removeClass('fa-check fa-exclamation');
        $('.form-group').removeClass('has-error has-feedback');
        $('em').remove();
        $('#photo_mm').attr('src', '');
        $('#long').html('Caracteres ingresados: <span>0</span>');
      });
    }
    function clickBoton() {
      $("#agregar_new").click(function() {
        $('#_method').remove();
        action = "faqs";
      });

      $("#modif_new").click(function() {
        var value = $("#id").val();
        action = "faqs"+'/'+value;

      });

      $('#description').keyup(function() {
        var chars = $(this).val().length;
        $('#long').html('Caracteres ingresados: <span>'+chars+'</span>');
      });
    }
    function validarFormulario() {
      $("#form_new").validate({
        rules: {
          title: {
            required: true,
            minlength: 5
          },
          description: {
            required: true,
            minlength: 100
          }
        },
        messages: {
          title: {
            required: "Por favor ingrese un título",
            minlength: "Debe contener como minimo 5 caracteres"
          },
          description: {
            required: "Por favor ingrese una descripción para el contenido",
            minlength: "Debe contener al menos 100 caracteres"
          }
        },
        errorElement: "em",
        errorPlacement: function(error, element) {
          // Add the `help-block` class to the error element
          /*error.addClass("help-block");

          // Add `has-feedback` class to the parent div.form-group
          // in order to add icons to inputs
          element.parents(".form-group").addClass("has-feedback");
          */

          /*if (element.prop("type") === "checkbox") {
            error.addClass("help-block");
            //error.insertAfter(element.parent("label"));
          } else {
            error.addClass("help-block");
            //error.insertAfter(element);
          }*/

          // Add the span element, if doesn't exists, and apply the icon classes to it.
          //if (!element.next("span")[0]) {
            if (element.prop("type") === "checkbox") {
              error.addClass("help-block");
              error.insertAfter(element.parent("label"));
            } else {
              error.addClass("help-block");
              error.insertAfter(element);
            }
          //}
        },
        highlight: function (element, errorClass, validClass) {
          if (element.type === "radio") {
            this.findByName(element.name).addClass(errorClass).removeClass(validClass);
          } else {
            $(element).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            $(element).closest('.form-group').find('i.fa-check').remove();
            $(element).closest('.form-group').append('<i class="fa fa-exclamation fa-lg form-control-feedback"></i>');
          }
        },
        unhighlight: function (element, errorClass, validClass) {
          if (element.type === "radio") {
            this.findByName(element.name).removeClass(errorClass).addClass(validClass);
          } else {
            $(element).closest('.form-group').removeClass('has-error has-feedback').addClass('has-success has-feedback');
            $(element).closest('.form-group').find('i.fa-exclamation').remove();
            $(element).closest('.form-group').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
          }
        },
        submitHandler: function(form) {
          var token = $('input:hidden[name=_token]').val();
          $.ajax({
            url:action,
            type:'POST',
            headers:{'X-CSRF-TOKEN':token},
            cache: false,
            contentType: false,
            processData: false,
            data: new FormData($("#form_new")[0]),
            success: function(){
              load_news();
              $('#myModal').modal('toggle');
            },
            error : function(responseText){
              var errores = $.parseJSON(responseText.responseText);
              $.each(errores, function(index, value) {
                var mje =value[0];
                //alert('');
                swal(
                  'Oops...',
                  'El adjunto no cumple con las restricciones requeridas: De ser formato PDF o su peso menor a 4mb',
                  'error'
                );
              });
            }
          });
        }
      });
    }

    function mostrarBotones() {
      $('#agregar_new').show();
      $('#long').show();
    }
    function agregarContenidoModal() {
      $('.modal-title').html('Registrar nuevo contenido');
    }
  	function init() {
  		load_news();
  		ocultarBotones();
  		limpiarModals();
  		clickBoton();
  		validarFormulario();
  	}

  	return {
  		init: init
  	}
  }();
})();