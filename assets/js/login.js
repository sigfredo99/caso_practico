$("#formLogin").submit(function (e) {
  e.preventDefault();
  var email = $.trim($("#email").val());
  var password = $.trim($("#password").val());

  if (email.length == "" || password == "") {
    Swal.fire({
      icon: "warning",
      title: "Debe ingresar un usuario y/o password",
    });
    return false;
  } else {
    Swal.showLoading();
    $.ajax({
      url: "Actions/Auth/Login.php",
      type: "POST",
      datatype: "json",
      data: { email: email, password: password },
      success: function (data) {
        Swal.hideLoading();
        if (data == "null") {
          Swal.fire({
            icon: "error",
            title: "Usuario y/o password incorrecta",
          });
        } else {
          Swal.fire({
            icon: "success",
            title: "¡Conexión exitosa!",
            confirmButtonText: "Ingresar",
          }).then((result) => {
            if (result.value) {
              window.location.href = "clients.php";
            }
          });
        }
      },
    });
  }
});
