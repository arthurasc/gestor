<?php

    require_once('../../conn.php');

    try
    {
        $command = $conn->prepare('INSERT INTO cronogramas.turmas VALUES(null, :usuario, :escola, :horario, :dia, :disciplina)');
        $command->bindValue(':usuario', $_POST['usuario'], PDO::PARAM_STR);
        $command->bindValue(':escola', $_POST['escola'], PDO::PARAM_STR);
        $command->bindValue(':horario', $_POST['horario'], PDO::PARAM_STR);
        $command->bindValue(':dia', $_POST['dia'], PDO::PARAM_STR);
        $command->bindValue(':disciplina', $_POST['disciplina'], PDO::PARAM_STR);
        $command->execute();
        header('Location: ../../../manager.html#/class');
    }
    catch(PDOException $e)
    {
        echo "<script>alert('Erro: " . $e->getMessage() . "');</script>";
        header('Location: ../../../manager.html#/class');
    }

?>
