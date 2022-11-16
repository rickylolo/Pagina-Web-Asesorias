$(document).ready(function () {
  let monthNames = [
    "Enero",
    "Febrero",
    "Marzo",
    "Abril",
    "Mayo",
    "Junio",
    "Julio",
    "Agosto",
    "Septiembre",
    "Octubre",
    "Noviembre",
    "Diciembre",
  ]; //Defino mi arreglo de meses
  datosUser(); // Llamo la funcion para cargar mis datos del usuario
  calendario(); //Llamo la funcion de mi calendario
  datosCalendario(); //Mi funcion para identificar los dias con asesorias
  //Obtener mis datos calendario
  function datosCalendario() {
    $.ajax({
      type: "POST",
      data: { funcion: "getTotalAsesorias" },
      url: "php/asesoriaAPI.php",
    })
      .done(function (data) {
        var JSON_Dia = "";
        var JSON_Mes = "";
        var JSON_Año = "";
        var Cal_MesActual = $("#month").text();
        Cal_MesActual = monthNames.indexOf(Cal_MesActual) + 1;
        var Cal_AñoActual = $("#year").text();
        var items = JSON.parse(data);
        for (var i = 0; i < items.length; i++) {
          JSON_Año = items[i].fecha.substring(0, 4);
          JSON_Mes = items[i].fecha.substring(5, 7);
          JSON_Dia = items[i].fecha.substring(8, 10);
          if (JSON_Dia < 10) {
            JSON_Dia = JSON_Dia.substring(1, 2);
          }

          if (Cal_AñoActual == JSON_Año && Cal_MesActual == JSON_Mes) {
            if (items[i].totalHoras >= 1 && items[i].totalHoras <= 10) {
              $(".calendar__item")
                .filter(function () {
                  return $(this).text() === JSON_Dia;
                })
                .css("background-color", "#17ff02");
            }
            if (items[i].totalHoras >= 11 && items[i].totalHoras <= 17) {
              $(".calendar__item")
                .filter(function () {
                  return $(this).text() === JSON_Dia;
                })
                .css("background-color", "#ff9900");
            }
            if (items[i].totalHoras == 18) {
              $(".calendar__item")
                .filter(function () {
                  return $(this).text() === JSON_Dia;
                })
                .css("background-color", "#ff0000");
            }
          }
        }
      })
      .fail(function (data) {
        console.error(data);
      });
  }

  function calendario() {
    let currentDate = new Date();
    let currentDay = currentDate.getDate();
    let monthNumber = currentDate.getMonth();
    let currentYear = currentDate.getFullYear();

    let dates = document.getElementById("dates");
    let month = document.getElementById("month");
    let year = document.getElementById("year");

    let prevMonthDOM = document.getElementById("prev-month");
    let nextMonthDOM = document.getElementById("next-month");

    month.textContent = monthNames[monthNumber];
    year.textContent = currentYear.toString();

    prevMonthDOM.addEventListener("click", () => lastMonth());
    nextMonthDOM.addEventListener("click", () => nextMonth());

    const writeMonth = (month) => {
      for (let i = startDay(); i > 0; i--) {
        dates.innerHTML += ` <button type="button" class="calendar__date calendar__item calendar__last-days">
                  ${getTotalDays(monthNumber - 1) - (i - 1)}
              </button>`;
      }

      for (let i = 1; i <= getTotalDays(month); i++) {
        if (i === currentDay) {
          dates.innerHTML += ` <button type="button" class="calendar__date calendar__item calendar__today">${i}</button>`;
        } else {
          dates.innerHTML += ` <button type="button" class="calendar__date calendar__item">${i}</button>`;
        }
      }
    };

    const getTotalDays = (month) => {
      if (month === -1) month = 11;

      if (
        month == 0 ||
        month == 2 ||
        month == 4 ||
        month == 6 ||
        month == 7 ||
        month == 9 ||
        month == 11
      ) {
        return 31;
      } else if (month == 3 || month == 5 || month == 8 || month == 10) {
        return 30;
      } else {
        return isLeap() ? 29 : 28;
      }
    };

    const isLeap = () => {
      return (
        (currentYear % 100 !== 0 && currentYear % 4 === 0) ||
        currentYear % 400 === 0
      );
    };

    const startDay = () => {
      let start = new Date(currentYear, monthNumber, 1);
      return start.getDay() - 1 === -1 ? 6 : start.getDay() - 1;
    };

    const lastMonth = () => {
      if (monthNumber !== 0) {
        monthNumber--;
      } else {
        monthNumber = 11;
        currentYear--;
      }

      setNewDate();
    };

    const nextMonth = () => {
      if (monthNumber !== 11) {
        monthNumber++;
      } else {
        monthNumber = 0;
        currentYear++;
      }

      setNewDate();
    };

    const setNewDate = () => {
      currentDate.setFullYear(currentYear, monthNumber, currentDay);
      month.textContent = monthNames[monthNumber];
      year.textContent = currentYear.toString();
      dates.textContent = "";
      writeMonth(monthNumber);
    };

    writeMonth(monthNumber);
  }
  // ABRIR MODAL ASESORIAS
  $("#dates").on("click", ".calendar__item", funcMostrarModal);
  function funcMostrarModal() {
    var miMesSeleccionado = $(this)
      .parent()
      .parent()
      .children(".calendar__info")
      .children("#month")
      .text();
    var miAñoSeleccionado = $(this)
      .parent()
      .parent()
      .children(".calendar__info")
      .children("#year")
      .text();
    var miMes = monthNames.indexOf(miMesSeleccionado);
    var miMes = miMes + 1;
    var miDia = $(this).text();
    if (miDia < 10) {
      miDia = "0" + miDia;
    }
    if (miMes < 10) {
      miMes = "0" + miMes;
    }
    var miFecha = miAñoSeleccionado + "-" + miMes + "-" + miDia;
    var miFechaShow = miDia + "/" + miMesSeleccionado + "/" + miAñoSeleccionado;
    $("#miDiaSeleccionado").val(miFecha);
    $("#miDiaSeleccionadoMostrar").text(miFechaShow);

    // Cargar Asesorias
    $.ajax({
      type: "POST",
      data: { funcion: "getAsesoriasDia", dia: miFecha },
      url: "php/asesoriaAPI.php",
    })
      .done(function (data) {
        var items = JSON.parse(data);
        console.log(items);
        if (items.length == 0) {
          // y le cambio el texto moviendome con el DOM y usando JQUERY
          $(".list-group-item")
            .filter(function () {
              return $(this);
            })
            .children(".miEstado")
            .text("No hay asesorias asignadas");

          $(".list-group-item")
            .filter(function () {
              return $(this);
            })
            .children(".miAsesorAsignado")
            .text(" ");

          $(".list-group-item")
            .filter(function () {
              return $(this);
            })
            .children(".d-flex")
            .children(".text-muted")
            .children(".badge")
            .text("Disponible");

          $(".list-group-item")
            .filter(function () {
              return $(this);
            })
            .children(".d-flex")
            .children(".text-muted")
            .children(".badge")
            .removeClass("bg-secondary");

          $(".list-group-item")
            .filter(function () {
              return $(this);
            })
            .children(".d-flex")
            .children(".text-muted")
            .children(".badge")
            .addClass("bg-success");

          $(".list-group-item")
            .filter(function () {
              return $(this);
            })
            .children(".miAsesorAsignado")
            .attr("id", " ");

          $(".list-group-item")
            .filter(function () {
              return $(this);
            })
            .attr("id", " ");
        } else {
          for (var i = 0; i < items.length; i++) {
            $(".misHoras")
              .filter(function () {
                return $(this).text() === items[i].hora;
              })
              .parent()
              .parent()
              .children(".miEstado")
              .text(items[i].nombreMateria);

            $(".misHoras")
              .filter(function () {
                return $(this).text() === items[i].hora;
              })
              .parent()
              .parent()
              .children(".miAsesorAsignado")
              .text("Impartido por:" + items[i].nombreCompleto);

            $(".misHoras")
              .filter(function () {
                return $(this).text() === items[i].hora;
              })
              .parent()
              .children(".text-muted")
              .children(".badge")
              .text("No disponible");

            $(".misHoras")
              .filter(function () {
                return $(this).text() === items[i].hora;
              })
              .parent()
              .children(".text-muted")
              .children(".badge")
              .removeClass("bg-success");

            $(".misHoras")
              .filter(function () {
                return $(this).text() === items[i].hora;
              })
              .parent()
              .children(".text-muted")
              .children(".badge")
              .addClass("bg-secondary");

            $(".misHoras")
              .filter(function () {
                return $(this).text() === items[i].hora;
              })
              .parent()
              .parent()
              .children(".miAsesorAsignado")
              .attr("id", items[i].Usuario_id);

            $(".misHoras")
              .filter(function () {
                return $(this).text() === items[i].hora;
              })
              .parent()
              .parent()
              .attr("id", items[i].Asesoria_id);
          }
        }
      })
      .fail(function (data) {
        console.error(data);
      });
    $("#myModal").modal("show");
  }

  // ABRIR MODAL MATERIAS
  $("#misAsesorias").on("click", ".list-group-item", funcMostrarModalMateria);
  function funcMostrarModalMateria() {
    var miEstado = $(this).children(".miEstado").text();
    var miIdActual = $("#miUserIdActual").val();
    var miIdAsesoria = $(this).attr("id");
    var miUserAsesoria = $(this).children(".miAsesorAsignado").attr("id"); //$(this) es el lugar en el que estoy en este momento en este caso el .list-group-item me voy al hijo de este con la clase .miAsesorAsignado y obtengo su atributo id
    if (miIdActual == miUserAsesoria) {
      if (confirm("¿Desea eliminar esta asesoria?")) {
        // Si confirmo entro a el if ya que e valor de retorno es un booleano

        // Eliminar asesoria
        $.ajax({
          type: "POST",
          data: { funcion: "eliminarAsesoria", id: miIdAsesoria },
          url: "php/asesoriaAPI.php",
        })
          .done(function () {
            //Identifico mi campo con la clase .list-group-item que su id sea el que elimine
            // y le cambio el texto moviendome con el DOM y usando JQUERY
            $(".list-group-item")
              .filter(function () {
                return $(this).attr("id") === miIdAsesoria;
              })
              .children(".miEstado")
              .text("No hay asesorias asignadas");

            $(".list-group-item")
              .filter(function () {
                return $(this).attr("id") === miIdAsesoria;
              })
              .children(".miAsesorAsignado")
              .text(" ");

            $(".list-group-item")
              .filter(function () {
                return $(this).attr("id") === miIdAsesoria;
              })
              .children(".d-flex")
              .children(".text-muted")
              .children(".badge")
              .text("Disponible");

            $(".list-group-item")
              .filter(function () {
                return $(this).attr("id") === miIdAsesoria;
              })
              .children(".d-flex")
              .children(".text-muted")
              .children(".badge")
              .removeClass("bg-secondary");

            $(".list-group-item")
              .filter(function () {
                return $(this).attr("id") === miIdAsesoria;
              })
              .children(".d-flex")
              .children(".text-muted")
              .children(".badge")
              .addClass("bg-success");

            $(".list-group-item")
              .filter(function () {
                return $(this).attr("id") === miIdAsesoria;
              })
              .children(".miAsesorAsignado")
              .attr("id", " ");

            $(".list-group-item")
              .filter(function () {
                return $(this).attr("id") === miIdAsesoria;
              })
              .attr("id", " ");
            alert("Asesoria eliminada exitosamente");
          })
          .fail(function (data) {
            console.error(data);
          });
        datosCalendario(); // Vuelvo a cargar mis datos del
      }

      return;
    }

    if (miEstado != "No hay asesorias asignadas") {
      alert("Asesoria Ocupada");
      return;
    }
    var miHora = $(this).children(".d-flex").children(".misHoras").text();
    $("#miHoraSeleccionado").val(miHora);
    $("#myModal").modal("hide");
    $("#myModalMateria").modal("show");
  }
  //OBTENER DATOS USER
  function datosUser() {
    var miId = $("#miUserIdActual").val();
    if (miId != null) {
      $.ajax({
        type: "POST",
        data: { funcion: "obtenerMiUser" },
        url: "php/userAPI.php",
      })
        .done(function (data) {
          var items = JSON.parse(data);
          if (items[0].fotoPerfil != "") {
            document.getElementById("img-foto").src =
              "data:image/jpeg;base64," + items[0].fotoPerfil;
          } else {
            document.getElementById("img-foto").src = "imgs/usuario.png";
          }

          $("#nameAsesor").val(items[0].nombres);
          $("#carreraAsesor").val(items[0].carrera);
          $("#infoAsesor").val(items[0].descripcionUsuario);
          $("#materiaAsesor").val(items[0].materiaAsesoria);
        })
        .fail(function (data) {
          console.error(data);
        });
    }
  }
  $("#miSeccionPerfil").on("click", ".saveChanges", funcGuardarCambios);
  function funcGuardarCambios() {
    var form_data = new FormData();
    var file_data = $("#file-input").prop("files")[0];
    var nameAsesor = $("#nameAsesor").val();
    var carreraAsesor = $("#carreraAsesor").val();
    var infoAsesor = $("#infoAsesor").val();
    var materiaAsesor = $("#materiaAsesor").val();
    form_data.append("file", file_data);
    form_data.append("funcion", "actualizarUser");
    form_data.append("nameAsesor", nameAsesor);
    form_data.append("carreraAsesor", carreraAsesor);
    form_data.append("infoAsesor", infoAsesor);
    form_data.append("materiaAsesor", materiaAsesor); //Obtengo los datos de mi formulario y los guardo en una variable FormData
    $.ajax({
      //Hago mi llamada asincrona con AJAX (para no recargar la pagina)
      url: "php/userAPI.php",
      type: "POST",
      cache: false,
      contentType: false,
      data: form_data,
      dataType: "JSON",
      enctype: "multipart/form-data", //Importante para guardar imagenes
      processData: false,
    })
      .done(function (data) {})
      .fail(function (data) {
        console.error(data);
      });
    alert("Perfil Actualizado");
  }

  //Limpiar Campos Asesoria
  $("#limpiarCamposAsesoria").click(funcLimpiarCamposAsesoria);
  function funcLimpiarCamposAsesoria() {
    $("#nombreMateria").val(""); //Uso JQUERY para limpiar mis campos con su respectivo id
    $("#Descripcion").val("");
    $("#Lugar").val("");
    $("#Costo").val("");
  }

  //Registrar Asesoria
  $("#GuardarAsesoria").click(funcGuardarAsesoria);
  function funcGuardarAsesoria() {
    var nombreMateria = $("#nombreMateria").val(); // Obtengo mis datos con JQUERY
    var Descripcion = $("#Descripcion").val();
    var Lugar = $("#Lugar").val();
    var Costo = $("#Costo").val();
    var dia = $("#miDiaSeleccionado").val();
    var hora = $("#miHoraSeleccionado").val();

    if (
      nombreMateria != "" &&
      Descripcion != "" &&
      Lugar != "" &&
      Costo != ""
    ) {
      //Verifico que mis datos esten completos para Seguir con el programa
      funcLimpiarCamposAsesoria();
      var form_data = new FormData();
      form_data.append("funcion", "registrarAsesoria");
      form_data.append("nombreMateria", nombreMateria);
      form_data.append("Descripcion", Descripcion);
      form_data.append("Lugar", Lugar);
      form_data.append("Costo", Costo);
      form_data.append("dia", dia);
      form_data.append("hora", hora);
      $.ajax({
        // LLamada asincrona para registro de asesorias
        url: "php/asesoriaAPI.php",
        type: "POST",
        cache: false,
        contentType: false,
        data: form_data,
        dataType: "JSON",
        processData: false,
      })
        .done(function (data) {})
        .fail(function (data) {});
      alert("Asesoria Generada Exitosamente");
      datosCalendario();
      return;
    }
    alert("Favor de llenar todos los campos");
  }

  $("#prev-month").click(datosCalendario); //Cada vez que avanzo o retrocedo en el calendario llamo la funcion de mis asesorias en el mes
  $("#next-month").click(datosCalendario);
});
