<?php
  $_POST = json_decode(file_get_contents('php://input'), true);

 $login = trim(filter_var($_POST   ['login'    ], FILTER_SANITIZE_STRING));
  $pass = trim(filter_var($_POST    ['pass'     ], FILTER_SANITIZE_STRING));
  
  $err = '';

  if(strlen($login) <= 3)
    $err = 'введите логин';
  else if(strlen($pass) <= 3)
    $err = 'введите пароль';

  if($err != "") {
    echo $err;
    exit();
  }


  $hash = "sdfjsdkhgs234jh324SDk";
  $pass = md5($pass . $hash);

  require_once '../mySql_connect.php'; 

  $sql =' SELECT `id` FROM `users` WHERE `login`= :login && `pass`=:pass';
  $query = $pdo->prepare($sql);
  $query->execute(['login' => $login, 'pass'=>$pass]);
  $user = $query->fetch(PDO::FETCH_OBJ);

  if($user->id==0) echo 'Такого пользователя не существует';
  else {
    setcookie('log', $login, time()+3600*24*30, "/");
    echo "Готово";
  }


?>