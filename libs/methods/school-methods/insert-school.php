<?php

    require_once('../../conn.php');

    try
    {
        $command = $conn->prepare('INSERT INTO cronogramas.escolas VALUES(null, :nome, :telefone, :responsavel)');
        $command->bindValue(':nome', $_POST['nome'], PDO::PARAM_STR);
        $command->bindValue(':telefone', $_POST['telefone'], PDO::PARAM_STR);
        $command->bindValue(':responsavel', $_POST['responsavel'], PDO::PARAM_STR);
        $command->execute();
        header('Location: ../../../manager.html#/schools');
    }
    catch(PDOException $e)
    {
        echo "<script>alert('Erro: " . $e->getMessage() . "');</script>";
        header('Location: ../../../manager.html#/schools');
    }

?>
