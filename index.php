<?php
include_once 'php/userAPI.php';
$api = new userAPI;
session_start();

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="js/jquery-3.6.0.js"></script>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style_inicio_sesion.css">

  <title>Inicio Sesion</title>
</head>

<body>
  <header class="header">
    <h1>Asesorias FIME</h1>
  </header>
  <section class="section-hero">
    <div class="image">
      <img class="img-oso" src="imgs/logo.jpg" />
    </div>

    <form class="cta-form" method="post" action="php/userAPI.php">
      <div>
        <label>Ingrese su matricula</label>
        <input class="inputForm" id="matricula" type="text" placeholder="Matricula" name="matricula">
      </div>

      <div>
        <label>Contraseña</label>
        <input class="inputForm" id="password" type="password" placeholder="Contraseña" name="password">
      </div>
      <button type="submit" class="btn" id="InicioSesion">Iniciar Sesión</button>
      <a class="btn btn--form" href="registro.php">
        Registrarse
      </a>
    </form>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>