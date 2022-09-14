<!DOCTYPE html>
<html lang="ru">
<head>
  <?php
    $website_title = 'Регистрация на сайте';
    require 'blocks/head.php';
  ?>

</head>

<body>

  <?php require 'blocks/header.php'; ?>

  <main class="container mt-5">
    <div class="row">
      <div class="col-md-8 mb-3">
        <h4>Форма регистрации</h4>
        <form action="" method="post">
          <label for="username">Ваше имя</label>
          <input type="text" name="username" id="username" class="form-control">

          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control">

          <label for="login">Логин</label>
          <input type="text" name="login" id="login" class="form-control">

          <label for="pass">Пароль</label>
          <input type="password" name="pass" id="pass" class="form-control">

          <div class="alert alert-danger mt-2" id="errBlock" style="display: none;"></div>

          <button type="button"  id="reg_user" class="btn btn-success mt-5">
            Зарегистрироваться
          </button>
        </form>
      </div>

      <?php require 'blocks/aside.php'; ?>
    </div>
  </main>

  <?php require 'blocks/footer.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script>

    const button = document.querySelector('#reg_user');
    const username = document.querySelector('#username');
    const email = document.querySelector('#email');
    const login = document.querySelector('#login');
    const pass = document.querySelector('#pass');

    const errBlock = document.querySelector('#errBlock');
    
    button.addEventListener('click', function () {
      axios({
        method: 'post',
        url: '/reg/reg.php',
        data: {
          username:   username.value,
          email:      email.value,
          login:      login.value,
          pass:       pass.value,
        }
      })
      .then(function (res) {
        console.log(res.data);
        if(res.data === "Готово") {
          console.log("Ok");
          errBlock.style.display = "none";
          button.textContent  = "Все готово";
        }
        else {
          errBlock.style.display = "block";
          console.log("err");
          errBlock.textContent = res.data;
        }
      })
    });    

  </script>

</body>
</html>
