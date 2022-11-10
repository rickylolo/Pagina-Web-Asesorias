
 $(document).ready(function () {
    datosUser();
    
    //OBTENER DATOS USER
    function datosUser(){
       var miId = $("#miUserIdActual").val();
       if(miId != null){
        $.ajax({
          type: 'POST',
          data: {funcion: "obtenerMiUser"},
          url: 'php/userAPI.php',
      })
      .done(function (data) {
        var items = JSON.parse(data);
        if(items[0].fotoPerfil != ""){
           document.getElementById("img-foto").src ='data:image/jpeg;base64,'+items[0].fotoPerfil;
        }else{
           document.getElementById("img-foto").src ='imgs/usuario.png';
        }
   
        $('#nameAsesor').val(items[0].nombres);
        $('#carreraAsesor').val(items[0].carrera);
        $('#infoAsesor').val(items[0].descripcionUsuario);
        $('#materiaAsesor').val(items[0].materiaAsesoria);
   
        })
        .fail(function (data) {
          console.error(data);
      });
       }
    }
});

