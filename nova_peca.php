<?php
	session_start();

	if ($_SESSION['auth'] != true) {
		header('Location: index.php?auth=erro');
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

		<?php if (isset($_GET['cadastro']) && $_GET['cadastro'] == true)  {
			echo '<div class="col-md-12 font-weight-bold p-2 text-center bg-success"> 
					<h3>Peça cadasatrada com sucesso!</h3>
				  </div>';
		} ?>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item active"><a href="nova_peca.php">Nova Peça</a></li>
						<li class="list-group-item"><a href="consulta_peca.php">Consulta Peça</a></li>
						<li class="list-group-item"><a href="peca_desc.php">Descrição</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Nova Peça</h4>
								<hr/>

								<form class="row g-3" action="./cadastra_controller.php?acao=inserir" method="post">
  									<div class="col-md-6">
    									<label for="" class="form-label">Marca</label>
    									<input type="text" class="form-control" name="marca">
  									</div>
  									<div class="col-md-6">
    									<label for="" class="form-label">Modelo</label>
    									<input type="text" class="form-control" name="modelo">
  									</div>

  									  <div class="col-md-6">
    									<label for="" class="form-label">Nome</label>
    									<input type="text" class="form-control" name="nome">
  									</div>
  									<div class="col-md-6">
    									<label for="" class="form-label">Ano</label>
    									<input type="text" class="form-control" name="ano">
  									</div>

  									<div class="col-md-6">
    									<label for="" class="form-label">Preço</label>
    									<input type="text" class="form-control" name="preco">
  									</div>
  									<div class="mt-2 ml-3">

										<select class="custom-select mt-4 " name="tipo">
										    <option selected>Tipo...</option>
										    <option value="lataria">Lataria</option>
										    <option value="vidros">Vidros</option>
										    <option value="eletrica">Elétrica</option>
										    <option value="acessorios">Acessórios</option>

										 </select>

										 <button class=" enviar btn-secondary btn" id="enviar" onclick="return confirm('Deseja realizar o cadastro da Peça?')" type="submit">Registrar</button>

  									</div>
  								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>