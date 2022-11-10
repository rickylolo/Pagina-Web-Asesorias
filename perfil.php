<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/stylePerfil.css" />
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <script src="js/jquery-3.6.0.js"></script>
  <script src="js/perfil.js"></script>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Silkscreen:wght@700&display=swap" rel="stylesheet" />
  <script type="module" src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule="" src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.js"></script>
  <title>Perfil</title>
</head>

<body>
  <?php
  if ($_SESSION != NULL) {
    echo '<input type="hidden" value="' . $_SESSION['Usuario_id'] . '" id="miUserIdActual">';
  }
  ?>
  <header class="header">
    <img src="imgs/logo.jpg" alt="image" class="logo">



    <h1 class="title">Pagina web de Asesorias</h1>
    <button class="btn-mobile-nav" id="btn-mob">
      <ion-icon class="icon--nav" name="menu-outline"></ion-icon>
      <ion-icon class="icon--nav" name="close-outline"></ion-icon>
    </button>
    <nav class="main-nav">
      <ul class="main-nav-list">
        <li><a class="main-nav-link" href="editarPerfil.php">Editar</a></li>
        <li><a class="main-nav-link" href="index.php?logout=true">Salir</a></li>
      </ul>
    </nav>
  </header>
  <main>


    <section class="section-hero">
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

    </section>
    <section class="table-section">
      <div class="title">
        <h1 class="title-table">HORARIO</h1>
      </div>
      <div class="calendar">
        <div class="datos-fecha">
          <h1>Mes/Año</h1>
          <div class="left"><a href="#">
              <ion-icon class="arrows" name="arrow-undo"></ion-icon>
            </a> </div>
          <div class="right"><a href="#">
              <ion-icon class="arrows" name="arrow-redo"></ion-icon>
            </a></div>

        </div>
        <div class="outer-wrap">
          <div class="table-wrap">
            <table class="table">
              <thead class="thead">
                <tr>
                  <th>Hora</th>
                  <th>Lunes</th>
                  <th>Martes</th>
                  <th>Miercoles</th>
                  <th>Jueves</th>
                  <th>Viernes</th>
                  <th>Sabado</th>
                  <th>Domingo</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <!--<td>M1</td> -->
                  <td>7:00-7:50</td>
                  <td><button class="btn btn--form">M1</button></td>
                  <td><button class="btn btn--form">M1</button></td>
                  <td><button class="btn btn--form">M1</button></td>
                  <td><button class="btn btn--form">M1</button></td>
                  <td><button class="btn btn--form">M1</button></td>
                  <td><button class="btn btn--form">M1</button></td>
                  <td><button class="btn btn--form">M1</button></td>
                </tr>
                <tr>
                  <!-- <td>M2</td> -->
                  <td>7:50-8:40</td>
                  <td><button class="btn btn--form">M2</button></td>
                  <td><button class="btn btn--form">M2</button></td>
                  <td><button class="btn btn--form">M2</button></td>
                  <td><button class="btn btn--form">M2</button></td>
                  <td><button class="btn btn--form">M2</button></td>
                  <td><button class="btn btn--form">M2</button></td>
                  <td><button class="btn btn--form">M2</button></td>
                </tr>
                <tr>
                  <!-- <td>M3</td> -->
                  <td>8:40-9:30</td>
                  <td><button class="btn btn--form">M3</button></td>
                  <td><button class="btn btn--form">M3</button></td>
                  <td><button class="btn btn--form">M3</button></td>
                  <td><button class="btn btn--form">M3</button></td>
                  <td><button class="btn btn--form">M3</button></td>
                  <td><button class="btn btn--form">M3</button></td>
                  <td><button class="btn btn--form">M3</button></td>
                </tr>
                <tr>
                  <!-- <td>M4</td> -->
                  <td>9:30-10:20</td>
                  <td><button class="btn btn--form">M4</button></td>
                  <td><button class="btn btn--form">M4</button></td>
                  <td><button class="btn btn--form">M4</button></td>
                  <td><button class="btn btn--form">M4</button></td>
                  <td><button class="btn btn--form">M4</button></td>
                  <td><button class="btn btn--form">M4</button></td>
                  <td><button class="btn btn--form">M4</button></td>
                </tr>
                <tr>
                  <!-- <td>M5</td> -->
                  <td>10:20-11:10</td>
                  <td><button class="btn btn--form">M5</button></td>
                  <td><button class="btn btn--form">M5</button></td>
                  <td><button class="btn btn--form">M5</button></td>
                  <td><button class="btn btn--form">M5</button></td>
                  <td><button class="btn btn--form">M5</button></td>
                  <td><button class="btn btn--form">M5</button></td>
                  <td><button class="btn btn--form">M5</button></td>
                </tr>
                <tr>
                  <!-- <td>M6</td> -->
                  <td>11:10-12:00</td>
                  <td><button class="btn btn--form">M6</button></td>
                  <td><button class="btn btn--form">M6</button></td>
                  <td><button class="btn btn--form">M6</button></td>
                  <td><button class="btn btn--form">M6</button></td>
                  <td><button class="btn btn--form">M6</button></td>
                  <td><button class="btn btn--form">M6</button></td>
                  <td><button class="btn btn--form">M6</button></td>
                <tr>
                  <!-- <td>V1</td> -->
                  <td>12:00-12:50</td>
                  <td><button class="btn btn--form">V1</button></td>
                  <td><button class="btn btn--form">V1</button></td>
                  <td><button class="btn btn--form">V1</button></td>
                  <td><button class="btn btn--form">V1</button></td>
                  <td><button class="btn btn--form">V1</button></td>
                  <td><button class="btn btn--form">V1</button></td>
                  <td><button class="btn btn--form">V1</button></td>
                </tr>
                <tr>
                  <!-- <td>V2</td> -->
                  <td>12:50-13:40</td>
                  <td><button class="btn btn--form">V2</button></td>
                  <td><button class="btn btn--form">V2</button></td>
                  <td><button class="btn btn--form">V2</button></td>
                  <td><button class="btn btn--form">V2</button></td>
                  <td><button class="btn btn--form">V2</button></td>
                  <td><button class="btn btn--form">V2</button></td>
                  <td><button class="btn btn--form">V2</button></td>
                </tr>
                <tr>
                  <!-- <td>V3</td> -->
                  <td>13:40-14:30</td>
                  <td><button class="btn btn--form">V3</button></td>
                  <td><button class="btn btn--form">V3</button></td>
                  <td><button class="btn btn--form">V3</button></td>
                  <td><button class="btn btn--form">V3</button></td>
                  <td><button class="btn btn--form">V3</button></td>
                  <td><button class="btn btn--form">V3</button></td>
                  <td><button class="btn btn--form">V3</button></td>
                </tr>
                <tr>
                  <!-- <td>V4</td> -->
                  <td>14:30-15:20</td>
                  <td><button class="btn btn--form">V4</button></td>
                  <td><button class="btn btn--form">V4</button></td>
                  <td><button class="btn btn--form">V4</button></td>
                  <td><button class="btn btn--form">V4</button></td>
                  <td><button class="btn btn--form">V4</button></td>
                  <td><button class="btn btn--form">V4</button></td>
                  <td><button class="btn btn--form">V4</button></td>
                </tr>
                <tr>
                  <!-- <td>V5</td> -->
                  <td>15:20-16:10</td>
                  <td><button class="btn btn--form">V5</button></td>
                  <td><button class="btn btn--form">V5</button></td>
                  <td><button class="btn btn--form">V5</button></td>
                  <td><button class="btn btn--form">V5</button></td>
                  <td><button class="btn btn--form">V5</button></td>
                  <td><button class="btn btn--form">V5</button></td>
                  <td><button class="btn btn--form">V5</button></td>
                </tr>
                <tr>
                  <!-- <td>V6</td> -->
                  <td>16:10-17:00</td>
                  <td><button class="btn btn--form">V6</button></td>
                  <td><button class="btn btn--form">V6</button></td>
                  <td><button class="btn btn--form">V6</button></td>
                  <td><button class="btn btn--form">V6</button></td>
                  <td><button class="btn btn--form">V6</button></td>
                  <td><button class="btn btn--form">V6</button></td>
                  <td><button class="btn btn--form">V6</button></td>
                </tr>
                <tr>
                  <!-- <td>N1</td> -->
                  <td>17:00-17:45</td>
                  <td><button class="btn btn--form">N1</button></td>
                  <td><button class="btn btn--form">N1</button></td>
                  <td><button class="btn btn--form">N1</button></td>
                  <td><button class="btn btn--form">N1</button></td>
                  <td><button class="btn btn--form">N1</button></td>
                  <td><button class="btn btn--form">N1</button></td>
                  <td><button class="btn btn--form">N1</button></td>
                </tr>
                <tr>
                  <!-- <td>N2</td> -->
                  <td>17:45-18:30</td>
                  <td><button class="btn btn--form">N2</button></td>
                  <td><button class="btn btn--form">N2</button></td>
                  <td><button class="btn btn--form">N2</button></td>
                  <td><button class="btn btn--form">N2</button></td>
                  <td><button class="btn btn--form">N2</button></td>
                  <td><button class="btn btn--form">N2</button></td>
                  <td><button class="btn btn--form">N2</button></td>
                </tr>
                <tr>
                  <!-- <td>N3</td> -->
                  <td>18:30-19:15</td>
                  <td><button class="btn btn--form">N3</button></td>
                  <td><button class="btn btn--form">N3</button></td>
                  <td><button class="btn btn--form">N3</button></td>
                  <td><button class="btn btn--form">N3</button></td>
                  <td><button class="btn btn--form">N3</button></td>
                  <td><button class="btn btn--form">N3</button></td>
                  <td><button class="btn btn--form">N3</button></td>
                </tr>
                <tr>
                  <!-- <td>N4</td> -->
                  <td>19:15-20:00</td>
                  <td><button class="btn btn--form">N4</button></td>
                  <td><button class="btn btn--form">N4</button></td>
                  <td><button class="btn btn--form">N4</button></td>
                  <td><button class="btn btn--form">N4</button></td>
                  <td><button class="btn btn--form">N4</button></td>
                  <td><button class="btn btn--form">N4</button></td>
                  <td><button class="btn btn--form">N4</button></td>
                </tr>
                <tr>
                  <!-- <td>N5</td> -->
                  <td>20:00-20:45</td>
                  <td><button class="btn btn--form">N5</button></td>
                  <td><button class="btn btn--form">N5</button></td>
                  <td><button class="btn btn--form">N5</button></td>
                  <td><button class="btn btn--form">N5</button></td>
                  <td><button class="btn btn--form">N5</button></td>
                  <td><button class="btn btn--form">N5</button></td>
                  <td><button class="btn btn--form">N5</button></td>
                </tr>
                <!-- <td>N6</td> -->
                <td>20:45-21:30</td>
                <td><button class="btn btn--form">N6</button></td>
                <td><button class="btn btn--form">N6</button></td>
                <td><button class="btn btn--form">N6</button></td>
                <td><button class="btn btn--form">N6</button></td>
                <td><button class="btn btn--form">N6</button></td>
                <td><button class="btn btn--form">N6</button></td>
                <td><button class="btn btn--form">N6</button></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="estados">
          <li class="list-item">
            <ion-icon class="list-icon" name="square"></ion-icon>
            <span>Asesoria Disponible</span>
          </li>
          <li class="list-item">
            <ion-icon class="list-icon list--icon3" name="square"></ion-icon>
            <span>Asesoria No Disponible</span>
          </li>
        </div>
    </section>
  </main>
</body>
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</html>