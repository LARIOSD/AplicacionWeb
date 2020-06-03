var id = $('#val').data('estado');

console.log(id);
if(id === 2){
  swal({
    icon: "success",
    title: "Felicitaciones!",
    text: "El usuario se creo de manera correcta",
  });
}else if(id === 1){
  swal({
    icon: "error",
    title: "Oops...",
    text: "¡Las contraseñas no son iguales, por favor intente nuevamente!",
  });
}else if(id===0){
  swal({
    icon: "error",
    title: "Oops...",
    text: "Este correo ya se encuentra registrado, por favor intente nuevamente!"
  })
}
