$('#carrera').select2({       
           dropdownParent: $("#myModal")
        });
        /* Formatting function for row details - modify as you need */
        function format ( d ) {
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
        $(function() {
        $('#alta').click(function(){
                $('#modif_new').hide();
                $('#agregar_new').show();
                $('#_method').remove();
                $('#photo_mm').remove();
                $('.modal-title').html('Registrar nuevo contenido');                
            });
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
                    publication_date: {
                        required: true
                    },
                    end_publication: {
                        required: true
                    }
                },
                messages: {
                  title: {
                    required: "Por favor ingrese un título",
                    minlength: "El título del curso debe contener como minimo 5 caracteres"
                  },
                  pompadour: {
                    required: "Por favor ingrese un subtítulo",
                    minlength: "Debe contener una minima descripción no debe quedar vacio"
                  },
                  body: {
                    required: "Por favor ingrese una descripción para el contenido",
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
                submitHandler: function(form) {
                    var token = $('input:hidden[name=_token]').val();
                    $.ajax({
                        url:action,
                        type:'POST',
                        headers:{'X-CSRF-TOKEN':token},
                        type: "POST",
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
            
            //Removing the error and success elements from the from-group
            $("#myModal").on('hidden.bs.modal', function () {
              $(this).find("#title,#pompadour,#publication_date,#end_publication, textarea, :file").val('').end();
              $('.form-group').removeClass('has-success has-feedback');
              $('span').removeClass('glyphicon-ok glyphicon-remove');
              $('.form-group').removeClass('has-error has-feedback');
              $('em').remove();              
            });
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
            
            load_news();
        })
        var load_news = function (){
            var opcion_listado = $('.table-responsive').attr("id");
            $('#new').empty();
            var table = $('#new').DataTable({
                "destroy":true,
                "order":[[0,"asc"]],
                "lengthChange": true,
                "language":{
                    "url": "../plugins/datatables/Spanish.json"
                },               
                "ajax":{
                    "method":"GET",
                    "url":opcion_listado,
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
                    "defaultContent":"<button type='button' id='editar' class='editar btn btn-danger' data-toggle='modal' data-target='#myModal'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Editar</button>" 
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
        $("body").on("click","button.editar",function(){
            $('#modif_new').show();
            $('#agregar_new').hide();
            $('.modal-title').html('Modificar contenido seleccionado');
            $('#form_new').append( "<input type='hidden' name='_method' id='_method' value='PUT'>" );
            var id = $(this).parent("td").prev("td").prev("td").prev("td").prev("td").text();
            var route = "noticias"+'/'+id+'/edit';
            $.get(route, function(res){
                $("#id").val(res.new_id);
                $("#title").val(res.title);
                $("#pompadour").val(res.pompadour);
                $("#body").val(res.body);
                $("#photo_mm").attr('src', '../'+res.photo);
                $("#publication_date").val(res.publication_date);
                $("#end_publication").val(res.end_publication);            
            });
        });
