<?php
// Lectura de datos recibidos por la url
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
  header('Location: /');
}

// Import conexion
require 'includes/config/database.php';
$db = conectarDB();

// Consulta
$query = "SELECT * FROM propiedades WHERE id = ${id}";
$resultado = mysqli_query($db, $query);

if ($resultado->num_rows === 0) {
  header('Location: /');
}

// Obtener los datos
$propiedad = mysqli_fetch_assoc($resultado);



require 'includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
  <h1><?php echo $propiedad['titulo'] ?></h1>

  <img src="/imagenes/<?php echo $propiedad['imagen'] ?>" alt="Foto casa en venta" loading="lazy" />


  <div class="resumen-propiedad">
    <p class="precio">$ <?php echo $propiedad['precio'] ?></p>
    <ul class="iconos-caracteristicas">
      <li>
        <img class="icono" src="build/img/icono_wc.svg" alt="Icono de baño" loading="lazy" />
        <p><?php echo $propiedad['wc'] ?></p>
      </li>
      <li>
        <img class="icono" src="build/img/icono_estacionamiento.svg" alt="Icono de carro" loading="lazy" />
        <p><?php echo $propiedad['estacionamiento'] ?></p>
      </li>
      <li>
        <img class="icono" src="build/img/icono_dormitorio.svg" alt="Icono de cama" loading="lazy" />
        <p><?php echo $propiedad['habitaciones'] ?></p>
      </li>
    </ul>
    <p>
      <?php echo $propiedad['descripcion'] ?>
    </p>
  </div>
</main>

<?php
mysqli_close($db);
incluirTemplate('footer')

?>