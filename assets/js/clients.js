$(document).ready(function () {
  tableClients = $("#tableClients").DataTable({
    columnDefs: [
      {
        targets: -1,
        data: null,
        defaultContent:
          "<div class='text-center'><div class='btn-group'><button class='btn btn-success btnShowDeposits'>Billetero Virtual</button><button class='btn btn-warning btnAddDeposit'>Nuevo Deposito</button><button class='btn btn-primary btnEdit'>Editar</button></div></div>",
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
    $("#formClients").trigger("reset");
    $(".modal-header").addClass("bg-success");
    $(".modal-header").addClass("text-white");
    $(".modal-title").text("Nuevo Cliente");
    $("#modalAddEdit").modal("show");
    id = null;
    action = 0; //Add
  });

  $("#formClients").submit(function (e) {
    e.preventDefault();
    let name = $.trim($("#name").val());
    let phone = $.trim($("#phone").val());
    let data = {
      name: name,
      phone: phone,
    };
    if (action == 1) data.id = id;
    $.ajax({
      url:
        action == 0 ? "Actions/Clients/Save.php" : "Actions/Clients/Edit.php",
      type: "POST",
      dataType: "json",
      data: data,
      success: function (data) {
        id = data[0].id;
        name = data[0].name;
        phone = data[0].phone;
        if (action == 0) {
          tableClients.row.add([id, name, phone]).draw();
        } else {
          tableClients.row(row).data([id, name, phone]).draw();
        }
      },
    });
    $("#modalAddEdit").modal("hide");
  });
});

let row;

$(document).on("click", ".btnEdit", function () {
  row = $(this).closest("tr");
  id = parseInt(row.find("td:eq(0)").text());
  let name = row.find("td:eq(1)").text();
  let phone = row.find("td:eq(2)").text();

  $("#name").val(name);
  $("#phone").val(phone);
  action = 1; //Edit

  $(".modal-header").addClass("bg-primary");
  $(".modal-header").addClass("text-white");
  $(".modal-title").text("Editar Cliente");
  $("#modalAddEdit").modal("show");
});

$(document).on("click", ".btnDelete", function () {
  row = $(this);
  id = parseInt($(this).closest("tr").find("td:eq(0)").text());
  opcion = 3; //borrar
  var response = confirm("¿Está seguro de eliminar el registro: " + id + "?");
  if (response) {
    $.ajax({
      url: "Actions/Clients/Delete.php",
      type: "POST",
      dataType: "json",
      data: { id: id },
      success: function () {
        tableClients.row(row.parents("tr")).remove().draw();
      },
    });
  }
});

$(document).on("click", ".btnShowDeposits", function () {
  id = parseInt($(this).closest("tr").find("td:eq(0)").text());
  window.location.href = "deposits.php?id=" + id;
});
$(document).on("click", ".btnAddDeposit", function () {
  id = parseInt($(this).closest("tr").find("td:eq(0)").text());
  window.location.href = "newDeposit.php?id=" + id;
});
