<?php

	require_once('../../conn.php');

	try
	{
		$command = $conn->query('SELECT usuarios.nome, agenda.id, agenda.usuario_id, agenda.dia, agenda.hora, agenda.descricao, agenda.prioridade FROM cronogramas.agenda, cronogramas.usuarios WHERE usuarios.id = agenda.usuario_id');

		while($row = $command->fetch(PDO::FETCH_ASSOC))
		{
			$json .= '{"id":"' . $row['id'] . '",';
			$json .= '"id_usu":"' . $row['usuario_id'] . '",';
			$json .= '"nome":"' . $row['nome'] . '",';
			$json .= '"dia":"' . $row['dia'] . '",';
      $json .= '"descricao":"' . $row['descricao'] . '",';
      $json .= '"prioridade":"' . $row['prioridade'] . '",';
			$json .= '"hora":"' . $row['hora'] . '"},';
		}

		echo '[' . utf8_encode(substr($json, 0, (strlen($json) - 1))) . ']';

	}
	catch(PDOException $e)
	{
		echo 'Erro: ' . $e->getMessage();
		header('Location: ../../../teacher.html#/agenda');
	}

?>
