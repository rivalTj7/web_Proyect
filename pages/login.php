<?php 
    session_start();

    require 'database.php';

    #comprobamos que los campos antes llenados no esten vacios los del post
    if(!empty($_POST['email']) && !empty($_POST['password'])){
        $records = $conn->prepare('SELECT id,email,passwor FROM users WHERE email=:email');
        $records->bindParam(':email', $_POST['email']);
        $records->execute();
        #una vez ejecutada la consulta llamada records obtendremos los datos del usuario
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $message = '';
        #validamos los resultados si la respuesta es mayor a 0 verificamos las contraseñas
        if(($_POST['password'] === $results['passwor'])){
          $_SESSION['user_id'] = $results['id'];
        header('Location: ult.php');
    }else{
        $message = 'Sorry, those credentials do not match';
    }
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<?php require '../CSS/boostrap.php';?>
<link rel="icon" type="image/png" href="../img/icono.png"/>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../CSS/style2.css">
</head>
<body style=" background: #0F2027;
    background: -webkit-linear-gradient(to right, hsla(198, 39%, 28%, 0.623), hsla(195, 35%, 19%, 0.698), hsla(198, 44%, 11%, 0.657)),url(../img/ilu2.jpeg);
    background: linear-gradient(to right, hsla(198, 39%, 28%, 0.623), hsla(195, 35%, 19%, 0.698), hsla(198, 44%, 11%, 0.657)),url(../img/ilu2.jpeg);background-size: cover;
    background-attachment: fixed;position: relative;">
    

<!-----------------------------------------------------------PRIMERA CARTA :/ ------------------------------->

<div class="container">
   <br><br><br><br>
    <div class="card-group">
    <div class="card ">
    <div class="card-body text-center">
    <img src="https://image.freepik.com/vector-gratis/programador-ordenador_23-2147505689.jpg">
     </div>
     </div>
<!-----------------------------------------------------------SEGUNDA CARTA :( ------------------------------->
       <div class="card ">
       <div class="card-body text-center">
         <a href="home.php"><a href="../home.php"><button type="button" class="btn btn-outline-danger"style="margin-left:80% " >EXIT</button></a>
       <p class="card-text" style="font-family: 'Roboto', cursive;font-size: 70px;color:black;">Inicia Sesion</p>
  
<!-----------------------------------------------------------PRIMER FORMULARIO ------------------------------->

       <span>or <a href="signup.php">Singn Up</a></span>

       
       <?php if(!empty($message)): ?>
       <p><?= $message ?></p>
       <?php endif; ?>
       <br><br><br>
        <form action="login.php" method="post">
        <input type="text" name="email" placeholder="Enter your mail">
        <input type="password" name="password" placeholder="Enter your password"><!-- submit PARA INICIAR-->
        <input type="submit" value="Send">
                                                              

       </form>
       <center><br>
       <a href="https://accounts.google.com/ServiceLogin/signinchooser?hl=es&passive=true&continue=http%3A%2F%2Fsupport.google.com%2Fmail%2Fanswer%2F8494%3Fco%3DGENIE.Platform%253DDesktop%26hl%3Des&flowName=GlifWebSignIn&flowEntry=ServiceLogin">
    <img src="https://media.giphy.com/media/Ch8s41v0kVL2g/giphy.gif" style="width: 80px;"></a>
    </center>
     </div>
    </div>
  </div>
 </div>
<BR> 

<!--------------------------------------FIN DE PRIMER FORMULARIO ----------------------------------------------------->

</body>
</html>