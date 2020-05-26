function correcto() {
  Swal.fire({
    icon: "success",
    title: "Bien echo",
    text: "Accion realizado con exito",
  });
}

function error() {
  Swal.fire({
    icon: "error",
    title: "Oops...",
    text: "¡Algo salió mal!",
  });
}

function correctoTime() {
  Swal.fire({
    icon: "success",
    title: "Accion realizada con exito",
    showConfirmButton: false,
    timer: 1500,
  });
}

function errorTime() {
  Swal.fire({
    icon: "error",
    title: "¡Algo salió mal!",
    showConfirmButton: false,
    timer: 1500,
  });
}

const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: "btn btn-success",
    cancelButton: "btn btn-danger",
  },
  buttonsStyling: false,
});

function opcion() {
  swalWithBootstrapButtons
    .fire({
      title: "Estas seguro?",
      text: "No podrás revertir esto!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Si, Eliminar!",
      cancelButtonText: "No, Cancelar!",
      reverseButtons: true,
    })
    .then((result) => {
      if (result.value) {
        swalWithBootstrapButtons.fire(
          "Eliminado!",
          "Su archivo ha sido eliminado.",
          "success"
        );
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          "Cancelado",
          "Tu archivo está seguro :)",
          "error"
        );
      }
    });
}
