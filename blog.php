<?php
require 'includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
  <h1>Nuestro Blog</h1>

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
        <p>Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>

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
        <p>Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>

        <p>
          El paso a paso para encontrar un apartamento que se ajuste a tus
          necesidades y a las de toda tu familia.
        </p>
      </a>
    </div>
  </article>
  <article class="entrada-blog">
    <div class="imagen">
      <picture>
        <source srcset="build/img/blog3.webp" type="image/webp" />
        <source srcset="build/img/blog3.jpg" type="image/jpeg" />
        <img src="build/img/blog3.jpg" alt="Foto ilustrativa del blog" loading="lazy" />
      </picture>
    </div>
    <div class="texto-entrada">
      <a href="entrada.php">
        <h4>Zonas en desarrollo dentro de Bogotá</h4>
        <p>Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>

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
        <source srcset="build/img/blog4.webp" type="image/webp" />
        <source srcset="build/img/blog4.jpg" type="image/jpeg" />
        <img src="build/img/blog4.jpg" alt="Foto ilustrativa del blog" loading="lazy" />
      </picture>
    </div>
    <div class="texto-entrada">
      <a href="entrada.php">
        <h4>Guía para buscar Apartamento en Bogotá</h4>
        <p>Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>

        <p>
          El paso a paso para encontrar un apartamento que se ajuste a tus
          necesidades y a las de toda tu familia.
        </p>
      </a>
    </div>
  </article>
</main>

<?php incluirTemplate('footer') ?>