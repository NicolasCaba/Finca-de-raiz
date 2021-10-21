<?php

require 'app.php';

function incluirTemplate(string $nombre, bool $inicio = false): void
{
  include TEMPLATES_URL . "/${nombre}.php";
}
