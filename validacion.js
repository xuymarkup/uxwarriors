// Obtener referencia al campo de confirmación de contraseña
var confirm_password = document.getElementsByName("confirm_password")[0];

// Agregar validación oninput al campo de confirmación de contraseña
confirm_password.oninput = function () {
  var password = document.getElementsByName("password")[0].value;
  var confirm_password = this.value;

  // Enviar datos al servidor mediante AJAX
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "validar_pass.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
      var response = JSON.parse(this.responseText);
      if (response.valido) {
        confirm_password.setCustomValidity("");
      } else {
        confirm_password.setCustomValidity("Las contraseñas no coinciden");
      }
    }
  };
  xhr.send("password=" + password + "&confirm_password=" + confirm_password);
};
