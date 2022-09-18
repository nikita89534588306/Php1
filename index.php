<!DOCTYPE html>
<html lang="en">
<head>
<?php
    $website_title = 'PHP блог';
    require 'blocks/head.php';
?>
</head>
<body>
    <?php require 'blocks/header.php'; ?>

    <main class="container mt-5">
        <div class="row">
            <div class="col-md-8 mb-3">
                <?php
                    require_once 'mySql_connect.php';
                    $sql = 'SELECT * FROM `articles` ORDER BY `date` DESC';
                    $query = $pdo->query($sql);
                    while($row = $query->fetch(PDO::FETCH_OBJ)){
                        echo "<h2>$row->title</h2>
                        <p>$row->intro</p>
                        <p>Автор статьи: $row->author</p>
                        <a href='/news.php?id=$row->id' title='$row->title'>
                            <button class='btn btn-warning mb-50px'>Прочитать больше</button>
                        </a>";    
                    }
                ?>
            </div>

            <?php require 'blocks/aside.php'; ?>
        </div>
    </main>

    <?php require 'blocks/footer.php'; ?>

</body>
</html>