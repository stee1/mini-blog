<?php
require_once 'db_connection.php';

$sql = "INSERT INTO record (author, date, text) VALUES ('".$_POST['name']."', '".date("Y-m-d H:i:s")."', '".$_POST['text']."')";

if ($mysqli->query($sql) === TRUE) {
    echo "OK";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}
