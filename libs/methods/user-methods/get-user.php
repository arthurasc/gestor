<?php

	require_once('../../conn.php');

	try
	{
		$command = $conn->query('SELECT * FROM cronogramas.usuarios');

		while($row = $command->fetch(PDO::FETCH_ASSOC))
		{
			$json .= '{"id":"' . $row['id'] . '",';
			$json .= '"nome":"' . $row['nome'] . '",';
			$json .= '"senha":"' . $row['senha'] . '",';
			$json .= '"nivel":"' . $row['nivel'] . '"},';
		}

		echo '[' . utf8_encode(substr($json, 0, (strlen($json) - 1))) . ']';

	}
	catch(PDOException $e)
	{
		echo 'Erro: ' . $e->getMessage();
		header('Location: ../../../manager.html');
	}

?>
