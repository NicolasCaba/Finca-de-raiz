<?php
// Import de conexión
require '../includes/config/database.php';
$db = conectarDB();

// Query 
$query = "SELECT * FROM propiedades";

// Consulta a la base de datos
$resultadoConsulta = mysqli_query($db, $query);

// Mensaje condicional de creacion de propiedad
$resultado = $_GET['resultado'] ?? null;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id'];
  $id = filter_var($id, FILTER_VALIDATE_INT);

  if ($id) {
    //Eliminar el archivo
    $query = "SELECT imagen FROM propiedades WHERE id = ${id}";
    $resultado = mysqli_query($db, $query);
    $propiedad = mysqli_fetch_assoc($resultado);

    unlink('../imagenes/' . $propiedad['imagen']);

    // Eliminar propiedad
    $query = "DELETE FROM propiedades WHERE id = ${id}";

    $resultado = mysqli_query($db, $query);

    if ($resultado) {
      header('Location: /admin?resultado=3');
    }
  }
}

// Template header
require '../includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion">
  <h1>Administrador de Finca de Raiz</h1>

  <?php if (intval($resultado) === 1) { ?>
    <p class="alerta exito">Anuncio creado correctamente</p>
  <?php } else if (intval($resultado) === 2) { ?>
    <p class="alerta exito">Propiedad actualizada correctamente</p>
  <?php } else if (intval($resultado) === 3) { ?>
    <p class="alerta exito">Propiedad Eliminada correctamente</p>
  <?php } ?>

  <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva propiedad</a>

  <table class="propiedades">
    <thead>
      <tr>
        <th>ID</th>
        <th>Titulo</th>
        <th>Imagen</th>
        <th>Precio</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($propiedad = mysqli_fetch_assoc($resultadoConsulta)) { ?>

        <tr>
          <td><?php echo $propiedad['id'] ?></td>
          <td><?php echo $propiedad['titulo'] ?></td>
          <td><img src="/imagenes/<?php echo $propiedad['imagen'] ?>" alt="Imagen propiedad" class="imagen-tabla"></td>
          <td><?php echo '$ ' . $propiedad['precio'] ?></td>
          <td>
            <form action="" method="POST" class="w-100">
              <input type="hidden" name="id" value="<?php echo $propiedad['id'] ?>">
              <input type="submit" class="boton-rojo-block" value="Eliminar">
            </form>

            <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad['id'] ?>" class="boton-verde-block">Actualizar</a>
          </td>
        </tr>

      <?php } ?>
    </tbody>
  </table>
</main>

<?php
// Cierre de conexión
mysqli_close($db);

// Import de footer
incluirTemplate('footer') ?>