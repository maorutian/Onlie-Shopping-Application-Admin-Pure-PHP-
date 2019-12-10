<?php

function db_connect() {
  $connection = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $connection;
}


?>
