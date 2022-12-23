<div class="m-5">
    <a class="btn btn-outline-danger mb-4" href="deposits.php?id=<?php echo $deposit['client_id'] ?>">Regresar</a>

    <div class="card shadow border-0">
        <div class="card-header bg-success bg-pattern text-white">
            <h4 class="m-2">Historial de Correcciones </h4>
        </div>
        <div class="card-body m-4">
            <div class="col-sm-12">

                <div class="table-responsive">
                    <table id="tableCorrections" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Razon</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($corrections as $correction) {
                            ?>
                                <tr>
                                    <td><?php echo $correction['id'] ?></td>
                                    <td><?php echo $correction['reason'] ?></td>
                                    <td><?php echo $correction['date'] ?></td>
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
</div>
<script src="assets/js/corrections.js"></script>