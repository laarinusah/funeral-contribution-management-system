<?php

$host = getenv("DB_HOST");
$user = getenv("DB_USER");
$password = getenv("DB_PASSWORD");
$dbname = getenv("DB_NAME");
$port = getenv("DB_PORT");


$conn = mysqli_init();

mysqli_ssl_set($conn, NULL, NULL, NULL, NULL, NULL);

mysqli_real_connect(
    $conn,
    $host,
    $user,
    $password,
    $dbname,
    $port,
    NULL,
    MYSQLI_CLIENT_SSL
);


if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

?>