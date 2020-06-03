var id = $('#val').data('estado');


if(id == 0){
  swal({
    icon: "success",
    title: "Bien echo",
    text: "Se elimino el usuario exitosamente",
  });
}else if(id==1){
  swal({
    icon: "error",
    title: "Oops...",
    text: "¡Este correo ya se encuentra registrado, por favor intente nuevamente!",
  });
}else if(id==2){
  swal({
    icon: "success",
    title: "Felicitaciones!",
    text: "¡El usuario se creo Exitosamente!",
  });
}else if(id==3){
  swal({
    icon: "error",
    title: "Oops...",
    text: "¡No se pudo crear el usuario, por favor intente nuevamente!",
  });
}else if(id==4){
  swal({
    icon: "success",
    title: "Felicitaciones!",
    text: "¡El usuario se edito Exitosamente!",
  });
}else if(id==5){
  swal({
    icon: "error",
    title: "Oops...",
    text: "¡No se pudo editar el usuario, por favor intente nuevamente!",
  });
}



