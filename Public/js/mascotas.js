
        $(document).ready(function() {

            $.ajax({
                        url: '../Controllers/C_Mascotas.php',
                        data : { opcion: "mostrar" },
                        dataType: "json",
                        type : "POST",
                        success: function(respuesta) {    
                    
                        
                      $('#tablaMascotas').DataTable( {
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
                                { "data": 'idMascota' },
                                { "data": 'nombreMascota' },
                                { "data": 'tipoMascota' },
                                { "data": 'edadMascota' },
                                { "data": 'enfermedadesMascota' },
                                { "data": 'created_at' },
                                { "data": 'updated_at' },
                                {"defaultContent": "<td class='text-center'><button class='text-center btn btn-warning btnEditarMascota'>Editar</button>  <button class='text-center btn btn-danger btnBorrarMascota'>Borrar</button></td>"  }
                            ],

                        } );
                   

                },
                error: function() {
            
                    alert("Error al obtener los registros");
                }
            });


            $("#btnNuevaMascota").click(function(){
                $("#formMascotas").trigger("reset");
                $("#tipo").empty();
                $(".modal-header").css("background-color", "#1cc88a");
                $(".modal-header").css("color", "white");
                $(".modal-title").text("Nueva Mascota");
                $("#modalCRUDMascota").modal("show");
                $.ajax({
                    url: '../Controllers/C_Tipos.php',
                    type: "POST",
                    dataType: "json",
                    data: {opcion:"mostrar"},
                    success: function(data){ 
                        console.log(data);   
                        for (i=0; i<data.length; i++) {
                            $("#tipo").append('<option value="' + data[i].idTipo + '" data-id="'+ data[i].nombreTipo +'" >' + data[i].nombreTipo + '</option>');   
                        }    
                    }        
                });

                

                        
                id=null;
                opcion = "crear"; //alta
            });

            var fila; //capturar la fila para editar o borrar el registro
            
            //botón EDITAR    
            $(document).on("click", ".btnEditarMascota", function(){
                fila = $(this).closest("tr");
                id = parseInt(fila.find('td:eq(0)').text());
                nombre = fila.find('td:eq(1)').text();
                tipo = fila.find('td:eq(2)').text();
                edad = fila.find('td:eq(3)').text();
                enfermedades = fila.find('td:eq(4)').text();
             
                $("#id").val(id);
                $("#nombre").val(nombre);
                $("#tipo").val(tipo);
                $("#edad").val(edad);
                $("#enfermedades").val(enfermedades);
         
                
                opcion = "editar"; //editar
                
                $(".modal-header").css("background-color", "#4e73df");
                $(".modal-header").css("color", "white");
                $(".modal-title").text("Editar Mascota");            
                $("#modalCRUDMascota").modal("show");  
                
            });


            //botón BORRAR
            $(document).on("click", ".btnBorrarMascota", function(){    
                fila = $(this).closest("tr");
                id = parseInt(fila.find('td:eq(0)').text());
                opcion = "borrar"; //borrar
                var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+" ?");
                if(respuesta){
                    $.ajax({
                        url: '../Controllers/C_Mascotas.php',
                        dataType: "json",
                        type : "POST",
                        data: {opcion:opcion, id:id},
                        success: function(data){
                            $('#tablaMascotas').DataTable().row(fila).remove().draw();
                        }
                    });
                }   
            });

            $("#formMascotas").submit(function(e){
                e.preventDefault();   
                id = $.trim($("#id").val());
                nombre = $.trim($("#nombre").val());
                tipo = $.trim($("#tipo").val());
                edad = $.trim($("#edad").val());
                enfermedades = $.trim($("#enfermedades").val());
               
                
                if(nombre!= "" && tipo!= "" && edad!="" && edad >0 && enfermedades !=""){
                    
                   
                    $.ajax({
                        url: '../Controllers/C_Mascotas.php',
                        type: "POST",
                        dataType: "json",
                        data: {nombre:nombre, tipo:tipo, edad:edad, enfermedades:enfermedades, id:id, opcion:opcion},
                        success: function(data){ 
                          
                            if(opcion == 'crear'){
                                $('#tablaMascotas').DataTable().row.add(data[0]).draw();
                            }
                            else{
                                $('#tablaMascotas').DataTable().row(fila).data(data[0]).draw();
                            }            
                        }        
                    });
                    $("#modalCRUDMascota").modal("hide");
                }else{
                    alert("Para agregar una Mascota es necesario llenar todos los campos");
                }  
                
            }); 



        } );
