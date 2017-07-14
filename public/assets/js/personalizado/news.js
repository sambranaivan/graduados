var app = app || {};

(function() {

  app.news = function() {
   var opcion_listado = $('.table-responsive').attr("id");

    var table = $('#new');

    function cargarTabla() {
      $('#new').DataTable({
          "destroy":true,
          "order":[[0,"asc"]],
          "lengthChange": true,
          "language":{
              "url": "../plugins/datatables/Spanish.json"
          },
          "ajax":{
              "method":"GET",
              "url": opcion_listado,
              "dataType":"JSON"
          },
          "columns":[
              {
              "className":      'details-control',
              "orderable":      false,
              "data":           null,
              "defaultContent": ''
             },
             {"data":'new_id',"title":"#"},
             {"data":'type.description',"title":"Tipo de Noticia"},
             {"data":'title',"title":"Titulo"},
             {"data":'pompadour',"title":"Subtitulo"},
             {"data":null,"title":"Editar <i class='fa fa-pencil-square-o' aria-hidden='true'></i>",
              "defaultContent":"<button type='button' id='editar' class='editar btn btn-warning' data-toggle='modal' data-target='#myModal'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Editar</button>"
             }

          ]
      });
      eventosAttach();
    }

    function usarSelect2() {
      $('#carrera').select2({
         dropdownParent: $("#myModal")
      });
    }

    /* Formatting function for row details - modify as you need */
    function format (d) {
      // `d` is the original data object for the row
      return "<div class='table-responsive'><table cellpadding='4' cellspacing='0' border='0' style='padding-left:50px;'>"+
        "<tr>"+
          "<td>Contenido:</td>"+
          "<td><textarea rows='4' cols='100' readonly>"+d.body+"</textarea></td>"+
        "</tr>"+
        "<tr>"+
          "<td>Fecha de publicación:</td>"+
          "<td>"+d.publication_date+"</td>"+
        "</tr>"+
        "<tr>"+
          "<td>Fecha fin publicación:</td>"+
          "<td>"+d.end_publication+"</td>"+
        "</tr>"+
      "</table></div>";
    }

    function ocultarBotones() {
      $('#alta').click(function() {
        $('#modif_new').hide();
        $('#_method').remove();
        $('#great').hide();
        $('#great_l').hide();
        rangofechas();
        mostrarBotones();
        agregarContenidoModal();
      });
    }

    function mostrarBotones() {
      $('#agregar_new').show();
      $('#long').show();
    }

    function agregarContenidoModal() {
      $('.modal-title').html('Registrar nuevo contenido');
    }

    function validarFormulario() {
      $("#form_new").validate({
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
            publication_date: {
                required: true,
                argDate: true

            },
            end_publication: {
                required: true,
                argDate: true
            }
        },
        messages: {
          title: {
            required: "Por favor ingrese un título",
            minlength: "Debe contener como minimo 5 caracteres"
          },
          pompadour: {
            required: "Por favor ingrese un subtítulo",
            minlength: "Debe contener como minimo 5 caracteres"
          },
          body: {
            required: "Por favor ingrese una descripción para el contenido",
            minlength: "Debe contener al menos 150 caracteres"
          },
          photo: {
            required: "Debe cargar una imagen alusiva a la noticia"
          },
          carrera: {
            required: "Debe seleccionar una carrera"
          },
          publication_date: {
            required: "Seleccione una fecha",
            argDate: "Seleccione una fecha valida"
          },
          end_publication: {
            required: "Seleccione una fecha",
            argDate: "Seleccione una fecha valida"
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
        }/*,
        success: function(label, element) {
            // Add the span element, if doesn't exists, and apply the icon classes to it.
            //if (!$(element).next("span")[0]) {
                $("<i class='fa fa-check fa-lg form-control-feedback'></i>").insertAfter($(element));

            //}

        }*/,
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
                    alert("ERROR :: " + action);
                }
            });
        }

      });
    }
    jQuery.validator.addMethod("argDate", function(value, element) {
      return value.match(/^(0?[1-9]|[12][0-9]|3[0-1])[/., -](0?[1-9]|1[0-2])[/., -](19|20)?\d{2}$/);
    },"Ingrese una fecha correcta");
    function limpiarModals() {
      //Removing the error and success elements from the from-group
      $("#myModal").on('hidden.bs.modal', function () {
        $(this).find("#title,#pompadour,#publication_date,#end_publication, textarea, :file").val('').end();
        $('.form-group').removeClass('has-success has-feedback');
        $('i').removeClass('fa-check fa-exclamation');
        $('.form-group').removeClass('has-error has-feedback');
        $('em').remove();
        $('#photo_mm').attr('src', '');
        $('#long').html('Caracteres ingresados: <span>0</span>');
      });
    }
    function mostrarImagen(input) {
     if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
       $('#photo_mm').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
     }
    }
    function changebotton(){
      $("#photo").change(function(){
       mostrarImagen(this);
      });
    }
    function clickBoton() {
      $("#agregar_new").click(function() {
          $('#_method').remove();
          action = "noticias";
      });

      $("#modif_new").click(function() {
          $('[name="photo"]').each(function () {
              $(this).rules('remove');
          });
          var value = $("#id").val();
          action = "noticias"+'/'+value;

      });

      $('#body').keyup(function() {
          var chars = $(this).val().length;
          $('#long').html('Caracteres ingresados: <span>'+chars+'</span>');
      });
    }

    function load_news() {
      $('#new').empty();
      cargarTabla();
    }

    function eventosAttach() {
       // Add event listener for opening and closing details
        $('#new tbody').on('click', 'td.details-control', function() {
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
            rangofechas();
            $('#modif_new').show();
            $('#agregar_new').hide();
            $('.modal-title').html('Modificar contenido seleccionado');
            $('#form_new').append( "<input type='hidden' name='_method' id='_method' value='PUT'>" );
            $('#great').show();
            $('#great_l').show();

            var id = $(this).parent("td").prev("td").prev("td").prev("td").prev("td").text();
            var route = "noticias"+'/'+id+'/edit';
            $.get(route, function(res){
                $("#id").val(res.new_id);
                $("#title").val(res.title);
                $("#pompadour").val(res.pompadour);
                $("#body").val(res.body);
                $("#photo_mm").attr('src', '../'+res.photo);
                var p_d = res.publication_date.split("-");
                var publication_date = p_d[2]+'/'+p_d[1]+'/'+p_d[0];
                var p_f = res.end_publication.split("-");
                var end_publication = p_f[2]+'/'+p_f[1]+'/'+p_f[0];
                $("#publication_date").val(publication_date);
                $("#end_publication").val(end_publication);
                $('#long').html('Caracteres ingresados: <span>'+res.body.length+'</span>');
            });
        });

    }
    function rangofechas(){
      $(".startdatepicker,.expiredatepicker").datetimepicker({
          locale: "es",
          format: "L",
          useCurrent: false,
          showTodayButton: true,
          showClear: true,
          minDate: moment(),
          ignoreReadonly: true,
          icons: {
              time: "fa fa-clock-o",
              date: "fa fa-calendar",
              up: "fa fa-arrow-up",
              down: "fa fa-arrow-down",
              previous: "fa fa-angle-left",
              next: "fa fa-angle-right",
              today: "fa fa-thumb-tack",
              clear: "fa fa-trash"
          }
      });
      $(".startdatepicker").on("dp.change", function (e) {
          $(".expiredatepicker").data("DateTimePicker").minDate(e.date);
      });
      $(".expiredatepicker").on("dp.change", function (e) {
          $(".startdatepicker").data("DateTimePicker").maxDate(e.date);
      });

    }
    function init() {
      load_news();
      usarSelect2();
      changebotton();
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