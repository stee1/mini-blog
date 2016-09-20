<?php
require_once 'functions.php';

$all_data_sorted_by_comments = sortRecordsBy(getAllRecords($mysqli), 'num_comments');
$all_data_sorted_by_date = sortRecordsBy(getAllRecords($mysqli), 'date');

//$timezone = date_default_timezone_get();
//echo "The current server timezone is: " . $timezone;
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
    <a href="/mini-blog/"><h1 class="text-center">mini-blog</h1></a>
</header>
<!--END HEADER-->

<!--CONTENT-->
<div class="content container-fluid">

    <!-- POPULAR RECORDS-->
    <div class="container">
        <p class="text-center form-caption">Популярные записи</p>
        <ul class="bxslider">
            <?php for ($i = 0; $i < 5 && $i < count($all_data_sorted_by_comments); $i++) { ?>
                <li>
                    <?=echoRecord($all_data_sorted_by_comments[$i]);?>
                </li>
            <?php } ?>
        </ul>
    </div>
    <!-- END POPULAR RECORDS-->

    <!-- LIST ALL RECORDS-->
    <div id="all-records">
        <?php foreach ($all_data_sorted_by_date as $record) { ?>
            <!-- RECORD-->
            <div class="container">
                <?=echoRecord($record);?>
            </div>
            <!-- END RECORD-->
        <?php } ?>

    </div>
    <!-- END LIST ALL RECORDS-->

    <!-- FORM NEW RECORD-->
    <div class="container">
        <p class="form-caption">Добавить запись</p>

        <form id="form_record" class="form-horizontal">
            <div class="form-group has-feedback">
                <label for="inputName" class="col-xs-1 control-label">Автор</label>

                <div class="col-xs-11">
                    <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Имя">
                    <span class="glyphicon form-control-feedback" id="inputName1"></span>
                </div>

            </div>
            <div class="form-group has-feedback">
                <label for="inputText" class="col-xs-1 control-label">Текст</label>

                <div class="col-xs-11">
                    <textarea id="inputText" name="inputText" class="form-control" rows="3"
                              placeholder="Текст публикации"></textarea>
                    <span class="glyphicon form-control-feedback" id="inputText1"></span>
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
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
<script src="js/jquery.bxslider.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>