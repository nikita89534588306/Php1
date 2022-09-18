<?php
    if($_COOKIE['login'] == ''){
        header('Location: /reg.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <?php
    $website_title = 'Добавление статьи';
    require 'blocks/head.php';
  ?>

</head>

<body>

  <?php require 'blocks/header.php'; ?>

  <main class="container mt-5">
    <div class="row">
      <div class="col-md-8 mb-3">
        <h4>Добавление статьи</h4>
        <form action="" method="post">
          <label for="title">Заголовок статьи</label>
          <input type="text" name="title" id="title" class="form-control">

          <label for="intro">Интро статьи</label>
          <textarea name="intro" id="intro" class="form-control"></textarea>

          <label for="text">Текст статьи</label>
          <textarea name="text" id="text" class="form-control"></textarea>
          <div class="alert alert-danger mt-2" id="errBlock" style="display: none;"></div>

          <button type="button"  id="atricle_send" class="btn btn-success mt-5">
            Добавить
          </button>
        </form>
      </div>

      <?php require 'blocks/aside.php'; ?>
    </div>
  </main>

  <?php require 'blocks/footer.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script>

    const title = document.querySelector('#title');
    const intro = document.querySelector('#intro');
    const text = document.querySelector('#text');
    
    const atricle_send = document.querySelector('#atricle_send');

    
    atricle_send.addEventListener('click', function () {
      axios({
        method: 'post',
        url: '/axios/add_article.php',
        data: {
            title:   title.value,
            intro:      intro.value,
            text:      text.value,
        }
      })
      .then(function (res) {
        console.log(res.data);
        if(res.data === "Готово") {
          errBlock.style.display = "none";
          atricle_send.textContent  = "Все готово";
        }
        else {
          errBlock.style.display = "block";
          errBlock.textContent = res.data;
        }
      })
    });    

  </script>

</body>
</html>
