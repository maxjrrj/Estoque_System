<?php
	
	require './conexao.php';
	session_start();

	function logaUsuario(){	


		$conexao = new Conexao();

		$conexao = $conexao->conectar();

		$query = 'select * from users where email = :login and password = :senha ';

		$stmt = $conexao->prepare($query);

		$stmt->bindValue(':login', $_POST['login']);
		$stmt->bindValue(':senha', $_POST['senha']);

		$stmt->execute();

		$user = $stmt->fetch(); 

		if (!isset($user['email']) || !isset($user['password'])) {
			$_SESSION['auth']= false;
			header('location: index.php?auth=erro1');
			
			} else{

				if ($user['email'] == $_POST['login'] && $user['password'] == $_POST['senha']){
					

					$_SESSION['auth'] = true;

					header('location: nova_peca.php');



					} else if ($user['email'] != $_POST['login'] && $user['password'] != $_POST['senha']) {


					header('location: index.php?auth=erro2');
			}	
				
			
	}
			
}

logaUsuario();

?>
