<?php require_once "V_Parte_Superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
        <h1 class="text-center">Mascotas</h1>
        <div class="row">
            <div class="col-sm-2">
                
            </div>
            <div class="col-sm-4">
                <button type="button" class="btn btn-success" data-toggle="modal" id="btnNuevaMascota">Agregar Mascota</button>
            </div>
            <div class="col-sm-4">
                
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm">
                
            </div>
            <div class="col-sm-10 col-lg-8">


            <div class="table-responsive">        
                        <table id="tablaMascotas" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th class="bg-info">Id</th>
                                <th class="bg-info">Nombre</th>
                                <th class="bg-info">Tipo</th>
                                <th class="bg-info">Edad</th>
                                <th class="bg-info">Enfermedades</th>
                                <th class="bg-info">Creado</th>
                                <th class="bg-info">Actualizado</th>
                                <th class="text-center bg-info">Acciones</th>
                            </tr>
                        </thead>
                              
                       </table>                    
            </div>

            

            </div>
            <div class="col-sm">
              
            </div>
        </div>

                <!--Modal para CRUD-->
        <div class="modal fade" id="modalCRUDMascota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nueva Mascota</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <form id="formMascotas">    
                    <div class="modal-body"> 
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id" readonly>
                            <label for="nombre" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre">
                        </div>
                        <div class="form-group">
                            <label for="tipo" class="col-form-label">Tipo:</label>
                            <select class="form-control" id="tipo">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edad" class="col-form-label">Edad (en meses):</label>
                            <input type="number" class="form-control" id="edad">
                        </div>
                        <div class="form-group">
                            <label for="enfermedades" class="col-form-label">Enfermedades:</label>
                            <input type="text" class="form-control" id="enfermedades">
                        </div>      
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGuardarMascota" class="btn btn-success">Guardar</button>
                    </div>
                </form>    
                </div>
            </div>
        </div>  

        
    </div>
 
<?php require_once "V_Parte_Inferior.php"?>


<script type="text/javascript" src="../Public/js/mascotas.js"></script>


