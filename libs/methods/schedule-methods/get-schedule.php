<?php

	require_once('../../conn.php');

	try
	{
		$command = $conn->query('SELECT agenda.id, usuarios.nome as usuario, agenda.dia, agenda.hora, agenda.descricao, agenda.prioridade FROM cronogramas.agenda, cronogramas.usuarios WHERE usuarios.id = agenda.usuario_id');

		while($row = $command->fetch(PDO::FETCH_ASSOC))
		{
			$json .= '{"id":"' . $row['id'] . '",';
			$json .= '"usuario":"' . $row['usuario'] . '",';
			$json .= '"dia":"' . $row['dia'] . '",';
			$json .= '"hora":"' . $row['hora'] . '",';
			$json .= '"descricao":"' . $row['descricao'] . '",';
			$json .= '"prioridade":"' . $row['prioridade'] . '"},';
		}

		echo '[' . utf8_encode(substr($json, 0, (strlen($json) - 1))) . ']';

	}
	catch(PDOException $e)
	{
		echo 'Erro: ' . $e->getMessage();
		header('Location: ../../../manager.html#/schedule');
	}

?>
