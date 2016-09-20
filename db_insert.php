<?php
require_once 'db_connection.php';

$now = new DateTime();
$now->setTimezone(new DateTimeZone('Europe/Moscow'));

switch ($_POST['table_name']) {
    case 'record':
        $sql = "INSERT INTO record (author, date, text) VALUES ('" . $_POST['name'] . "', '"
            . $now->format('Y-m-d H:i:s') . "', '" . $_POST['text'] . "')";
        break;
    case 'comments':
        $sql = "INSERT INTO comments (id_record, author, date, text) VALUES ('" . $_POST['id_record']
            . "', '" . $_POST['name'] . "', '" . $now->format('Y-m-d H:i:s')
            . "', '" . $_POST['text'] . "')";
        break;
}

if ($mysqli->query($sql) === TRUE) {
    echo "OK";
} else {
    echo $mysqli->error . ";" . $sql;
}
