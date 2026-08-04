<?php

$host = getenv("DB_HOST") ?: "database";
$user = getenv("DB_USER") ?: "fcms_user";
$password = getenv("DB_PASSWORD") ?: "fcms_password";
$dbname = getenv("DB_NAME") ?: "funeral_system";

$conn = mysqli_connect(
    $host,
    $user,
    $password,
    $dbnames
);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

?>