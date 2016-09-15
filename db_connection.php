<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 14.09.2016
 * Time: 15:34
 */

$mysqli = mysqli_connect("localhost", "root", "root", "mini-blog");

if (!$mysqli) {
    echo "возникла проблема, связанная с подключением к базе данных, " .
        "ошибка: ".
        $mysqli->connect_error;
}