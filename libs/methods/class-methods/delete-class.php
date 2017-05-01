<?php

	require_once('../../conn.php');

	try
	{
		$command = $conn->prepare('DELETE FROM cronogramas.turmas WHERE id = :id');
		$command->bindValue(':id', $_GET['i'], PDO::PARAM_INT);
		$command->execute();
		header('Location: ../../../manager.html#/class');
	}
	catch(PDOException $e)
	{
		echo 'Error: ' . $e->getMessage();
		header('Location: ../../../manager.html#/class');
	}

?>
