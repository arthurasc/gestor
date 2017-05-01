<?php

	require_once('../../conn.php');

	try
	{
		$command = $conn->query('SELECT * FROM cronogramas.escolas');

		while($row = $command->fetch(PDO::FETCH_ASSOC))
		{
			$json .= '{"id":"' . $row['id'] . '",';
			$json .= '"nome":"' . $row['nome'] . '",';
			$json .= '"telefone":"' . $row['telefone'] . '",';
			$json .= '"responsavel":"' . $row['responsavel'] . '"},';
		}

		echo '[' . utf8_encode(substr($json, 0, (strlen($json) - 1))) . ']';

	}
	catch(PDOException $e)
	{
		echo 'Erro: ' . $e->getMessage();
		header('Location: ../../../manager.html#/schools');
	}

?>
