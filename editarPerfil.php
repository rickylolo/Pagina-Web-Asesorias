<?php
include_once 'php/userAPI.php';
$api = new userAPI;
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="js/jquery-3.6.0.js"></script>
  <link rel="stylesheet" href="css/stylePerfil.css" />
  <link rel="stylesheet" href="css/calendar.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Silkscreen:wght@700&display=swap" rel="stylesheet" />
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <script type="module" src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule="" src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.js"></script>
  <title>Editar Perfil</title>
</head>

<body>
  <div class="full-height mx-auto">
    <header class="header">
      <a href="#">
        <img src="imgs/logo.jpg" alt="image" class="logo" />
      </a>
      <h1 class="title">Pagina web de Asesorias</h1>
      <button class="btn-mobile-nav" id="btn-mob">
        <ion-icon class="icon--nav" name="menu-outline"></ion-icon>
        <ion-icon class="icon--nav" name="close-outline"></ion-icon>
      </button>
      <?php
      if ($_SESSION != NULL) {
        echo '<input type="hidden" value="' . $_SESSION['Usuario_id'] . '" id="miUserIdActual">';
      }
      ?>

      <nav class="main-nav">
        <ul class="main-nav-list">
          <li><a class="main-nav-link" href="perfil.php">Regresar</a></li>
          <li><a class="main-nav-link" href="index.php?logout=true">Salir</a></li>
        </ul>
      </nav>
    </header>

    <section class="section-hero">
      <div class="container" id="miSeccionPerfil">
        <form class="cta-form" method="POST">

          <div class="row">
            <div class="col-3 asesor-img">
              <div class="row">
                <div class="col d-flex justify-content-end">
                  <button class="saveChanges btn-outline-dark">
                    <h1><i class="bi bi-pencil-fill"></i></h1>
                  </button>
                </div>
                <div class="w-100"></div>
                <div class="col d-flex justify-content-center align-content-center">

                  <div class="image-upload">
                    <label for="file-input">
                      <img class="justify-content-center" src="" id="img-foto" alt="asesor-img" width="250px" height="250px">
                    </label>
                    <input id="file-input" onchange="vista_preliminar(event)" name="foto" type="file" accept="image/jpeg">
                  </div>

                </div>

              </div>


            </div>
            <div class="col-9">
              <div class="asesor-datos">
                <h1>Nombre del asesor</h1>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Nombre del Asesor" name="nameAsesor" id="nameAsesor" aria-label="Nombre del Asesor" aria-describedby="button-addon2">
                  <button class="saveChanges btn btn-outline-dark" id="button-addon2">
                    <h1><i class="bi bi-pencil-fill"></i></h1>
                  </button>
                </div>
                <h1>Carrera o trabajo del Asesor</h1>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Carrera o trabajo del Asesor" name="carreraAsesor" id="carreraAsesor" aria-label="Carrera o trabajo del Asesor" aria-describedby="button-addon2">
                  <button class="saveChanges btn btn-outline-dark" id="button-addon2">
                    <h1><i class="bi bi-pencil-fill"></i></h1>
                  </button>
                </div>
                <h1>Descripcion del asesor</h1>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Informacion/Descripcion del Asesor" name="infoAsesor" id="infoAsesor" aria-label="Informacion/Descripcion del Asesor" aria-describedby="button-addon2">
                  <button class="saveChanges btn btn-outline-dark" id="button-addon2">
                    <h1><i class="bi bi-pencil-fill"></i></h1>
                  </button>
                </div>
                <h1>Materias de las que dará asesoría</h1>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Materias de las que dará asesoría" name="materiaAsesor" id="materiaAsesor" aria-label="Materias de las que dará asesoría" aria-describedby="button-addon2">
                  <button class="saveChanges btn btn-outline-dark" id="button-addon2">
                    <h1><i class="bi bi-pencil-fill"></i></h1>
                  </button>
                </div>

              </div>
            </div>
          </div>
        </form>
      </div>

    </section>
  </div>
  <div class="full-height">
    <section class="table-section">
      <div class="container">
        <div class="row">
          <div class="title">
            <h1 class="title-table">HORARIO <i class="bi bi-pencil-fill"></i></h1>
          </div>
          <div class="d-flex justify-content-end">

          </div>
        </div>
      </div>

      <div class="calendar container" id="miCalendario">
        <div class="calendar__info">
          <div class="calendar__prev" id="prev-month">
            <i class="bi bi-arrow-left-square"></i>
          </div>
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
        <div class="verificaciones">
          <div class="inputs">
            <label for="box" class="checkbox">
              <input class="input-check" id="box" type="checkbox" name="casilla">
              <div class="verificacion-text"></div>
              <p class="verif-text">Repetir el horario cada semana</p>
            </label>
            <label for="box2" class="checkbox">
              <input class="input-check" id="box2" type="checkbox" name="casilla">
              <div class="verificacion-text"></div>
              <p class="verif-text">Modificar las asesorias ya agenadas, pero se cancelaran si es que se modifican y se guardan los cambios</p>
            </label>
          </div>
        </div>
        <div class="btn">
          <a href="#" class="btn btn--full">Guardar cambios</a>
        </div>
    </section>
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
                <small class="text-muted">M1 <span class="badge bg-success rounded-pill">Disponible</span></small>
              </div>
              <p class="mb-1 miEstado">No hay asesorias asignadas</p>
              <small class="text-muted miAsesorAsignado" id="miAsesorID"></small>
            </div>
            <div href="" class="list-group-item list-group-item-action" id="M2">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 misHoras">7:50 - 8:40</h5>
                <small class="text-muted">M2 <span class="badge bg-success rounded-pill">Disponible</span></small>
              </div>
              <p class="mb-1 miEstado">No hay asesorias asignadas</p>
              <small class="text-muted miAsesorAsignado" id="miAsesorID"></small>
            </div>
            <div href="" class="list-group-item list-group-item-action" id="M3">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 misHoras">8:40 - 9:30</h5>
                <small class="text-muted">M3 <span class="badge bg-success rounded-pill">Disponible</span></small>

              </div>
              <p class="mb-1 miEstado">No hay asesorias asignadas</p>
              <small class="text-muted miAsesorAsignado" id="miAsesorID"></small>

            </div>
            <div href="" class="list-group-item list-group-item-action" id="M4">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 misHoras">9:30 - 10:20</h5>
                <small class="text-muted">M4 <span class="badge bg-success rounded-pill">Disponible</span></small>
              </div>
              <p class="mb-1 miEstado">No hay asesorias asignadas</p>
              <small class="text-muted miAsesorAsignado" id="miAsesorID"></small>
            </div>
            <div href="" class="list-group-item list-group-item-action" id="M5">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 misHoras">10:20 - 11:10</h5>
                <small class="text-muted">M5 <span class="badge bg-success rounded-pill">Disponible</span></small>
              </div>
              <p class="mb-1 miEstado">No hay asesorias asignadas</p>
              <small class="text-muted miAsesorAsignado" id="miAsesorID"></small>
            </div>
            <div href="" class="list-group-item list-group-item-action" id="M6">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 misHoras">11:10 - 12:00</h5>
                <small class="text-muted">M6 <span class="badge bg-success rounded-pill">Disponible</span></small>
              </div>
              <p class="mb-1 miEstado">No hay asesorias asignadas</p>
              <small class="text-muted miAsesorAsignado" id="miAsesorID"></small>
            </div>
            <div href="" class="list-group-item list-group-item-action" id="V1">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 misHoras">12:00 - 12:50</h5>
                <small class="text-muted">V1 <span class="badge bg-success rounded-pill">Disponible</span></small>
              </div>
              <p class="mb-1 miEstado">No hay asesorias asignadas</p>
              <small class="text-muted miAsesorAsignado" id="miAsesorID"></small>
            </div>
            <div href="" class="list-group-item list-group-item-action" id="V2">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 misHoras">12:50 - 13:40</h5>
                <small class="text-muted">V2 <span class="badge bg-success rounded-pill">Disponible</span></small>
              </div>
              <p class="mb-1 miEstado">No hay asesorias asignadas</p>
              <small class="text-muted miAsesorAsignado" id="miAsesorID"></small>
            </div>

            <div href="" class="list-group-item list-group-item-action" id="V3">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 misHoras">13:40 - 14:30</h5>
                <small class="text-muted">V3 <span class="badge bg-success rounded-pill">Disponible</span></small>
              </div>
              <p class="mb-1 miEstado">No hay asesorias asignadas</p>
              <small class="text-muted miAsesorAsignado" id="miAsesorID"></small>
            </div>

            <div href="" class="list-group-item list-group-item-action" id="V4">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 misHoras">14:30 - 15:20</h5>
                <small class="text-muted">V4 <span class="badge bg-success rounded-pill">Disponible</span></small>
              </div>
              <p class="mb-1 miEstado">No hay asesorias asignadas</p>
              <small class="text-muted miAsesorAsignado" id="miAsesorID"></small>
            </div>

            <div href="" class="list-group-item list-group-item-action" id="V5">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 misHoras">15:20 - 16:10</h5>
                <small class="text-muted">V5 <span class="badge bg-success rounded-pill">Disponible</span></small>
              </div>
              <p class="mb-1 miEstado">No hay asesorias asignadas</p>
              <small class="text-muted miAsesorAsignado" id="miAsesorID"></small>
            </div>


            <div href="" class="list-group-item list-group-item-action" id="V6">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 misHoras">16:10 - 17:00</h5>
                <small class="text-muted">V6 <span class="badge bg-success rounded-pill">Disponible</span></small>
              </div>
              <p class="mb-1 miEstado">No hay asesorias asignadas</p>
              <small class="text-muted miAsesorAsignado" id="miAsesorID"></small>
            </div>

            <div href="" class="list-group-item list-group-item-action" id="N1">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 misHoras">17:00 - 17:45</h5>
                <small class="text-muted">N1 <span class="badge bg-success rounded-pill">Disponible</span></small>
              </div>
              <p class="mb-1 miEstado">No hay asesorias asignadas</p>
              <small class="text-muted miAsesorAsignado" id="miAsesorID"></small>
            </div>

            <div href="" class="list-group-item list-group-item-action" id="N2">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 misHoras">17:45 - 18:30</h5>
                <small class="text-muted">N2 <span class="badge bg-success rounded-pill">Disponible</span></small>
              </div>
              <p class="mb-1 miEstado">No hay asesorias asignadas</p>
              <small class="text-muted miAsesorAsignado" id="miAsesorID"></small>
            </div>

            <div href="" class="list-group-item list-group-item-action" id="N3">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 misHoras">18:30 - 19:15</h5>
                <small class="text-muted">N3 <span class="badge bg-success rounded-pill">Disponible</span></small>
              </div>
              <p class="mb-1 miEstado">No hay asesorias asignadas</p>
              <small class="text-muted miAsesorAsignado" id="miAsesorID"></small>
            </div>

            <div href="" class="list-group-item list-group-item-action" id="N4">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 misHoras">19:15 - 20:00</h5>
                <small class="text-muted">N4 <span class="badge bg-success rounded-pill">Disponible</span></small>
              </div>
              <p class="mb-1 miEstado">No hay asesorias asignadas</p>
              <small class="text-muted miAsesorAsignado" id="miAsesorID"></small>
            </div>

            <div href="" class="list-group-item list-group-item-action" id="N5">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 misHoras">20:00 - 20:45</h5>
                <small class="text-muted">N5 <span class="badge bg-success rounded-pill">Disponible</span></small>
              </div>
              <p class="mb-1 miEstado">No hay asesorias asignadas</p>
              <small class="text-muted miAsesorAsignado" id="miAsesorID"></small>
            </div>

            <div href="" class="list-group-item list-group-item-action" id="N6">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 misHoras">20:45 - 21:30</h5>
                <small class="text-muted">N6 <span class="badge bg-success rounded-pill">Disponible</span></small>
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
  <!-- Modal Materia-->
  <div class="w-100 modal fade" id="myModalMateria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <img src="imgs/logo.jpg" alt="image" class="logo logo-modal2">
          <h1 class="modal-title mx-auto text-light" id="exampleModalLabel">Añadir Materia</h1>

        </div>
        <div class="modal-body w-70">
          <input type="hidden" value="" id="miDiaSeleccionado">
          <input type="hidden" value="" id="miHoraSeleccionado">

          <div class="row">
            <div class="col-12 d-flex mx-auto">
              <h3>Nombre de la materia</h3>
            </div>
            <div class="input-group input-group-lg">
              <span class="input-group-text" id="basic-addon1"><i class="bi bi-card-text"></i></span>
              <input type="text" class="form-control" id="nombreMateria" name="nombreMateria" placeholder="Nombre de la materia" aria-label="Descripcion" aria-describedby="basic-addon1">
            </div>
          </div>
          <div class="row">
            <div class="col-12 d-flex mx-auto">
              <h3>Descripcion</h3>
            </div>
            <div class="input-group input-group-lg">
              <span class="input-group-text" id="basic-addon1"><i class="bi bi-card-text"></i></span>
              <input type="text" class="form-control" id="Descripcion" name="Descripcion" placeholder="Descripcion" aria-label="Descripcion" aria-describedby="basic-addon1">
            </div>
          </div>
          <div class="row">
            <div class="col-12 d-flex mx-auto">
              <h3>Lugar</h3>
            </div>
            <div class="input-group input-group-lg">
              <span class="input-group-text" id="basic-addon1"><i class="bi bi-card-text"></i></span>
              <input type="text" class="form-control" id="Lugar" name="Lugar" placeholder="Lugar" aria-label="Descripcion" aria-describedby="basic-addon1">
            </div>
          </div>
          <div class="row">
            <div class="col-12 d-flex mx-auto">
              <h3>Costo</h3>
            </div>
            <div class="input-group input-group-lg">
              <span class="input-group-text" id="basic-addon1"><i class="bi bi-card-text"></i></span>
              <input type="text" class="form-control" id="Costo" name="Costo" placeholder="Costo" aria-label="Descripcion" aria-describedby="basic-addon1">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="d-flex mx-auto">
            <button type="button" class="btn btn-lg btn-success" data-bs-dismiss="modal" id="GuardarAsesoria">Guardar</button>
            <button type="button" class="btn btn-lg btn-primary" id="limpiarCamposAsesoria">Limpiar</button>
            <button type="button" class="btn btn-lg btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="js/script.js"></script>
  <script src="js/script2.js"></script>
  <script src="js/editarPerfil.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>


</html>