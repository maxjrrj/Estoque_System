<?php 

	class PecaService {

		public $conexao;
		public $peca;

		public function __construct(Conexao $conexao, Peca $peca){
			$this->conexao = $conexao->conectar();
			$this->peca = $peca;

		}

		public function inserir(){
			$query = 'insert into pecas (nome, marca, modelo, ano, tipo, preco ) value (:nome, :marca, :modelo, :ano, :tipo, :preco)';

			$stmt = $this->conexao->prepare($query);

			$stmt->bindValue(':nome', $this->peca->__get('nome'));
			$stmt->bindValue(':marca', $this->peca->__get('marca'));
			$stmt->bindValue(':modelo', $this->peca->__get('modelo'));
			$stmt->bindValue(':tipo', $this->peca->__get('tipo'));
			$stmt->bindValue(':preco', $this->peca->__get('preco'));
			$stmt->bindValue(':ano', $this->peca->__get('ano'));


			$stmt->execute();

			
		}

		public function recuperar($nome, $marca, $modelo, $tipo, $ano1, $ano2){

			if ($nome == '') {$query_nome = '';} else { $query_nome = '  nome = :nome and';}
			
			$query = 'select * from pecas where 
			marca = :marca and 
			modelo = :modelo and 
			tipo = :tipo and '. $query_nome .
			' ano between :ano1 and :ano2';

			$stmt = $this->conexao->prepare($query);

			if (!($query_nome == '')){$stmt->bindValue(':nome', $nome);}
			$stmt->bindValue(':ano1', $ano1);
			$stmt->bindValue(':ano2', $ano2);
			$stmt->bindValue(':marca', $marca);
			$stmt->bindValue(':modelo', $modelo);
			$stmt->bindValue(':tipo', $tipo);

			$stmt->execute();

			return $stmt->fetchAll();
			
		}

		public function atualizar(){
			//UPDATE
		}

		public function deletar(){

			$query = 'delete from pecas where id_produto = :id';

			$stmt = $this->conexao->prepare($query);

			$stmt->bindValue(':id', $this->peca->id);

			return $stmt->execute();


			
		}


	}
	


?>