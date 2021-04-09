<?php 


    require './conexao.php'; 
    require './peca.php';
    require './peca_service.php';

    /*echo '<pre>';
    print_r($_POST);
    echo "</pre>";
    */
    $acao = $_GET['acao'];

    // LOGICA PARA CADASTRO DE PEÇAS NO BANCO DE DADOS
 


    if ($acao == 'inserir') {

    if ($_POST['nome'] == '' || $_POST['marca'] == '' || $_POST['modelo'] == '' || $_POST['tipo'] == '' || $_POST['preco'] == '' || $_POST['ano'] == '' ) {

            header('location: ./index.php?cadastro=error');}

        $peca = new Peca();

        $peca->__set('nome', $_POST['nome']);
        $peca->__set('marca', $_POST['marca']);
        $peca->__set('modelo', $_POST['modelo']);
        $peca->__set('tipo', $_POST['tipo']);
        $peca->__set('preco', $_POST['preco']);
        $peca->__set('ano', $_POST['ano']);

        //print_r($peca);

        $conexao = new Conexao();

        $peca_service = new PecaService($conexao, $peca);
        echo '<pre>';
        print_r($peca_service);
        echo '</pre>';  
        $peca_service->inserir();

        header('location: ./nova_peca.php?cadastro=true');

    } else if ($acao == 'deletar') {
        $peca = new Peca();

        $peca->__set('id', $_GET['id']);

        $conexao = new Conexao();

        $peca_service = new PecaService($conexao, $peca);

        $status = $peca_service->deletar();

        if ($status == 0) {

            header('Location: ./consulta_peca.php?delete=false');

        } else{

        header('Location: ./consulta_peca.php?delete=true');
    }
}

?>

