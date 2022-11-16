<?php
session_start(); // Inicio mi sesion PHP

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/stylePerfil.css">
  <link rel="stylesheet" href="css/calendar.css">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <script src="js/jquery-3.6.0.js"></script>
  <script src="js/perfil.js"></script>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css2?family=Silkscreen:wght@700&display=swap" rel="stylesheet" />
  <title>Perfil</title>
</head>

<body>
  <?php
  if ($_SESSION != NULL) { // Si mi sesion no es nula significa que un usuario inicio sesion
    echo '<input type="hidden" value="' . $_SESSION['Usuario_id'] . '" id="miUserIdActual">'; // Valor del id del usuario en un campo invisible
  }
  ?>
  <div class="full-height">
    <header class="header">
      <img src="imgs/logo.jpg" alt="image" class="logo">



      <h1 class="title">Pagina web de Asesorias</h1>
      <div class="dropdown">
        <button class="btn btn-outline-light btn-lg" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          <h1><i class="bi bi-list"></i></h1>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="main-nav-link" href="editarPerfil.php">Editar</a></li>
          <li><a class="main-nav-link" href="index.php?logout=true">Salir</a></li>
        </ul>
      </div>

      <button class="btn-mobile-nav" id="btn-mob">
        <ion-icon class="icon--nav" name="menu-outline"></ion-icon>
        <ion-icon class="icon--nav" name="close-outline"></ion-icon>
      </button>
      <nav class="main-nav">
        <ul class="main-nav-list">

        </ul>
      </nav>
    </header>



    <div class="section-hero">
      <div class="container" id="miSeccionPerfil">
        <form class="cta-form" method="POST">

          <div class="row">
            <div class="col-3 asesor-img m-0 row justify-content-center align-items-center">

              <div class="col-auto">
                <img src="" id="img-foto" alt="asesor-img" width="250px" height="250px">
              </div>


            </div>
            <div class="col-9">

              <h1>Nombre del asesor</h1>

              <input type="text" class="form-control" placeholder="Nombre del Asesor" name="nameAsesor" id="nameAsesor" aria-label="Nombre del Asesor" aria-describedby="button-addon2" readonly>

              <h1>Carrera o trabajo del Asesor</h1>

              <input type="text" class="form-control" placeholder="Carrera o trabajo del Asesor" name="carreraAsesor" id="carreraAsesor" aria-label="Carrera o trabajo del Asesor" aria-describedby="button-addon2" readonly>


              <h1>Descripcion del asesor</h1>

              <input type="text" class="form-control" placeholder="Informacion/Descripcion del Asesor" name="infoAsesor" id="infoAsesor" aria-label="Informacion/Descripcion del Asesor" aria-describedby="button-addon2" readonly>


              <h1>Materias de las que dará asesoría</h1>

              <input type="text" class="form-control" placeholder="Materias de las que dará asesoría" name="materiaAsesor" id="materiaAsesor" aria-label="Materias de las que dará asesoría" aria-describedby="button-addon2" readonly>




            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
  <div class="full-height">
    <div class="table-section">

      <div class="title">
        <h1 class="title-table">HORARIO</h1>
      </div>
      <div class="calendar container" id="miCalendario">
        <div class="calendar__info">
          <div class="calendar__prev" id="prev-month"><i class="bi bi-arrow-left-square"></i></div>
          <div class="calendar__month" id="month"></div>
          <div class="calendar__year" id="year"></div>
          <div class="calendar__next" id="next-month">
            <i class="bi bi-arrow-right-square"></i>
          </div>
        </div>
        <div class="calendar__week">
          <div class="calendar__day calendar__item">Lunes</div>
          <div class="calendar__day calendar__item">Martes</div>
          <div class="calendar__day calendar__item">Miercoles</div>
          <div class="calendar__day calendar__item">Jueves</div>
          <div class="calendar__day calendar__item">Viernes</div>
          <div class="calendar__day calendar__item">Sabado</div>
          <div class="calendar__day calendar__item">Domingo</div>
        </div>
        <div class="calendar__dates" id="dates"></div>
        <div class="outer-wrap">
          <div class="table-wrap">

          </div>
        </div>
        <div class="estados">
          <div class="container">
            <div class="row">
              <div class="col-3 list-item"><i class="bi bi-square-fill"></i>Sin Asesorias</div>
              <div class="col-3 list-item"><i class="bi bi-square-fill" id="lightTraffic"></i>Carga Ligera</div>
              <div class="col-3 list-item"><i class="bi bi-square-fill" id="mediumTraffic"></i>Carga Moderada</div>
              <div class="col-3 list-item"><i class="bi bi-square-fill" id="fullTraffic"></i>Completo</div>
            </div>
          </div>

        </div>
      </div>

    </div>

  </div>
  <!-- Modal -->
  <div class="w-100 modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h1 class="modal-title mx-auto text-light" id="miDiaSeleccionadoMostrar"></h1>

        </div>
        <div class="modal-body">
          <h1 class="fs-1">Horas:</h1>
          <div class="list-group" id="misAsesorias">
            <div href="" class="list-group-item list-group-item-action" id="M1">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 misHoras">7:00 - 7:50</h5>
                <small class="text-muted">M1 </small>
              </div>
              <p class="mb-1 miEstado">No hay asesorias asignadas</p>
              <small class="text-muted miAsesorAsignado" id="miAsesorID"></small>
            </div>
            <div href="" class="list-group-item list-group-item-action" id="M2">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 misHoras">7:50 - 8:40</h5>
                <small class="text-muted">M2 </small>
              </div>
              <p class="mb-1 miEstado">No hay asesorias asignadas</p>
              <small class="text-muted miAsesorAsignado" id="miAsesorID"></small>
            </div>
            <div href="" class="list-group-item list-group-item-action" id="M3">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 misHoras">8:40 - 9:30</h5>
                <small class="text-muted">M3 </small>

              </div>
              <p class="mb-1 miEstado">No hay asesorias asignadas</p>
              <small class="text-muted miAsesorAsignado" id="miAsesorID"></small>

            </div>
            <div href="" class="list-group-item list-group-item-action" id="M4">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 misHoras">9:30 - 10:20</h5>
                <small class="text-muted">M4</small>
              </div>
              <p class="mb-1 miEstado">No hay asesorias asignadas</p>
              <small class="text-muted miAsesorAsignado" id="miAsesorID"></small>
            </div>
            <div href="" class="list-group-item list-group-item-action" id="M5">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 misHoras">10:20 - 11:10</h5>
                <small class="text-muted">M5</small>
              </div>
              <p class="mb-1 miEstado">No hay asesorias asignadas</p>
              <small class="text-muted miAsesorAsignado" id="miAsesorID"></small>
            </div>
            <div href="" class="list-group-item list-group-item-action" id="M6">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 misHoras">11:10 - 12:00</h5>
                <small class="text-muted">M6</small>
              </div>
              <p class="mb-1 miEstado">No hay asesorias asignadas</p>
              <small class="text-muted miAsesorAsignado" id="miAsesorID"></small>
            </div>
            <div href="" class="list-group-item list-group-item-action" id="V1">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 misHoras">12:00 - 12:50</h5>
                <small class="text-muted">V1</small>
              </div>
              <p class="mb-1 miEstado">No hay asesorias asignadas</p>
              <small class="text-muted miAsesorAsignado" id="miAsesorID"></small>
            </div>
            <div href="" class="list-group-item list-group-item-action" id="V2">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 misHoras">12:50 - 13:40</h5>
                <small class="text-muted">V2</small>
              </div>
              <p class="mb-1 miEstado">No hay asesorias asignadas</p>
              <small class="text-muted miAsesorAsignado" id="miAsesorID"></small>
            </div>

            <div href="" class="list-group-item list-group-item-action" id="V3">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 misHoras">13:40 - 14:30</h5>
                <small class="text-muted">V3</small>
              </div>
              <p class="mb-1 miEstado">No hay asesorias asignadas</p>
              <small class="text-muted miAsesorAsignado" id="miAsesorID"></small>
            </div>

            <div href="" class="list-group-item list-group-item-action" id="V4">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 misHoras">14:30 - 15:20</h5>
                <small class="text-muted">V4</small>
              </div>
              <p class="mb-1 miEstado">No hay asesorias asignadas</p>
              <small class="text-muted miAsesorAsignado" id="miAsesorID"></small>
            </div>

            <div href="" class="list-group-item list-group-item-action" id="V5">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 misHoras">15:20 - 16:10</h5>
                <small class="text-muted">V5</small>
              </div>
              <p class="mb-1 miEstado">No hay asesorias asignadas</p>
              <small class="text-muted miAsesorAsignado" id="miAsesorID"></small>
            </div>


            <div href="" class="list-group-item list-group-item-action" id="V6">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 misHoras">16:10 - 17:00</h5>
                <small class="text-muted">V6</small>
              </div>
              <p class="mb-1 miEstado">No hay asesorias asignadas</p>
              <small class="text-muted miAsesorAsignado" id="miAsesorID"></small>
            </div>

            <div href="" class="list-group-item list-group-item-action" id="N1">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 misHoras">17:00 - 17:45</h5>
                <small class="text-muted">N1</small>
              </div>
              <p class="mb-1 miEstado">No hay asesorias asignadas</p>
              <small class="text-muted miAsesorAsignado" id="miAsesorID"></small>
            </div>

            <div href="" class="list-group-item list-group-item-action" id="N2">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 misHoras">17:45 - 18:30</h5>
                <small class="text-muted">N2</small>
              </div>
              <p class="mb-1 miEstado">No hay asesorias asignadas</p>
              <small class="text-muted miAsesorAsignado" id="miAsesorID"></small>
            </div>

            <div href="" class="list-group-item list-group-item-action" id="N3">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 misHoras">18:30 - 19:15</h5>
                <small class="text-muted">N3</small>
              </div>
              <p class="mb-1 miEstado">No hay asesorias asignadas</p>
              <small class="text-muted miAsesorAsignado" id="miAsesorID"></small>
            </div>

            <div href="" class="list-group-item list-group-item-action" id="N4">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 misHoras">19:15 - 20:00</h5>
                <small class="text-muted">N4</small>
              </div>
              <p class="mb-1 miEstado">No hay asesorias asignadas</p>
              <small class="text-muted miAsesorAsignado" id="miAsesorID"></small>
            </div>

            <div href="" class="list-group-item list-group-item-action" id="N5">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 misHoras">20:00 - 20:45</h5>
                <small class="text-muted">N5</small>
              </div>
              <p class="mb-1 miEstado">No hay asesorias asignadas</p>
              <small class="text-muted miAsesorAsignado" id="miAsesorID"></small>
            </div>

            <div href="" class="list-group-item list-group-item-action" id="N6">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 misHoras">20:45 - 21:30</h5>
                <small class="text-muted">N6</small>
              </div>
              <p class="mb-1 miEstado">No hay asesorias asignadas</p>
              <small class="text-muted miAsesorAsignado" id="miAsesorID"></small>
            </div>


          </div>
        </div>
        <div class="modal-footer ">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="js/script.js"></script>

</html>