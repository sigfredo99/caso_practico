<div class="m-5">
    <button class="btn btn-outline-danger mb-4" onclick="history.back()">Regresar</button>
    <div class="card shadow border-0">
        <div class="card-header bg-success bg-pattern text-white">
            <h4 class="m-2">Nuevo Deposito: <?php echo $client['name'] ?></h4>
        </div>
        <div class="card-body m-4">
            <form id="createDeposit" action="Actions/Deposits/Save.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-4">
                        <label class="form-label">Número Contacto:</label>
                        <input class="form-control" id="channel_number" name="channel_number" type="text" value="<?php echo $client['phone'] ?>" required />
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label">Canal de Atención:</label>
                        <select class="form-select" id="channel_id" name="channel_id" required>
                            <?php
                            foreach ($channels as $channel) {
                            ?>
                                <option value="<?php echo $channel['id'] ?>"><?php echo $channel['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label">Banco:</label>
                        <select class="form-select" id="bank_id" name="bank_id" required>
                            <?php
                            foreach ($banks as $bank) {
                            ?>
                                <option value="<?php echo $bank['id'] ?>"><?php echo $bank['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-4">
                        <label class="form-label">Monto:</label>
                        <div class="input-group">
                            <span class="input-group-text">S/.</span>
                            <input id="amount" name="amount" type="number" class="form-control" required />
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <label class="form-label">Voucher:</label>
                        <input id="voucher" name="voucher" type="file" class="form-control" required />

                    </div>
                </div>
                <div class="mt-5 text-end">
                    <input type="hidden" name="client_id" name="client_id" value=" <?php echo $client['id'] ?>" />

                    <button onclick="history.back()" type="button" class="btn btn-danger">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>

</div>