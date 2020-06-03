var id = $("#val").data("estado");

console.log(id);
if (id === 1) {
swal({
    icon: "error",
    title: "Oops...",
    text: "¡Tipo de acceso no valido, por favor intente nuevamente!",
});
} else if (id === 2) {
swal({
    icon: "error",
    title: "Oops...",
    text:"Contraseña o correo invalido, por favor intente nuevamente!",
});
}
