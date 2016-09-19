<?php

$mysqli = mysqli_connect("localhost", "root", "root", "mini-blog");
if (mysqli_connect_errno()) {
    header('Location: error.php?db_error=' . mysqli_connect_error());
    exit();
}