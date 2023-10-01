<?php

    session_start();

    include_once("connection.php");
    include_once("url.php");

    $querry = "SELECT * FROM contacts";

    $stmt = $conn->prepare($querry);
    $stmt->execute();
    $contacts = $stmt->fetchAll();