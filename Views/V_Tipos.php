<?php require_once "V_Parte_Superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
        <h1 class="text-center">Tipos de Mascotas</h1>
        <div class="row">
            <div class="col-sm-2">
                
            </div>
            <div class="col-sm-4">
                <button type="button" class="btn btn-success" data-toggle="modal" id="btnNuevoTipo">Agregar Tipo</button>
            </div>
            <div class="col-sm-4">
                
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm">
                
            </div>
            <div class="col-sm-10 col-lg-8">


            <div class="table-responsive">        
                        <table id="tablaTipos" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th class="bg-info">Id</th>
                                <th class="bg-info">Tipo</th>
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
        <div class="modal fade" id="modalCRUDTipo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nuevo Tipo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <form id="formTipos">    
                    <div class="modal-body"> 
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id" readonly>
                            <label for="nombre" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre">
                        </div>            
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGuardarTipo" class="btn btn-success">Guardar</button>
                    </div>
                </form>    
                </div>
            </div>
        </div>  

        
    </div>
 
<?php require_once "V_Parte_Inferior.php"?>


<script type="text/javascript" src="../Public/js/tipos.js"></script>


