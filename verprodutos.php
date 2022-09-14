<?php
include('protect.php');
include('conexao.php');

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Listagem de Produtos</title>
</head>
<body>
	<h1>TESTE</h1>
	<?php
	   $query_prods = "SELECT * FROM produtos";
	   $result_prods =  $mysqli->query( $query_prods);
	 
	   while ($row_prod = mysqli_fetch_assoc($result_prods)){

	   	 echo "Produto: ".$row_prod ['pd_nome']."<br>";
	   	 echo "Quantidade: ".$row_prod ['pd_quantidade']."<br>";
	   	 echo "Codigo: ".$row_prod ['pd_codigo']."<br><hr>";

	   }


	?>
	
	 <p>  
<a href="painel.php">Voltar</a>
</p>
</body>
</html>