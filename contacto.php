<?php
include 'includes/templates/header.php'
?>

<main class="contenedor seccion">
  <h1>Contacto</h1>

  <picture>
    <source srcset="build/img/destacada3.webp" type="image/webp" />
    <source srcset="build/img/destacada3.jpg" type="image/jpeg" />
    <img src="build/img/destacada3.jpg" alt="Imagen Contacto" loading="lazy" />
  </picture>

  <h2>Llene el formulario de contacto</h2>
  <form action="" class="formulario">
    <fieldset>
      <legend>Información personal</legend>

      <label for="nombre">Nombre</label>
      <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" />

      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Tu Email" />

      <label for="telefono">Telefono</label>
      <input type="tel" id="telefono" name="telefono" placeholder="Tu Telefono" />

      <label for="mensaje">Mensaje</label>
      <textarea name="mensaje" id="mensaje"></textarea>
    </fieldset>
    <fieldset>
      <legend>Información sobre la propiedad</legend>

      <label for="opciones">Vende o compra</label>
      <select name="opciones" id="opciones">
        <option value="" disabled selected>-- Seleccione --</option>
        <option value="Compra">Compra</option>
        <option value="Vende">Vende</option>
      </select>

      <label for="presupuesto">Precio o presupuesto</label>
      <input type="number" id="presupuesto" name="presupuesto" placeholder="Precio o presupuesto" />
    </fieldset>

    <fieldset>
      <legend>Contacto</legend>

      <p>Como desea ser contactado</p>
      <div class="forma-contacto">
        <label for="contactar-telefono">Teléfono</label>
        <input type="radio" id="contactar-telefono" name="contacto" value="telefono" />

        <label for="contactar-email">Email</label>
        <input type="radio" id="contactar-email" name="contacto" value="email" />
      </div>

      <p>Si eligió teléfono, elija la fecha y la hora</p>
      <label for="fecha">Fecha</label>
      <input type="date" id="fecha" name="fecha" />

      <label for="hora">Hora</label>
      <input type="time" id="hora" name="hora" min="09:00" max="18:00" />
    </fieldset>

    <input type="submit" value="Enviar" class="boton-verde" />
  </form>
</main>

<?php include 'includes/templates/footer.php' ?>