<?php
require_once 'functions.php';

$all_data_sorted_by_comments = sortRecordsBy(getAllRecords($mysqli), 'num_comments');

foreach ($all_data_sorted_by_comments as $record) {
    if(empty($_GET['id'])) {
        echo "error";
        $current_record = null;
    }
    if ($record['id_record'] == $_GET['id']) {
        $current_record = $record;
    }
}

$select_query = "SELECT * FROM comments WHERE id_record=" . $current_record['id_record'];

$result = $mysqli->query($select_query);
if ($result) {

    $comments = array();

    $i = 0;

    while ($comment = $result->fetch_array(MYSQLI_ASSOC)) {

        $comments[$i] = [
            'id_comment' => $comment['id_comment'],
            'author' => $comment['author'],
            'date' => $comment['date'],
            'text' => $comment['text'],
        ];
        $i++;
    }

} else {
    echo "error";
    $comments = null;
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mini-blog | Вася (12.43.12)</title>
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

    <!-- RECORD-->
    <div class="container">
        <strong><p><?=$current_record['author']?> (<span><?=$current_record['date']?></span>)</p></strong>

        <p class="record-text"><?=$current_record['text']?></p>

        <!-- COMMENTS-->
        <div class="comments-container">
            <p class="form-caption">Комментарии:</p>
            <ul class="list-unstyled">
                <?php foreach ($comments as $comment) { ?>
                    <li>
                        <strong><p><?= $comment['author'] ?> (<span><?= $comment['date'] ?></span>):</p></strong>

                        <p><?= $comment['text'] ?></p>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <!-- END COMMENTS-->
    </div>
    <!-- END RECORD-->

    <!-- FORM NEW RECORD-->
    <div class="container">
        <p class="form-caption">Добавить комментарий</p>

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
                    <textarea id="inputText" class="form-control" rows="3" placeholder="Текст комментария"></textarea>
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