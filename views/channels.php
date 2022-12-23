<div class="card shadow border-0 m-5">
    <div class="card-header bg-success bg-pattern text-white">
        <h4 class="m-2">Canales de Atención</h4>
    </div>
    <div class="card-body m-4">
        <div class="col-sm-12 text-end">

            <button id="btnAdd" type="button" class="btn btn-success mb-4">Nuevo Canal</button>
        </div>
        <div class="col-sm-12">
            <div class="table-responsive">
                <table id="tableChannels" class="table table-striped table-bordered table-condensed" style="width:100%">
                    <thead class="text-center">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($channels as $channel) {
                        ?>
                            <tr>
                                <td><?php echo $channel['id'] ?></td>
                                <td><?php echo $channel['name'] ?></td>
                                <td></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAddEdit" tabindex="-1" role="dialog" aria-labelledby="modalAddEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-pattern">
                <h5 class="modal-title" id="modalAddEditLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </button>
            </div>
            <form id="formChannels" class="needs-validation" novalidate>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control" id="name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnSave" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="assets/js/channels.js"></script>