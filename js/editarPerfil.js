
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




    $("#miSeccionPerfil").on('click', ".saveChanges", funcGuardarCambios);
    function funcGuardarCambios(){
    var form_data = new FormData();
    var file_data = $("#file-input").prop("files")[0];
    var nameAsesor = $('#nameAsesor').val();
    var carreraAsesor = $('#carreraAsesor').val(); 
    var infoAsesor = $('#infoAsesor').val();
    var materiaAsesor = $('#materiaAsesor').val(); 
    form_data.append("file", file_data);
    form_data.append("funcion", "actualizarUser");
    form_data.append("nameAsesor", nameAsesor);
    form_data.append("carreraAsesor", carreraAsesor);
    form_data.append("infoAsesor", infoAsesor);
    form_data.append("materiaAsesor", materiaAsesor);
    $.ajax({
        url: 'php/userAPI.php',
        type: 'POST',
        cache: false,
        contentType: false,
        data:form_data,
        dataType: 'JSON',
        enctype: 'multipart/form-data',
        processData: false
        
        })
        .done(function () {
        })
        .fail(function (data) {
        console.error(data);
        }); 
        alert("Perfil Actualizado");
        }

}
});

