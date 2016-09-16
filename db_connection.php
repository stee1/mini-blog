<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 14.09.2016
 * Time: 15:34
 */

$mysqli = mysqli_connect("localhost", "root", "root", "mini-blog");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}