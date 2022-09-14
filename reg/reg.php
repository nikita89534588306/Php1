<?php
  $_POST = json_decode(file_get_contents('php://input'), true);
  print($_POST);

  $username = trim(filter_var($_POST['username' ], FILTER_SANITIZE_STRING));
  $email = trim(filter_var($_POST   ['email'    ], FILTER_SANITIZE_EMAIL));
  $login = trim(filter_var($_POST   ['login'    ], FILTER_SANITIZE_STRING));
  $pass = trim(filter_var($_POST    ['pass'     ], FILTER_SANITIZE_STRING));

  if(strlen($username) <= 3)
    exit();
  else if(strlen($email) <= 3)
    exit();
  else if(strlen($login) <= 3)
    exit();
  else if(strlen($pass) <= 3)
    exit();

  $hash = "sdfjsdkhgs234jh324SDk";
  $pass = md5($pass . $hash);

  $user = 'root';
  $password = '';
  $db = 'testPhp1';
  $host = 'localhost';
  
  $dsn = 'mysql:host='.$host.';dbname='.$db;
  $pdo = new PDO($dsn, $user, $password);
  $sql = 'INSERT INTO users(name, email, login, pass) VALUES(?, ?, ?, ?)';
  $query = $pdo->prepare($sql);
  $query->execute([$username, $email, $login, $pass]);
?>
