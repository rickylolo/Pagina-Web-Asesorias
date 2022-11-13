<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/styleRegistro.css">
  <script src="js/jquery-3.6.0.js"></script>
  <script src="js/register.js"></script>
  <title>Asesorias Fime</title>


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

      <label>Nombre(s)</label>
      <input type="text" placeholder="Nombres(s)" name="nombre" id="nombre" required>



      <label>Apellidos</label>
      <input type="text" placeholder="Apellidos" name="apellidos" id="apellidos" required>

      <label>Fecha de Nacimiento</label>
      <input type="date" placeholder="Fecha de Nacimiento" name="nacimiento" id="nacimiento" required>

      <label>Carrera</label>
      <input type="text" placeholder="Carrera" name="carrera" id="carrera" required>

      <label>Semestre</label>
      <input type="text" placeholder="Semestre" name="semestre" id="semestre" required>

      <label>Matricula</label>
      <input type="text" placeholder="Matricula" name="matricula_register" id="matricula_register" required>

      <label>Contraseña</label>
      <input type="password" placeholder="Contraseña" name="password_register" id="password_register" required>


      <button type="submit" id="ButtonRegistroUsuario" class="btn btn--form">Registrarse</button>
      <button type="button" id="LimpiarCampos" class="btn btn--form">Borrar</button>
      <a class="btn btn--form" href="index.php">Regresar</a>

    </form>

  </section>
</body>

</html>