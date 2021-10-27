<?php
// Include conexion
include 'includes/config/database.php';
$db = conectarDB();

//Log de errores
$errores = [];

// Autenticar usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));

  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (!$email) {
    $errores[] = 'El email es obligatorio o no es valido';
  }

  if (!$password) {
    $errores[] = 'El password es obligatorio';
  }

  if (empty($errores)) {
    // Revisar si el usuario existe
    $query = "SELECT * FROM usuarios WHERE email = '${email}'";
    $resultado = mysqli_query($db, $query);

    if ($resultado->num_rows) {
      // Revisar si el password es correcto
      $usuario = mysqli_fetch_assoc($resultado);

      $auth = password_verify($password, $usuario['password']);

      if ($auth) {
        // El usuario esta autenticado
        session_start();

        // LLenar arreglo de sesion
        $_SESSION['usuario'] = $usuario['email'];
        $_SESSION['login'] = true;

        header('Location: /admin');
      } else {
        $errores[] = "Alguno de los datos es incorrecto, por favor reviselos y vuelva a intentarlo";
      }
    } else {
      $errores[] = "Alguno de los datos es incorrecto, por favor reviselos y vuelva a intentarlo";
    }
  }
}

// Include de header
require 'includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion">
  <h1>Iniciar sesión</h1>

  <?php foreach ($errores as $error) { ?>
    <div class="alerta error">
      <?php echo $error ?>
    </div>
  <?php } ?>

  <form class="formulario auto-margin contenido-centrado" method="POST">
    <fieldset>
      <legend>Email y Password</legend>

      <label for="email">E-mail</label>
      <input type="email" placeholder="Tu email" id="email" name="email" required>

      <label for="password">Password</label>
      <input type="password" id="password" name="password" required>
    </fieldset>

    <input type="submit" value="Iniciar sesión" class="boton boton-verde">
  </form>
</main>

<?php incluirTemplate('footer') ?>