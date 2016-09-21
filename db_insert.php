<?php
require_once 'db_connection.php';

$now = new DateTime();
$now->setTimezone(new DateTimeZone('Europe/Moscow'));

$table_name = htmlspecialchars($_POST['table_name']);
$table_name = addslashes($table_name);
$name = htmlspecialchars($_POST['name']);
$name = addslashes($name);
$text = htmlspecialchars($_POST['text']);
$text = addslashes($text);

switch ($table_name) {
    case 'record':
        $sql = "INSERT INTO record (author, date, text) VALUES ('" . $name . "', '"
            . $now->format('Y-m-d H:i:s') . "', '" . $text . "')";
        break;
    case 'comments':
        $id_record = htmlspecialchars($_POST['id_record']);

        $sql = "INSERT INTO comments (id_record, author, date, text) VALUES ('" . $id_record
            . "', '" . $name . "', '" . $now->format('Y-m-d H:i:s')
            . "', '" . $text . "')";
        break;
}

if ($mysqli->query($sql) === TRUE) {
    echo "OK";
} else {
    echo $mysqli->error . ";" . $sql;
}
