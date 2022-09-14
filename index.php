<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="icon" href="/img/favicon.ico">
    <link rel="stylesheet" href="/css/main.css">
    <title>Document</title>
</head>
<body>
    <?php require 'blocks/header.php'; ?>

    <main class="container mt-5">
        <div class="row">
            <div class="col-md-8 mb-3">
                Основная часть сайта
            </div>

            <?php require 'blocks/aside.php'; ?>
        </div>
    </main>

    <?php require 'blocks/footer.php'; ?>
</body>
</html>