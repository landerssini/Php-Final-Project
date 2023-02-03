<?php 
  $host = "localhost";
  $db = "favorites_movies";
  $user = "root";
  $password = "";
  $charset = "utf8";

  // DSN - Data Source Name

  $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

  // Opciones del PDO

  $opciones = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ];

  // Establecer conexión con la base de datos usando el DBH - DataBase Handle

  try{
      $dbh = new PDO($dsn, $user, $password, $opciones);
  }catch(PDOException $e){
      $e->getMessage();
  }


?>