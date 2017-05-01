<?php

	require_once('../../conn.php');

	try
	{
		$command = $conn->query('SELECT turmas.id, usuarios.nome as usuario, escolas.nome as escola, turmas.horario, turmas.dia, turmas.disciplina FROM cronogramas.usuarios, cronogramas.escolas, cronogramas.turmas WHERE usuarios.id = turmas.usuario_id AND escolas.id = turmas.escola_id;');

		while($row = $command->fetch(PDO::FETCH_ASSOC))
		{
			$json .= '{"id":"' . $row['id'] . '",';
			$json .= '"usuario":"' . $row['usuario'] . '",';
			$json .= '"escola":"' . $row['escola'] . '",';
			$json .= '"horario":"' . $row['horario'] . '",';
			$json .= '"dia":"' . $row['dia'] . '",';
			$json .= '"disciplina":"' . $row['disciplina'] . '"},';
		}

		echo '[' . utf8_encode(substr($json, 0, (strlen($json) - 1))) . ']';
		header('Location: ../../../manager.html#/class');

	}
	catch(PDOException $e)
	{
		echo 'Erro: ' . $e->getMessage();
	}

?>
