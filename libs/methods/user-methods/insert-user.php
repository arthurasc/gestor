<?php

    require_once('../../conn.php');

    try
    {
        $command = $conn->prepare('INSERT INTO cronogramas.usuarios VALUES(null, :nome, "123456", :nivel)');
        $command->bindValue(':nome', $_POST['nome'], PDO::PARAM_STR);
        $command->bindValue(':nivel', $_POST['nivel'], PDO::PARAM_INT);
        $command->execute();
        header('Location: ../../../manager.html');
    }
    catch(PDOException $e)
    {
        echo "<script>alert('Erro: " . $e->getMessage() . "');</script>";
        header('Location: ../../../manager.html');
    }

?>
