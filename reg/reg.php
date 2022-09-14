<?php
  $_POST = json_decode(file_get_contents('php://input'), true);

  $username = trim(filter_var($_POST['username' ], FILTER_SANITIZE_STRING));
  $email = trim(filter_var($_POST   ['email'    ], FILTER_SANITIZE_EMAIL));
  $login = trim(filter_var($_POST   ['login'    ], FILTER_SANITIZE_STRING));
  $pass = trim(filter_var($_POST    ['pass'     ], FILTER_SANITIZE_STRING));
  
  $err = '';
  if(strlen($username) <= 3)
    $err = 'введите имя';
  else if(strlen($email) <= 3)
    $err = 'ведите почту';
  else if(strlen($login) <= 3)
    $err = 'ведите логин';
  else if(strlen($pass) <= 3)
    $err = 'ведите пароль';

  if($err != "") {
    echo $err;
    exit();
  }


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

  echo "Готово";
?>
