<?php 

	require './conexao.php'; 
    require './peca.php';
    require './peca_service.php';


    session_start();

	if ($_SESSION['auth'] != true) {
		header('Location: index.php?auth=erro');
	}

    $peca = new Peca();
    $conexao = new conexao();

    $peca_consulta = new PecaService($conexao, $peca);

    $peca_retorno = [];

    if ($_POST !=  null) {
    	
    $peca_retorno = $peca_consulta->recuperar($_POST['nome'], $_POST['marca'], $_POST['modelo'], $_POST['tipo'], $_POST['ano1'], $_POST['ano2']);
}

?>
<html>
	<head>
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
		<link rel="icon" href="img/favicon.ico" type="image/x-icon">
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Auto Mecânica Indio</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo-indio.png" width="70" height="40" class="d-inline-block align-top" alt="">
					<h3 style="display: inline">Auto Mecânica Indio</h3>
				</a>
				<a href="deslogar.php" class="btn btn-secondary"> Sair </a>
			</div>
		</nav>

		<div class="container app">
			<div class="row">
				<div class="col-sm-3 menu">
					<ul class="list-group">
					   <li class="list-group-item"><a href="nova_peca.php">Nova Peça</a></li>
					   <li class="list-group-item"><a href="consulta_peca.php">Consulta Peça</a></li>
					   <li class="list-group-item active"><a href="#">Descrição</a></li>
					</ul>
				</div>

				<div class="col-sm-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Resultados da Busca</h4>
								<hr/>

								<div class="row mb-3 d-flex align-items-center tarefa">
									<div class="col-sm-9">		
										
										<?php

										if ($peca_retorno == null) {
										     	echo 'Desculpe, não temos a peça solicitada.';
										     } else { 

												echo '<table class="table">
														<thead>
														<tr>	
													    <th scope="col">Marca</th>
													    <th scope="col">Modelo</th>
													    <th scope="col">Nome</th>
													    <th scope="col">Ano</th>
													    <th scope="col">Preço</th>
													    </tr>
													    </thead> '; } ?>

									<?php foreach ($peca_retorno as $key) { 

										echo '

										<tr>
									      <td>'. $key['marca'] .'</td>
									      <td>'. $key['modelo'] .'</td>
									      <td>'. $key['nome'] .'</td>
									      <td>'. $key['ano'] .'</td>
									      <td>'. $key['preco'] .'</td> 
									      <td>

									      <a 

									      onclick="return confirm(' ."'Deseja Realmente Excluir? '". ')"

									       href="controllers/cadastra_controller.php?id='. $key['id_produto'] .'&acao=deletar"><i class="fas fa-trash-alt fa-lg text-danger"></i>
									      </a>

									      </td>
									      <td><a href="#"><i class="fas fa-edit fa-lg text-info"></i>
									      </a>
									      </td>
									      <td><a href="#">
									      <i class="fas fa-check-square fa-lg text-success"></i></a> 
									      </td>

									    </tr> '; }  ?>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>