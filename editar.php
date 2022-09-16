<?php 

function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
include('protect.php');
include('conexao.php');


if(isset($_POST['pd_codigo_e']) ){
	$codigoe = $mysqli->real_escape_string($_POST['pd_codigo_e']);
	$sql_codee = "SELECT * FROM produtos WHERE pd_codigo= '$codigoe' ";
    $sql_queryy = $mysqli->query($sql_codee) or die("Deu pau no banco: ". $mysqli->error); 
    $quantidade = $sql_queryy->num_rows;

    if ($quantidade==1) {
    	 if (strlen($_POST['produto_nome_e'])!=0) {
    	 	 $produtoe = $mysqli->real_escape_string($_POST['produto_nome_e']);
    	 	 $sql_code_nome = "UPDATE produtos SET pd_nome='$produtoe' WHERE pd_codigo='$codigoe' ";
    	 	 $sql_query_nome = $mysqli->query($sql_code_nome) or die("Deu pau no banco: ". $mysqli->error);

             }

            
               
                
                phpAlert("Alterações feitas com sucesso!!");

                                              
                }

                 else{

            phpAlert("Nao foram encontrado produtos com este codigo!");
        }
 		   
              
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Editar</title>
</head>
<body>

	<center>
	<form method="POST" >
		<p>Digite o codigo do produto que deseja alterar</p>
		 <p><input type="text" name="pd_codigo_e"placeholder="Codigo do produto"></p>
	
		<legend>Editar Produto</legend>
			<fieldset>
				
				<label>
					Nome do Produto:
					<input type="text" name="produto_nome_e"/><br/>
				</label>
				<label>
					Quantidade:
					<input type="number" name="quantidade_e"/><br/> 
				</label>

					<label>
					Preço:
					<input type="double" name="preco_e"/><br/>
				</label>
						
				<input type="submit" value="Salvar edições"/><br/>
			
	</fieldset>
	
	</form>
	 <p>  
<a href="verprodutos.php">Voltar</a>
</p>
  </center>

</body>
</html>