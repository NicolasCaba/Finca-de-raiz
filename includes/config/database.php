<?php

function conectarDB(): mysqli
{
  $db = mysqli_connect('localhost', 'root', 'root', 'finca_raiz');

  if (!$db) {
    echo "No fue posible la conexion a la base de datos";
    exit;
  }

  return $db;
}
