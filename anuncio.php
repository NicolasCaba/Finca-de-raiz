<?php
require 'includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
  <h1>Casa en venta en Chapinero</h1>

  <picture>
    <source srcset="build/img/destacada.webp" type="image/webp" />
    <source srcset="build/img/destacada.jpg" type="image/jpeg" />
    <img src="build/img/destacada.jpg" alt="Foto casa en venta" loading="lazy" />
  </picture>

  <div class="resumen-propiedad">
    <p class="precio">$320'000.000</p>
    <ul class="iconos-caracteristicas">
      <li>
        <img class="icono" src="build/img/icono_wc.svg" alt="Icono de baño" loading="lazy" />
        <p>3</p>
      </li>
      <li>
        <img class="icono" src="build/img/icono_estacionamiento.svg" alt="Icono de carro" loading="lazy" />
        <p>1</p>
      </li>
      <li>
        <img class="icono" src="build/img/icono_dormitorio.svg" alt="Icono de cama" loading="lazy" />
        <p>5</p>
      </li>
    </ul>
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid
      similique quo iure! Perspiciatis illum eveniet harum iste, itaque
      reiciendis. Ad atque commodi maiores, repellat dignissimos minima
      quibusdam minus dolores maxime? Reprehenderit earum quas deserunt
      beatae eos cupiditate possimus vero explicabo? Exercitationem, in,
      dolor assumenda ipsa voluptatibus voluptate officia voluptatem nostrum
      delectus consequatur pariatur accusamus similique! Vel ipsam sunt fuga
      itaque. Quasi explicabo, blanditiis inventore nesciunt laudantium
      omnis accusamus beatae velit ea culpa quam magnam earum, voluptas
      corrupti, ab dolores nemo cupiditate itaque voluptates. Aliquid
      distinctio velit nemo tempora, facere labore! A magnam accusamus modi
      asperiores maiores nesciunt molestias! Tenetur amet dolor, quod optio
      maiores ea quibusdam magnam voluptas! Hic eum odit necessitatibus
      saepe in laudantium, eveniet unde accusamus eaque placeat.
    </p>
    <p>
      Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vero
      obcaecati voluptates animi vitae voluptas ut minima qui ab, sunt dolor
      suscipit cumque! Animi eveniet, dolor ut minus quibusdam placeat
      minima!
    </p>
  </div>
</main>

<?php incluirTemplate('footer') ?>