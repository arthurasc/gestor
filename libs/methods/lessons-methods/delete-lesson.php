<?php

	require_once('../../conn.php');

	try
	{
		$command = $conn->prepare('DELETE FROM cronogramas.aulas WHERE id = :id');
		$command->bindValue(':id', $_GET['i'], PDO::PARAM_INT);
		$command->execute();
		header('Location: ../../../manager.html#/lessons');
	}
	catch(PDOException $e)
	{
		echo 'Error: ' . $e->getMessage();
		header('Location: ../../../manager.html#/lessons');
	}

?>
