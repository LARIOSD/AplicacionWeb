function readImageA(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $("#imga").attr("src", e.target.result); // Renderizamos la imagen
    };
    reader.readAsDataURL(input.files[0]);
  }
}

$("#subirImga").change(function () {
  // Código a ejecutar cuando se detecta un cambio de archivO
  readImageA(this);
});
