<?php

	require_once('../../conn.php');

	try
	{
		$command = $conn->query('SELECT * FROM cronogramas.aulas');

		while($row = $command->fetch(PDO::FETCH_ASSOC))
		{
			$json .= '{"id":"' . $row['id'] . '",';
			$json .= '"nome":"' . $row['nome'] . '",';
			$json .= '"nivel":"' . $row['nivel'] . '",';
			$json .= '"disciplina":"' . $row['disciplina'] . '",';
			$json .= '"descricao":"' . $row['descricao'] . '",';
			$json .= '"documento":"' . $row['documento'] . '"},';
		}

		echo '[' . utf8_encode(substr($json, 0, (strlen($json) - 1))) . ']';

	}
	catch(PDOException $e)
	{
		echo 'Erro: ' . $e->getMessage();
		header('Location: ../../../manager.html#/lessons');
	}

?>
