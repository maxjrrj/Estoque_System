<?php 

	class Conexao {	


		public function conectar () {

			try {

				$conexao = new PDO (
					"mysql:host=localhost;dbname=db_pecas",
					"root",
					""
				);

				return $conexao;


			} catch (PDOException $e) {
				echo '<p>'.$e->getMessage().'</p>';
			}
		}
	}


?>
