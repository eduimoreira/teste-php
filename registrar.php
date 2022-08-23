 <?php
    include('conexao.php');
    if(isset($_POST['usuario']) || isset($_POST['senha'])   ){



        if (strlen($_POST['usuario'])==0) {
             echo "Preencha a disgrassa do usuario";   
            
        }elseif (strlen($_POST['senha'])==0) {
            echo "Preencha a disgrassa da senha";



            
        }else{

            $usuario = $mysqli->real_escape_string($_POST['usuario']);
            $senha = $mysqli->real_escape_string($_POST['senha']);

            $sql_code = "SELECT * FROM usuarios WHERE user= '$usuario' ";
            $sql_query = $mysqli->query($sql_code) or die("Deu pau no banco: ". $mysqli->error);

            $quantidade = $sql_query->num_rows;


            if ($quantidade==0) {

            
                $sql_code2 =" INSERT  INTO usuarios (user, senha)
                VALUES ('$usuario','$senha')";
                $sql_query2 = $mysqli->query($sql_code2) or die("Deu pau no banco: ". $mysqli->error);

                if(!isset($_SESSION)){
                      session_start();  

                }
                $_SESSION['id']= $usuario['id'];
                $_SESSION['user']= $usuario['usuario'];
                header('Location: painel.php');

                }

                 else{

            echo "Já existe um usuario cadastrado com este nome, por favor tente outro!";
        }

        }
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registrar</title>
</head>
<link rel="stylesheet" href="stylee.css">
<body >

<div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Cadastre-se</h2>

  <form  method= "post"class="login-container" >
    <p><input type="text" name="usuario"placeholder="Usuario"></p>
    <p><input type="password" name="senha" placeholder="Senha"></p>
    <p><input type="submit" value="Cadastrar"></p>
  </form>
</div>


</body>
</html>