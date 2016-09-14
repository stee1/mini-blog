<?php
require_once 'db_connection.php';


$select_query = "SELECT * FROM record WHERE id_record = 1";

$result = $mysqli->query($select_query);
if ($result) {
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $author = $row['author'];
}
else {
    echo "error";
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mini-blog | Все записи</title>
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
    <a href="index.php"><h1 class="text-center">mini-blog</h1></a>
</header>
<!--END HEADER-->
<?php echo $author;?>
<!--CONTENT-->
<div class="content container-fluid">

    <!-- POPULAR RECORDS-->
    <div class="container">
        <p class="text-center form-caption">Популярные записи</p>
        <ul class="bxslider">
            <li>
                <p>Author 1 (<span>12.45.12</span>)</p>

                <p class="record-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet asperiores beatae
                    blanditiis consequa.</p>

                <p class="comments">Коментариев <span class="badge">4</span></p>
                <a href="record.php" class="pull-right">Читать полностью</a>
            </li>
            <li>
                <p>Author 2 (<span>12.45.12</span>)</p>

                <p class="record-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet asperiores beatae
                    blanditiis consequa.</p>

                <p class="comments">Коментариев <span class="badge">4</span></p>
                <a href="record.php" class="pull-right">Читать полностью</a>
            </li>
            <li>
                <p>Author 3 (<span>12.45.12</span>)</p>

                <p class="record-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet asperiores beatae
                    blanditiis consequa.</p>

                <p class="comments">Коментариев <span class="badge">4</span></p>
                <a href="record.php" class="pull-right">Читать полностью</a>
            </li>
            <li>
                <p>Author 4 (<span>12.45.12</span>)</p>

                <p class="record-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet asperiores beatae
                    blanditiis consequa.</p>

                <p class="comments">Коментариев <span class="badge">4</span></p>
                <a href="record.php" class="pull-right">Читать полностью</a>
            </li>
            <li>
                <p>Author 5 (<span>12.45.12</span>)</p>

                <p class="record-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet asperiores beatae
                    blanditiis consequa.</p>

                <p class="comments">Коментариев <span class="badge">4</span></p>
                <a href="record.php" class="pull-right">Читать полностью</a>
            </li>

        </ul>
    </div>
    <!-- END POPULAR RECORDS-->

    <!-- LIST ALL RECORDS-->
    <div id="all-records">
        <!-- RECORD-->
        <div class="container">
            <p>Author (<span>12.45.12</span>)</p>

            <p class="record-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet asperiores beatae
                blanditiis consequa.</p>

            <p class="comments">Коментариев <span class="badge">4</span></p>
            <a href="record.php" class="pull-right">Читать полностью</a>
        </div>
        <!-- END RECORD-->
    </div>
    <!-- END LIST ALL RECORDS-->

    <!-- FORM NEW RECORD-->
    <div class="container">
        <p class="form-caption">Добавить запись</p>

        <form class="form-horizontal">
            <div class="form-group">
                <label for="inputName" class="col-xs-1 control-label">Автор</label>

                <div class="col-xs-11">
                    <input type="text" class="form-control" id="inputName" placeholder="Имя">
                </div>
            </div>
            <div class="form-group">
                <label for="inputText" class="col-xs-1 control-label">Текст</label>

                <div class="col-xs-11">
                    <textarea id="inputText" class="form-control" rows="3" placeholder="Текст публикации"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary pull-right ">Отправить</button>
                </div>
            </div>
        </form>
    </div>
    <!-- END FORM NEW RECORD-->
</div>
<!--END CONTENT-->

<!--FOOTER-->
<footer id="footer">
    <h3 class="text-center">2016 ©</h3>
</footer>
<!--END FOOTER-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="js/jquery.bxslider.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>