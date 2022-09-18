<?php
  $_POST = json_decode(file_get_contents('php://input'), true);

  $title = trim(filter_var($_POST['title' ], FILTER_SANITIZE_STRING));
  $intro = trim(filter_var($_POST   ['intro'    ], FILTER_SANITIZE_STRING));
  $text = trim(filter_var($_POST   ['text'    ], FILTER_SANITIZE_STRING));

  $err = '';
  if(strlen($title) <= 3)
    $err = 'введите название статьи';
  else if(strlen($intro) <= 15)
    $err = 'введите интро статьи';
  else if(strlen($text) <= 20)
    $err = 'введите тест статьи';


  if($err != "") {
    echo $err;
    exit();
  }


  $hash = "sdfjsdkhgs234jh324SDk";
  $pass = md5($pass . $hash);

  require_once '../mySql_connect.php'; 


  $sql = 'INSERT INTO articles(title, intro, text, date, author) VALUES(?, ?, ?, ?,?)';
  $query = $pdo->prepare($sql);
  $query->execute([$title, $intro, $text, time(), $_COOKIE['login']]);

  echo "Готово";
?>
