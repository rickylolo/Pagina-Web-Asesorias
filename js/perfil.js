
 $(document).ready(function () {
 datosUser();
 //OBTENER IMAGEN USER
 function datosUser(){
    var miId = $("#miUserIdActual").val();
    if(miId != null){
     $.ajax({
       type: 'POST',
       data: {funcion: "obtenerMiUser"},
       url: 'php/user_API.php',
   })
   .done(function (data) {
     var items = JSON.parse(data);
     document.getElementById("pfp").src ='data:image/jpeg;base64,'+items[0].user_IMG;
     })
     .fail(function (data) {
       console.error(data);
   });
 }
}
});

