<!DOCTYPE html>
<html lang="ru">
<head>
  <?php
    $website_title = 'Авторизация на сайте';
    require 'blocks/head.php';
  ?>

</head>

<body>

  <?php require 'blocks/header.php'; ?>

  <main class="container mt-5">
    <div class="row">
      <div class="col-md-8 mb-3">
        <?php
            if($_COOKIE['log'] == ''): 
        ?>
        <h4>Форма авторизации</h4>
        <form action="" method="post">

          <label for="login">Логин</label>
          <input type="text" name="login" id="login" class="form-control">

          <label for="pass">Пароль</label>
          <input type="password" name="pass" id="pass" class="form-control">

          <div class="alert alert-danger mt-2" id="errBlock" style="display: none;"></div>

          <button type="button"  id="auth_user" class="btn btn-success mt-5">
            Войти
          </button>
        </form>
        <?php else: ?>
            <h2><?=$_COOKIE['log']?></h2>
            <button class="btn btn-danger" id="exit_btn">Выйти</button>
        <?php endif;?>

      </div>

      <?php require 'blocks/aside.php'; ?>
    </div>
  </main>

  <?php require 'blocks/footer.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script>

    const button = document.querySelector('#auth_user');

    const login = document.querySelector('#login');
    const pass = document.querySelector('#pass');

    const errBlock = document.querySelector('#errBlock');
    
    button.addEventListener('click', function () {
      axios({
        method: 'post',
        url: '/axios/auth.php',
        data: {
          login:      login.value,
          pass:       pass.value,
        }
      })
      .then(function (res) {
        console.log(res.data);
        if(res.data === "Готово") {
          errBlock.style.display = "none";
          button.textContent  = "Готово";
          document.location.reload(true);
        }
        else {
          errBlock.style.display = "block";
          errBlock.textContent = res.data;
        }
      })
    });    

  </script>
  <script>

    const exit = document.querySelector('#exit_btn');

    exit.addEventListener('click', function () {
        console.log("asd")
    axios({
        method: 'post',
        url: '/axios/exit.php',
        data: {}
    })
    .then(function (res) {
        document.location.reload(true);
    })
    });    

  </script>
</body>
</html>
