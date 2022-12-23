<div class="m-5">
    <a class="btn btn-outline-danger mb-4" href="clients.php">Regresar</a>

    <div class="row mb-3">
        <div class="col-sm-3">
            <h2 class="card border-0 shadow bg-warning text-white p-4">Nombre: <b><?php echo $client['name'] ?></b></h2>
        </div>
        <div class="col-sm-3">
            <h2 class="card border-0 shadow bg-success text-white p-4">Saldo Actual: <b>S/. <?php echo $balance ?></b></h2>
        </div>
        <div class="col-sm-3">
            <h2 class="card border-0 shadow bg-primary text-white p-4">Banco Preferido: <b><?php echo $mostUsedBank ?></b></h2>
        </div>
        <div class="col-sm-3">
            <h2 class="card border-0 shadow bg-black text-white p-4">Canal Preferido: <b><?php echo $mostUsedChannel ?></b></h2>
        </div>
    </div>

    <div class="card shadow border-0">
        <div class="card-header bg-success bg-pattern text-white">
            <h4 class="m-2">Depositos del Cliente </h4>
        </div>
        <div class="card-body m-4">
            <div class="col-sm-12 text-end">
                <button id="btnAdd" type="button" class="btn btn-success mb-4">Nuevo Deposito</button>
            </div>
            <div class="col-sm-12">

                <div class="table-responsive">
                    <table id="tableDeposits" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Monto</th>
                                <th>Número Contacto</th>
                                <th>Banco</th>
                                <th>Canal</th>
                                <th>Voucher</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($deposits as $deposit) {
                            ?>
                                <tr>
                                    <td><?php echo $deposit['id'] ?></td>
                                    <td>S/. <?php echo $deposit['amount'] ?></td>
                                    <td><?php echo $deposit['channel_number'] ?></td>
                                    <td><?php echo $deposit['bank_name'] ?></td>
                                    <td><?php echo $deposit['channel_name'] ?></td>
                                    <td class="text-center"><a target="_blank" href="./public/vouchers/<?php echo $deposit['voucher'] ?>"><img style="    height: 80px;" src="./public/vouchers/<?php echo $deposit['voucher'] ?>" /></a></td>
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
    <input type="hidden" id="client_id" value="<?php echo $client['id'] ?>" />
</div>

<script src="assets/js/deposits.js"></script>