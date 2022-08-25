<?php 

function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
include('protect.php');
include('conexao.php');




if(isset($_POST['produto_nome']) || isset($_POST['quantidade'])   ){

	if (strlen($_POST['produto_nome'])==0) {
             echo "Preencha o campo produto";

 }elseif(strlen($_POST['quantidade'])==0){
 							echo "Preencha o campo quantidade";

 }elseif(strlen($_POST['peso'])==0){
 							echo "Preencha o campo peso";

 }elseif(strlen($_POST['pd_codigo'])==0){
 							echo "Preencha o campo codigo";
 }

 else{

 		     		$produto = $mysqli->real_escape_string($_POST['produto_nome']);
            $quantidadepd = $mysqli->real_escape_string($_POST['quantidade']);
            $peso = $mysqli->real_escape_string($_POST['peso']);
            $codigo = $mysqli->real_escape_string($_POST['pd_codigo']); 
            

            $sql_code = "SELECT * FROM produtos WHERE pd_nome= '$produto' ";
            $sql_query = $mysqli->query($sql_code) or die("Deu pau no banco: ". $mysqli->error);

            $quantidade = $sql_query->num_rows;


            if ($quantidade==0) {

            
                $sql_code2 =" INSERT  INTO produtos (pd_nome, pd_quantidade, pd_peso, pd_codigo)
                VALUES ('$produto','$quantidadepd','$peso','$codigo')";
                $sql_query2 = $mysqli->query($sql_code2) or die("Deu pau no banco: ". $mysqli->error);

               
              	phpAlert(   "Produto cadastrado com sucesso"   );
                

               

                }

                 else{

            phpAlert ("Já existe um produto cadastrado com este nome, por favor tente outro!");
        }

 }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro de Produtos</title>
</head>
<link rel="stylesheet" type="text/css" href="style2.css">
<body>

 <center>
	<form method="POST" >
	
		<legend>Cadastro de Produtos</legend>
			<fieldset>
				<legend>Incluir  um novo produto</legend>
				<label>
					Nome do Produto:
					<input type="text" name="produto_nome"/><br/>
				</label>
				<label>
					Quantidade:
					<input type="number" name="quantidade"/><br/>
				</label>

					<label>
					Peso unitario:
					<input type="float" name="peso"/><br/>
				</label>
						<label>
				codigo do produto:
					<input type="number" name="pd_codigo"/><br/>
				</label>
				<input type="submit" value="Salvar produto"/><br/>
			
	</fieldset>
	
	</form>
  </center>

<p>
	<a href="logout.php">Sair</a>

</p>
<p>
<a href="index.php">Ver produtos</a>
</p>
</body>

</html>