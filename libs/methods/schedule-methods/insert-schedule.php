<?php

    require_once('../../conn.php');

    try
    {
        $command = $conn->prepare('INSERT INTO cronogramas.agenda VALUES(null, :usuario, :dia, :hora, :descricao, :prioridade)');
        $command->bindValue(':usuario', $_POST['usuario'], PDO::PARAM_INT);
        $command->bindValue(':dia', $_POST['dia'], PDO::PARAM_INT);
        $command->bindValue(':hora', $_POST['hora'], PDO::PARAM_INT);
        $command->bindValue(':descricao', $_POST['descricao'], PDO::PARAM_STR);
        $command->bindValue(':prioridade', $_POST['prioridade'], PDO::PARAM_INT);
        $command->execute();
        header('Location: ../../../manager.html#/schedule');
    }
    catch(PDOException $e)
    {
        echo "<script>alert('Erro: " . $e->getMessage() . "');</script>";
        header('Location: ../../../manager.html#/schedule');
    }

?>
