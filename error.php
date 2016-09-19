<?php
$error_text = "Ты как сюда попал?";
if (isset($_GET['page'])) {
    $error_text = "Страницы '" . $_GET['page'] . "' не существует. Уходите от сюда!";
}
if (isset($_GET['db_error'])) {
    $error_text = "Ошибка соединения с базой данных - " . $_GET['db_error'];
}
if (isset($_GET['db_table_read_error'])) {
    $error_text = "Ошибка чтения из базы данных - " . $_GET['db_table_read_error'];
}
if (isset($_GET['db_table_write_error'])) {
    $error_text = "Ошибка записи в базу данных - " . $_GET['db_table_write_error'] . "<br><br>SQL: " . $_GET['sql'];
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mini-blog | Ошибка </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.bxslider.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!--HEADER-->
<header id="header" class="container-fluid">
    <a href="/mini-blog/"><h1 class="text-center">mini-blog</h1></a>
</header>
<!--END HEADER-->

<!--CONTENT-->
<div class="content container-fluid">
    <h1 class="text-center"><?=$error_text;?></h1>
    <a href="/mini-blog/"><h5 class="text-center">Перейти на главную</h5></a>
</div>
<!--END CONTENT-->

<!--FOOTER-->
<footer id="footer">
    <h3 class="text-center">2016 ©</h3>
</footer>
<!--END FOOTER-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
<script src="js/jquery.bxslider.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>