<?php require 'database.php'; 


$message = '';

    #si el campo de texto no estan vacios continuar y agregarlos a la base de datos 
    if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['NAME']) && !empty($_POST['LASTNAME']) && !empty($_POST['CODEB']) && !empty($_POST['AGE']) && !empty($_POST['AGE']) && !empty($_POST['PHONENUM'])){
        $sql = "INSERT INTO users(name,lastname,codi,age,pnumber,email,passwor)VALUES(:NAME,:LASTNAME,:CODEB,:AGE,:PHONENUM,:email,:password)";
        #le pasamos los datos
        $stmt = $conn->prepare($sql);
        #obtenemoos los datos y los vinculamos
        $stmt->bindParam(':NAME',$_POST['NAME']);
        $stmt->bindParam(':LASTNAME',$_POST['LASTNAME']);
        $stmt->bindParam(':CODEB',$_POST['CODEB']);
        $stmt->bindParam(':AGE',$_POST['AGE']);
        $stmt->bindParam(':PHONENUM',$_POST['PHONENUM']);
        $stmt->bindParam(':email',$_POST['email']);   
        $password = ($_POST['password']);
        $stmt->bindParam(':password',$password);
    
    
    #si todo funciona bien se crea un nuevo usuario de lo contrario no :c
        if($stmt->execute()){
            $message = 'Successfully created new  user';
        }else{
            $message = 'hello please fill in your details';
        }
    }
    

?>


<!-- en las condiciones de arriba hacemos que el programa mande los datos a la base de datos-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../img/icono.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <?php require '../CSS/boostrap.php' ?>
    <link rel="stylesheet" href="../CSS/style3.css">
</head>
<body>
<!-----------------------------------------------------------PRIMERA CARTA :/ ------------------------------->
    <div class="container"><br><br>
  <br><br><br><br>
  	     <div class="card-group">
   	     <div class="card ">
     <div class="card-body text-center"><br><br><br>
   <img src="https://image.freepik.com/vector-gratis/relaciones-romanticas-linea-mensajes-texto-ninas-ninos_82574-9700.jpg" style="margin-left:-20px;"><br><br> </div>
</div>
<!----------------------------------------------------------- SEGUNDA CARTA ------------------------------->
<div class="card x">
  <div class="card-body text-center">
    <a href="home.php"><a href="../home.php"><button type="button" class="btn btn-outline-danger"style="margin-left:80% " >EXIT</button></a> 
    <p class="card-text" style="font-family: 'Roboto', cursive;font-size: 70px;color:black;">Registrate</p>


<!-----------------------------------------------------------PRIMERA FORMULARIO ------------------------------->
                                                           
<!-- si no esta vacio el mensaje es por que ha occurido algo-->


<?php if(!empty($message)): ?>
    <p><?= $message ?></p>
    <?php endif; ?>
    
    <span>or <a href="login.php">Login</a></span>

        <form action="signup.php" method="post">
        <br>
       	<section class="inputBx">
       	<input type="text" name="NAME" placeholder="name" >
       	<input type="text" name="LASTNAME" placeholder="Last Name">
       	<br></section>
       	
       	<section class="inputBx">
       	<input type="text" name="CODEB" placeholder="Code Brave">
       	<input type="number" name="AGE"	placeholder="Age">
       	<br></section>

       	<section class="inputBx">
       	<input type="number" name="PHONENUM" placeholder="phone number">
           <input type="text" name="email" placeholder="Enter your mail">
       	<br></section>

       	<section class="inputBx">
       	<input type="password" name="password" placeholder="Enter your password">
       	<input type="password" name="confirm_password" placeholder="Confirm your password">
       	<br></section>

       	<br>
           <input type="submit" value="Send" style="width: 280px">
           </form>
<!-----------------------------------------------------------FIN FORMULARIO ------------------------------->
    </center>

      </div>
    </div>
  </div>
</div>



</body>
</html>