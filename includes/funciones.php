<?php

require 'app.php';

function incluirTemplate(string $nombre, bool $inicio = false): void
{
  include TEMPLATES_URL . "/${nombre}.php";
}


function estaAutenticado(): bool
{
  session_start();

  $auth = $_SESSION['login'];

  if ($auth) {
    return true;
  }

  return false;
}
