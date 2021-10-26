<?php
// Base de datos
require '../../includes/config/database.php';
$db = conectarDB();

// Consulta para obtener la base de datos
$consulta = "SELECT * FROM vendedores";
$resultadoConsulta = mysqli_query($db, $consulta);

// Arreglo con mensajes de error
$errores = [];

$titulo = '';
$precio = '';
$descripcion = '';
$habitaciones = '';
$wc = '';
$estacionamiento = '';
$vendedorId = '';
$creado = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  /* echo '<pre>';
  echo var_dump($_POST);
  echo '</pre>';

  echo '<pre>';
  echo var_dump($_FILES);
  echo '</pre>'; */

  $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
  $precio = mysqli_real_escape_string($db, $_POST['precio']);
  $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
  $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
  $wc = mysqli_real_escape_string($db, $_POST['wc']);
  $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
  $vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);
  $creado = date('Y/m/d');

  // Asignar $_FILES a una variable
  $imagen = $_FILES['imagen'];

  if (!($titulo)) {
    $errores[] = "Debes añadir un titulo";
  }

  if (!($precio)) {
    $errores[] = "Debes añadir un precio a la propiedad";
  }

  if (strlen($descripcion) < 50) {
    $errores[] = "Debes añadir una descripcion y debe ser de al menos 50 caracteres";
  }

  if (!($habitaciones)) {
    $errores[] = "Debes añadir el número de habitaciones";
  }

  if (!($wc)) {
    $errores[] = "Debes añadir el número de baños con los que cuenta la casa";
  }

  if (!($estacionamiento)) {
    $errores[] = "Debes añadir el número de estacionamientos";
  }

  if (!($vendedorId)) {
    $errores[] = "Elige un vendedor";
  }

  if (!($imagen['name'])) {
    $errores[] = "La imagen es obligatoria";
  }

  // Validacion del tamano de la imagen
  $medida = 1000 * 1000;

  if ($imagen['size'] > $medida) {
    $errores[] = "La imagen debe ser de maximo 1M(1000Kb)";
  }

  // Revisar si el arreglo de errores se encuentra vacio
  if (empty($errores)) {
    /* Subida de archivos */
    // Crear carpeta
    $carpetaImagenes = '../../imagenes/';

    if (!(is_dir($carpetaImagenes))) {
      mkdir($carpetaImagenes);
    }

    // Generar nombre para la imagen
    $nombreImagen = md5(uniqid(rand(), true)) . '.jpg';

    //Subir la imagen
    move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);


    // Insertar en la base de datos
    $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedorId) VALUES ( '$titulo', '$precio', '$nombreImagen', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado',  '$vendedorId')";

    $resultado = mysqli_query($db, $query);

    if ($resultado) {
      // Redireccionar

      header('Location: /Finca-de-raiz/admin?resultado=1');
    }
  }
}






require '../../includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion">
  <h1>Crear nueva propiedad</h1>

  <a href="/Finca-de-raiz/admin" class="boton boton-verde">Volver</a>

  <?php foreach ($errores as $error) : ?>
    <div class="alerta error">
      <?php echo $error ?>
    </div>
  <?php endforeach; ?>

  <form action="/Finca-de-raiz/admin/propiedades/crear.php" method="POST" class="formulario" enctype="multipart/form-data">
    <fieldset>
      <legend>Información General</legend>

      <label for="titulo">Titulo</label>
      <input type="text" id="titulo" name="titulo" placeholder="Titulo propiedad" value="<?php echo $titulo ?>">

      <label for="precio">Precio</label>
      <input type="number" id="precio" name="precio" placeholder="Precio propiedad" value="<?php echo $precio ?>">

      <label for="imagen">Imagen</label>
      <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

      <label for="descripcion">Descripcion</label>
      <textarea name="descripcion" id="descripcion"><?php echo $descripcion ?></textarea>
    </fieldset>

    <fieldset>
      <legend>Información de la propiedad</legend>

      <label for="habitaciones">Habitaciones</label>
      <input type="number" id="habitaciones" name="habitaciones" placeholder="Numero habitaciones Ej: 3" min="1" max="20" value="<?php echo $habitaciones ?>">

      <label for="wc">Baños</label>
      <input type="number" id="wc" name="wc" placeholder="Numero baños Ej: 3" min="1" max="20" value="<?php echo $wc ?>">

      <label for="estacionamiento">Estacionamiento</label>
      <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Numero estacionamientos Ej: 3" min="1" max="20" value="<?php echo $estacionamiento ?>">
    </fieldset>

    <fieldset>
      <legend>Vendedor</legend>

      <select name="vendedor" id="vendedor">
        <option value="">-- Seleccione --</option>
        <?php while ($row = mysqli_fetch_assoc($resultadoConsulta)) : ?>
          <option <?php echo $vendedorId === $row['id'] ? 'selected' : '' ?> value="<?php echo $row['id'] ?>"><?php echo $row['nombre'] . " " . $row['apellido'] ?></option>
        <?php endwhile; ?>
      </select>
    </fieldset>

    <input type="submit" value="Crear propiedad" class="boton boton-verde">
  </form>
</main>

<?php incluirTemplate('footer') ?>