<?php
require_once 'db_connection.php';

$select_query = "SELECT * FROM record";

$result = $mysqli->query($select_query);
if ($result) {

    $all_data = array();

    $i = 0;

    while ($record = $result->fetch_array(MYSQLI_ASSOC)) {

        $select_query_comments = "SELECT id_comment FROM comments WHERE id_record=" . $record['id_record'];

        $result_comments = $mysqli->query($select_query_comments);

        if (!$result_comments) {
            echo "error";
        }

        $all_data[$i] = [
            'id_record' => $record['id_record'],
            'author' => $record['author'],
            'date' => $record['date'],
            'text' => $record['text'],
            'num_comments' => $result_comments->num_rows,
        ];
        $i++;
    }

    $all_data_sorted_by_comments = sortRecordsByComments($all_data);
} else {
    echo "error";
}

function sortRecordsByComments($records)
{
    $result = $records;

    for ($i = 0; $i < count($result); $i++) {
        for ($j = 0; $j < count($result); $j++) {
            if ($result[$i]['num_comments'] > $result[$j]['num_comments']) {
                $tmp = $result[$j];
                $result[$j] = $result[$i];
                $result[$i] = $tmp;
            }
        }
    }

    return $result;
}

//Обрезает строку до 100 символов, учитывая добавляемое "...", с учетом слов
function trimTo100Char($string)
{
    $tmp_str = mb_substr($string, 0, 97);
    if ($tmp_str[96] != " ") {
        $tmp_str = mb_substr($tmp_str, 0, strripos($tmp_str, " "));
    } else {
        $tmp_str = rtrim($tmp_str);
    }
    return $tmp_str . '...';
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

<!--CONTENT-->
<div class="content container-fluid">

    <!-- POPULAR RECORDS-->
    <div class="container">
        <p class="text-center form-caption">Популярные записи</p>
        <ul class="bxslider">

            <?php for ($i = 0; $i < 5 && $i < count($all_data_sorted_by_comments); $i++) { ?>
                <li>
                    <p><?= $all_data_sorted_by_comments[$i]['author'] ?>
                        (<span><?= $all_data_sorted_by_comments[$i]['date'] ?></span>)</p>

                    <p class="record-text"><?= trimTo100Char($all_data_sorted_by_comments[$i]['text']) ?></p>

                    <p class="comments">Коментариев <span
                            class="badge"><?= $all_data_sorted_by_comments[$i]['num_comments'] ?></span></p>
                    <a href=<?= "record.php?id=" . $all_data_sorted_by_comments[$i]['id_record'] ?>class="pull-right">Читать
                        полностью</a>
                </li>
            <?php } ?>

        </ul>
    </div>
    <!-- END POPULAR RECORDS-->

    <!-- LIST ALL RECORDS-->
    <div id="all-records">
        <?php foreach ($all_data as $record) { ?>
            <!-- RECORD-->
            <div class="container">
                <p><?= $record['author'] ?> (<span><?= $record['date'] ?></span>)</p>

                <p class="record-text"><?= trimTo100Char($record['text']) ?></p>

                <p class="comments">Коментариев <span class="badge"><?= $record['num_comments'] ?></span></p>
                <a href=<?= "record.php?id=" . $record['id_record'] ?>class="pull-right">Читать полностью</a>
            </div>
            <!-- END RECORD-->
        <?php } ?>

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