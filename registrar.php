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
<link rel="stylesheet" type="text/css" href="style2.css">
<body >

    <div class="wrapper">
    <form class="form-signin" method="post">       
      <h2 class="form-signin-heading">Please login</h2>
      <input type="text" class="form-control" name="usuario" placeholder="Usuario" required="" autofocus="" />
      <input type="password" class="form-control" name="senha" placeholder="Password" required=""/>      
      
      <button class="btn btn-lg btn-primary btn-block" type="submit">Registrar</button>   
    </form>
  </div>

</body>
</html>