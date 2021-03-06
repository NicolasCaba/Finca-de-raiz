<?php
require 'includes/funciones.php';
incluirTemplate('header', $inicio = true);
?>

<main class="contenedor seccion">
  <section class="mas-sobre-nosotros">
    <h1>Mas sobre nosotros</h1>

    <div class="iconos-nosotros">
      <div class="icono">
        <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy" />
        <h3>Seguridad</h3>
        <p>
          Aamet consectetur adipisicing elit. Consequuntur consectetur
          dicta, in quis enim obcaecati excepturi sequi? Voluptatum est
        </p>
      </div>
      <div class="icono">
        <img src="build/img/icono2.svg" alt="Icono dinero" loading="lazy" />
        <h3>Ahorro</h3>
        <p>
          Aamet consectetur adipisicing elit. Consequuntur consectetur
          dicta, in quis enim obcaecati excepturi sequi? Voluptatum est
        </p>
      </div>
      <div class="icono">
        <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy" />
        <h3>A Tiempo</h3>
        <p>
          Aamet consectetur adipisicing elit. Consequuntur consectetur
          dicta, in quis enim obcaecati excepturi sequi? Voluptatum est
        </p>
      </div>
    </div>
  </section>

  <section class="seccion contenedor">
    <h2>Casas y apartamentos en venta</h2>

    <?php
    $limite = 3;
    include 'includes/templates/anuncios.php'
    ?>

    <div class="ver-todas alinear-derecha">
      <a href="anuncios.php" class="boton-verde">Ver Todas</a>
    </div>
  </section>
</main>

<section class="imagen-contacto">
  <h2>Encuentra el hogar de tus sueños</h2>
  <p>
    LLena el formulario de contacto y un asesor se pondrá en contacto
    contigo lo más pronto posible
  </p>
  <a href="contacto.php" class="boton-amarillo-inline">Contactános</a>
</section>

<div class="contenedor seccion seccion-inferior">
  <section class="blog">
    <h3>Nuestro Blog</h3>
    <article class="entrada-blog">
      <div class="imagen">
        <picture>
          <source srcset="build/img/blog1.webp" type="image/webp" />
          <source srcset="build/img/blog1.jpg" type="image/jpeg" />
          <img src="build/img/blog1.jpg" alt="Foto ilustrativa del blog" loading="lazy" />
        </picture>
      </div>
      <div class="texto-entrada">
        <a href="entrada.php">
          <h4>Zonas en desarrollo dentro de Bogotá</h4>
          <p class="informacion-meta">
            Escrito el: <span>20/10/2021</span> por:
            <span>Admin</span>
          </p>

          <p>
            Te encuentras buscando hogar en Bogotá y no sabes que zonas son
            las mejores para tu futuro y el de tu familia.
          </p>
        </a>
      </div>
    </article>

    <article class="entrada-blog">
      <div class="imagen">
        <picture>
          <source srcset="build/img/blog2.webp" type="image/webp" />
          <source srcset="build/img/blog2.jpg" type="image/jpeg" />
          <img src="build/img/blog2.jpg" alt="Foto ilustrativa del blog" loading="lazy" />
        </picture>
      </div>
      <div class="texto-entrada">
        <a href="entrada.php">
          <h4>Guía para buscar Apartamento en Bogotá</h4>
          <p class="informacion-meta">
            Escrito el: <span>20/10/2021</span> por:
            <span>Admin</span>
          </p>

          <p>
            El paso a paso para encontrar un apartamento que se ajuste a tus
            necesidades y a las de toda tu familia.
          </p>
        </a>
      </div>
    </article>
  </section>
  <section class="testimoniales">
    <h3>Testimoniales</h3>
    <div class="testimonial">
      <blockquote>
        Gran atencion y ayuda por parte del personal, nos guiaron para
        conseguir una casa dentro de Bogotá
      </blockquote>
      <p>- Nicolas Caballero</p>
    </div>
  </section>
</div>

<?php incluirTemplate('footer') ?>