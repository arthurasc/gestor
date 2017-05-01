<?php

	require_once('../../conn.php');

	try
	{
		$command = $conn->query('SELECT turmas.id, turmas.usuario_id, escolas.nome as escola, turmas.horario, turmas.dia, turmas.disciplina FROM cronogramas.escolas, cronogramas.turmas WHERE escolas.id = turmas.escola_id;');

		while($row = $command->fetch(PDO::FETCH_ASSOC))
		{
			$json .= '{"id":"' . $row['id'] . '",';
			$json .= '"usuario":"' . $row['usuario_id'] . '",';
			$json .= '"escola":"' . $row['escola'] . '",';
			$json .= '"horario":"' . $row['horario'] . '",';
			$json .= '"dia":"' . $row['dia'] . '",';
			$json .= '"disciplina":"' . $row['disciplina'] . '"},';
		}

		echo '[' . utf8_encode(substr($json, 0, (strlen($json) - 1))) . ']';
		header('Location: ../../../teacher.html#/check');

	}
	catch(PDOException $e)
	{
		echo '<script>alert("Erro: ' . $e->getMessage() . '");</script>';
    header('Location: ../../../teacher.html#/check');
	}

?>
