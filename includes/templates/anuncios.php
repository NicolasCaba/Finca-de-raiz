<?php
// Import conexion
require __DIR__ . '/../config/database.php';
$db = conectarDB();

// Consulta
$query = "SELECT * FROM propiedades LIMIT ${limite}";

// Obtener el resultado
$resultado = mysqli_query($db, $query);


?>

<div class="contenedor-anuncios">

  <?php while ($propiedad = mysqli_fetch_assoc($resultado)) { ?>

    <div class="anuncio">

      <img src="/imagenes/<?php echo $propiedad['imagen'] ?>" alt="Foto casa en venta" loading="lazy" />


      <div class="contenido-anuncio">
        <h3><?php echo $propiedad['titulo'] ?></h3>
        <p>
          <?php echo $propiedad['descripcion'] ?>
        </p>
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
        <a href="anuncio.php?id=<?php echo $propiedad['id'] ?>" class="boton boton-amarillo">
          Ver propiedad
        </a>
      </div>
    </div>

  <?php } ?>

</div>

<?php
// Cierre de la conexion

mysqli_close($db);
?>