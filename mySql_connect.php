<?php 
  $user = 'root';
  $password = '';
  $db = 'testPhp1';
  $host = 'localhost';
  
  $dsn = 'mysql:host='.$host.';dbname='.$db;
  $pdo = new PDO($dsn, $user, $password); 
  ?>