var app = app || {};

(function() {

  app.usuarios = function() {
   var opcion_listado = $('.table-responsive').attr("id");

    var table = $('#new');

    function cargarTabla() {
      $('#usuario').DataTable({
          "destroy":true,
          "order":[[0,"asc"]],
          "lengthChange": true,
          "language":{
              "url": "../public/plugins/datatables/Spanish.json"
          },
          "ajax":{
              "method":"GET",
              "url": opcion_listado,
              "dataType":"JSON"
          },
          "columns":[
              
             {"data":'user_id',"title":"#"},
             {"data":'name',"title":"Nombre"},
             {"data":'email',"title":"Correo"},
             {"data":'phone',"title":"Teléfono"},
             {"data":null,"title":"Editar <i class='fa fa-pencil-square-o' aria-hidden='true'></i>",
              "defaultContent":"<button type='button' id='editar' class='editar btn btn-warning' data-toggle='modal' data-target='#myModal'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Editar</button>"
             }

          ]
      });
      eventosAttach();
    }

    function usarSelect2() {
      $('#rol').select2({
         dropdownParent: $("#myModal")
      });
    }
    function ocultarBotones() {
      $('#alta').click(function() {
        $('#modif_new').hide();
        $('#_method').remove();
        mostrarBotones();
        agregarContenidoModal();
      });
    }

    function mostrarBotones() {
      $('#agregar_new').show();
      $('#long').show();
    }

    function agregarContenidoModal() {
      $('.modal-title').html('Registrar nuevo usuario');
    }

    function validarFormulario() {
      $("#form_new").validate({
        rules: {
            name: {
                required: true,
                minlength: 5
            },
            password: {
                required: true,
                minlength: 8
            },
            phone: {
                required: true,
                number: true,
                minlength:10
            },
            email: {
                required: true,
                email:true
            },
            rol: {
                required: true

            }
        },
        messages: {
          name: {
            required: "Por favor ingrese username",
            minlength: "Debe contener como minimo 5 caracteres"
          },
          password: {
            required: "Por favor ingrese una clave",
            minlength: "Debe contener como minimo 8 caracteres"
          },
          phone: {
            required: "Por favor ingrese un número de teléfono",
            minlength: "Debe contener al menos 10 caracteres",
            number: "Debe ser un dato numérico"
          },
          email: {
            required: "Dene ingresar el correo",
            email: "No contiene el formato de un correo valido"
          },
          rol: {
            required: "Debe seleccionar un rol"
          }
        },
        errorElement: "em",
        errorPlacement: function(error, element) {
            if (element.prop("type") === "checkbox") {
              error.addClass("help-block");
              error.insertAfter(element.parent("label"));
            } else {
              error.addClass("help-block");
              error.insertAfter(element);
            }          
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
            //alert($('input:radio[name=des]:checked').val());
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
                  swal(
                    'Oops...',
                    'Error al realizar la acción, verifique los datos..',
                    'error'
                  );
                }
            });
        }
      });
    }
    
    function limpiarModals() {
      //Removing the error and success elements from the from-group
      $("#myModal").on('hidden.bs.modal', function () {
        $(this).find("#name,#password,#phone,#email").val('').end();
        $('.form-group').removeClass('has-success has-feedback');
        $('i').removeClass('fa-check fa-exclamation');
        $('.form-group').removeClass('has-error has-feedback');
        $('em').remove();
        
      });
    }
    function clickBoton() {
      $("#agregar_new").click(function() {
          $('#_method').remove();
          action = "usuarios";
      });

      $("#modif_new").click(function() {
          $('[name="password"]').each(function () {
              $(this).rules('remove');
          });
          var value = $("#id").val();
          action = "usuarios"+'/'+value;

      });
    }

    function load_news() {
      $('#usuario').empty();
      cargarTabla();
    }

    function eventosAttach() {
       

        $("body").on("click","button.editar",function(){
            $('#modif_new').show();
            $('#agregar_new').hide();
            $('.modal-title').html('Modificar usuario seleccionado');
            $('#form_new').append( "<input type='hidden' name='_method' id='_method' value='PUT'>" );
            
            var id = $(this).parent("td").prev("td").prev("td").prev("td").prev("td").text();
            var route = "usuarios"+'/'+id+'/edit';
            //console.log(route);
            $.get(route, function(res){
                console.log(res);
                $("#id").val(res.user_id);
                $("#name").val(res.name);
                $("#phone").val(res.phone);
                $("#email").val(res.email);
                
            });
        });

    }
    
    function init() {
      load_news();
      usarSelect2();
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