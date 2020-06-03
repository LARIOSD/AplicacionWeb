var id = $('#val').data('estado');


if(id == 0){
  swal({
    icon: "success",
    title: "Bien echo",
    text: "Se elimino el producto exitosamente",
  });
}else if(id==1){
  swal({
    icon: "error",
    title: "Oops...",
    text: "¡Este producto ya se encuentra registrado, por favor intente nuevamente!",
  });
}else if(id==2){
  swal({
    icon: "success",
    title: "Felicitaciones!",
    text: "¡El producto se creo Exitosamente!",
  });
}else if(id==3){
  swal({
    icon: "error",
    title: "Oops...",
    text: "¡No se pudo crear el producto, por favor intente nuevamente!",
  });
}else if(id==4){
  swal({
    icon: "success",
    title: "Felicitaciones!",
    text: "¡El producto se edito Exitosamente!",
  });
}else if(id==5){
  swal({
    icon: "error",
    title: "Oops...",
    text: "¡No se pudo editar el producto, por favor intente nuevamente!",
  });
}



