
        $(document).ready(function() {

            $.ajax({
                        url: '../Controllers/C_Tipos.php',
                        data : { opcion: "mostrar" },
                        dataType: "json",
                        type : "POST",
                        success: function(respuesta) {    
                        
                      $('#tablaTipos').DataTable( {
                            "language": {
                                "lengthMenu": "Mostrar _MENU_ registros",
                                "zeroRecords": "No se encontraron resultados",
                                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                                "sSearch": "Buscar:",
                                "oPaginate": {
                                    "sFirst": "Primero",
                                    "sLast":"Último",
                                    "sNext":"Siguiente",
                                    "sPrevious": "Anterior"
                                },
                                "sProcessing":"Procesando...",
                            },
                            "data": respuesta,
                            
                            "columns": [
                                { "data": 'idTipo' },
                                { "data": 'nombreTipo' },
                                {"defaultContent": "<td class='text-center'><button class='text-center btn btn-warning btnEditarTipo'>Editar</button>  <button class='text-center btn btn-danger btnBorrarTipo'>Borrar</button></td>"  }
                            ],

                        } );
                   

                },
                error: function() {
            
                    alert("Error al obtener los registros");
                }
            });


            $("#btnNuevoTipo").click(function(){
                $("#formTipos").trigger("reset");
                $(".modal-header").css("background-color", "#1cc88a");
                $(".modal-header").css("color", "white");
                $(".modal-title").text("Nuevo Tipo");            
                $("#modalCRUDTipo").modal("show");        
                id=null;
                opcion = "crear"; //alta
            });

            var fila; //capturar la fila para editar o borrar el registro
            
            //botón EDITAR    
            $(document).on("click", ".btnEditarTipo", function(){
                fila = $(this).closest("tr");
                id = parseInt(fila.find('td:eq(0)').text());
                nombre = fila.find('td:eq(1)').text();
               
             
                $("#id").val(id);
                $("#nombre").val(nombre);
         
                opcion = "editar"; //editar
                
                $(".modal-header").css("background-color", "#4e73df");
                $(".modal-header").css("color", "white");
                $(".modal-title").text("Editar Tipo");            
                $("#modalCRUDTipo").modal("show");  
                
            });


            //botón BORRAR
            $(document).on("click", ".btnBorrarTipo", function(){    
                fila = $(this).closest("tr");
                id = parseInt(fila.find('td:eq(0)').text());
                opcion = "borrar"; //borrar
                var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+" ?");
                if(respuesta){
                    $.ajax({
                        url: '../Controllers/C_Tipos.php',
                        dataType: "json",
                        type : "POST",
                        data: {opcion:opcion, id:id},
                        success: function(data){
                         
                            $('#tablaTipos').DataTable().row(fila).remove().draw();
                           
                        }
                    });
                }   
            });

            $("#formTipos").submit(function(e){
                e.preventDefault();   
                id = $.trim($("#id").val());
                nombre = $.trim($("#nombre").val());
               
                console.log(nombre);
                
                if(nombre!= ""){
                    
                    $.ajax({
                        url: '../Controllers/C_Tipos.php',
                        type: "POST",
                        dataType: "json",
                        data: {nombre:nombre, id:id, opcion:opcion},
                        success: function(data){ 
                         
                            console.log(data);
                            if(opcion == 'crear'){
                                $('#tablaTipos').DataTable().row.add(data[0]).draw();
                            }
                            else{
                                $('#tablaTipos').DataTable().row(fila).data(data[0]).draw();
                            }            
                        }        
                    });
                    $("#modalCRUDTipo").modal("hide");
                }else{
                    alert("El Tipo de Mascota debe de tener un nombre");
                }  
                
            }); 



        } );
