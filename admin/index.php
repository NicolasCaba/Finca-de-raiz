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

// Template header
require '../includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion">
  <h1>Administrador de Finca de Raiz</h1>

  <?php if (intval($resultado) === 1) { ?>
    <p class="alerta exito">Anuncio creado correctamente</p>
  <?php } else if ($resultado === 2) { ?>
    <p class="alerta exito">Propiedad actualizada correctamente</p>
  <?php } ?>

  <a href="/Finca-de-raiz/admin/propiedades/crear.php" class="boton boton-verde">Nueva propiedad</a>

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
          <td><img src="/Finca-de-raiz/imagenes/<?php echo $propiedad['imagen'] ?>" alt="Imagen propiedad" class="imagen-tabla"></td>
          <td><?php echo '$ ' . $propiedad['precio'] ?></td>
          <td>
            <a href="#" class="boton-rojo-block">Eliminar</a>
            <a href="propiedades/actualizar.php?id=<?php echo $propiedad['id'] ?>" class="boton-verde-block">Actualizar</a>
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