<?php

    require_once('../../conn.php');

    try
    {
        $command = $conn->prepare('INSERT INTO cronogramas.aulas VALUES(null, :nome, :nivel, :disciplina, :descricao, :documento)');

        if(move_uploaded_file($_FILES['documento']['tmp_name'], '../../../img/documentos/' . $_FILES['documento']['name']))
        {
          $command->bindValue(':nome', $_POST['nome'], PDO::PARAM_STR);
          $command->bindValue(':nivel', $_POST['nivel'], PDO::PARAM_INT);
          $command->bindValue(':disciplina', $_POST['disciplina'], PDO::PARAM_INT);
          $command->bindValue(':descricao', $_POST['descricao'], PDO::PARAM_STR);
          $command->bindValue(':documento', $_FILES['documento']['name'], PDO::PARAM_STR);
          $command->execute();
manager        }
    }
    catch(PDOException $e)
    {
        echo "<script>alert('Erro: " . $e->getMessage() . "');</script>";
        header('Location: ../../../manager.html#/lessons');
    }

?>
