$(document).ready(function () {
  tableClients = $("#tableDeposits").DataTable({
    columnDefs: [
      {
        targets: -1,
        data: null,
        defaultContent:
          "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEdit'>Editar</button><button class='btn btn-warning btnHistory'>Historial de Correcciones</button></div></div>",
      },
    ],

    language: {
      lengthMenu: "Mostrar _MENU_ registros",
      zeroRecords: "No se encontraron resultados",
      info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      infoFiltered: "(filtrado de un total de _MAX_ registros)",
      sSearch: "Buscar:",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      sProcessing: "Procesando...",
    },
  });

  $("#btnAdd").click(function () {
    let id = $("#client_id").val();
    window.location.href = "newDeposit.php?id=" + id;
  });

  $(".btnEdit").click(function () {
    id = parseInt($(this).closest("tr").find("td:eq(0)").text());
    window.location.href = "editDeposit.php?id=" + id;
  });
  $(".btnHistory").click(function () {
    id = parseInt($(this).closest("tr").find("td:eq(0)").text());
    window.location.href = "corrections.php?id=" + id;
  });
});
