<?php

	header('Content-Type: text/html; charset=utf-8');

    try
    {
        $conn = new PDO("mysql:localhost;dbName=cronogramas", "root", "ic@r01408");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo 'Erro: ' . $e->getMessage();
    }

?>