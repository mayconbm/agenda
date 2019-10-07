<?php

$server = "localhost";
$user = "root";
$password = "";
$dbname = "listabd";

$conn = mysqli_connect ($server, $user, $password, $dbname);
mysqli_set_charset( $conn, 'utf8');