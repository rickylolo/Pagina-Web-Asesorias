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

  if(JSnombres != "" && JSapellidos != "" && JSfechaNacimiento != "" && JScarrera != "" && JSsemestre != "" && JSmatricula != "" && JSpassword != ""){
    alert("Registro Exitoso")
  }
}
});
  