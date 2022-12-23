<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Depósito de Recargas | <?php echo $title; ?></title>
    <!-- CSS -->
    <link href="assets/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/datatables/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">
    <!-- JavaScript -->
    <script src="assets/js/jquery/jquery.js"></script>
    <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="assets/js/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/js/datatables/dataTables.bootstrap5.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</head>

<body class="bg-light">

    <?php include('views/components/navbar.php'); ?>

    <div class="m-4">
        <?php include($childView); ?>
    </div>
</body>

</html>