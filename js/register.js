$(document).ready(function () {
  
  $("#LimpiarCampos").click(funcLimpiarRegisterForm);
function funcLimpiarRegisterForm()
{
  $('#nombre').val("");
  $('#apellidos').val("");
  $('#nacimiento').val("");
  $('#carrera').val("");
  $('#semestre').val("");
  $('#matricula').val("");
  $('#password').val("");

}

//Registrar Usuario
$("#ButtonRegistroUsuario").click(funcRegistrarUsuario);
function funcRegistrarUsuario()
{
  var JSnombres =$('#nombre').val();
  var JSapellidos=$('#apellidos').val();
  var JSfechaNacimiento=$('#nacimiento').val();
  var JScarrera=$('#carrera').val();
  var JSsemestre=$('#semestre').val();
  var JSmatricula=$('#matricula').val();
  var JSpassword=$('#password').val();

$.ajax({

type: 'POST',
data:{
  funcion:"registrarUsuario",
  nombres: JSnombres,
  apellidos: JSapellidos,
  fechaNacimiento:JSfechaNacimiento,
  carrera:JScarrera,
  semestre:JSsemestre,
  matricula:JSmatricula,
  password:JSpassword
},
url: 'php/userAPI.php'
})
.done(function () {
})
.fail(function (data) {
  console.log(data);
}); 
}

  
});
  