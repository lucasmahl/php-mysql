<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<script type="text/javascript" charset="utf-8" async defer>
		function voltar(){
			setTimeout("window.location='cadastrando.php'",1000);
		}
	</script>
</head>
<body>
	
</body>
</html>
<?php 
	require_once("dbaccess.php");
	require_once("verifica_login.php");
?>

<?php 

	$nome = $_POST['nome'];
	$idade = $_POST['idade'];
	$FOTO = $_FILES['FOTO'];

		$error = array();

	// Se o usuário clicou no botão cadastrar efetua as ações
	if (isset($_POST['cadastrar'])) {

	

	// Se a FOTO estiver sido selecionada
	if (!empty($FOTO["name"])) {
		
		//funcao para verificar se nome já existe na tabela
		$verifica_nome = "SELECT * FROM conexao.pessoas WHERE NOME = '$nome';";
		
		//fetchAll = Retorna todas as linhas (registros) como um array
		$nome_tabela = mysqli_query($conn, $verifica_nome);
		$row = $nome_tabela->fetch_assoc(); 
		if ($_POST['nome'] == $row["NOME"]) {
			echo "<h1><center>Este nome já foi cadastrado.</center></h1>";
			$error[6] = "Este nome já foi cadastrado.')";
		}

		// Largura máxima em pixels
		$largura = 5000;
		// Altura máxima em pixels
		$altura = 5000;
		// Tamanho máximo do arquivo em bytes
		$tamanho = 2000000;/*200kilobyte*/


    	// Verifica se o arquivo é uma imagem
    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $FOTO["type"])){
     	   $error[1] = "Isso não é uma imagem.";
   	 	}
	
		// Pega as dimensões da imagem
		$dimensoes = getimagesize($FOTO["tmp_name"]);
	
		// Verifica se a largura da imagem é maior que a largura permitida
		if($dimensoes[0] > $largura) {
			$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
		}

		// Verifica se a altura da imagem é maior que a altura permitida
		if($dimensoes[1] > $altura) {
			$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
		}
		
		// Verifica se o tamanho da imagem é maior que o tamanho permitido
		if($FOTO["size"] > $tamanho) {
   		 	$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
		}

		// Se não houver nenhum erro
		if (count($error) == 0) {
		
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $FOTO["name"], $ext);

        	// Gera um nome único para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];

        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "imagens/" . $nome_imagem;

			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($FOTO["tmp_name"], $caminho_imagem);
		
			// Insere os dados no banco
			$sql = mysqli_query($conn,"INSERT INTO `conexao`.`pessoas`(`nome`,`idade`,`FOTO`,`DATA_INSERCAO`)
			VALUES('$nome','$idade','$nome_imagem',now());
			");

/*			$sql = mysql_query($conn,"INSERT INTO pessoas VALUES ('', '".$nome."', '".$email."', '".$nome_imagem."')");
*/	
			// Se os dados forem inseridos com sucesso
			if ($sql){
				echo "Você foi cadastrado com sucesso.";
			}
		}
	
		// Se houver mensagens de erro, exibe-as
		if (count($error) != 0) {
			foreach ($error as $erro) {
				echo $erro . "<br />";
			}
		}
		}elseif (empty($FOTO["name"])) {
			//CAMINHO, CASO NÃO SEJA INSERIDO FOTO NENHUMA
				
			//funcao para verificar se nome já existe na tabela
			$verifica_nome = "SELECT * FROM conexao.pessoas WHERE NOME = '$nome';";
			
			//fetchAll = Retorna todas as linhas (registros) como um array para verificar nome
			$nome_tabela = mysqli_query($conn, $verifica_nome);
			$row = $nome_tabela->fetch_assoc(); 

			if ($_POST['nome'] == $row["NOME"]) {
				echo "<h1><center>Este nome já foi cadastrado.</center></h1>";
				$error[6] = "Este nome já foi cadastrado.')";
			}

			// Se não houver nenhum erro
			if (count($error) == 0) {
			
				// Insere os dados no banco
				$sql = mysqli_query($conn,"INSERT INTO `conexao`.`pessoas`(`nome`,`idade`,`DATA_INSERCAO`)
				VALUES('$nome','$idade',now());
				");

				// Se os dados forem inseridos com sucesso
				if ($sql){
					echo "Cadastramento sem foto efetuado com sucesso!";
				}
			}


			}else{
		   		 	$error[5] = "Algum erro aconteceu, dados não foram cadastrados.";
				}
			}
	




/*
	$sql = mysqli_query($conn,"INSERT INTO `conexao`.`pessoas`(`nome`,`idade`)
		VALUES('$nome','$idade');
	");
	echo "<center><h1>Dados inseridos com sucesso!!!</h1></center>";
	echo "<script>voltar()</script>";*/

?>
