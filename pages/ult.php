<?php 
    session_start();
    require 'database.php';
    

    if(isset($_SESSION['user_id'])){
        $records = $conn->prepare('SELECT id,email,passwor FROM users WHERE id = :id');
        $records->bindParam(':id', $_SESSION['user_id']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);
        
        $user = null;
        if(count($results) > 0){
            $user = $results;
        }
    }

  
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="icon" type="image/png" href="../img/icono.png"/>
    <?php require '../CSS/boostrap.php' ?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/stylef.css">
    <script src="ver.js"></script>
    <title>BIENVENIDO</title>
</head>
<body>

<?php if(!empty($user)): ?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="../HOME.php">BRAVE</a>

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">Contactos</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Ofertas</a>
    </li>

    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Videos de la comunidad
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Comedia</a>
        <a class="dropdown-item" href="#">Miedo</a>
        <a class="dropdown-item" href="#">Suspenso</a>
        </div>
    </li>
    <a href=" logout.php"><button type="button" class="btn btn-outline-danger"style="margin-left:830px" >Cerrar Sesion</button></a>
  </ul>
</nav>
  
<header><br><br><br><br><br><br>
        <section class="textos-header">
          <h1>HOLA Y BIENVENIDO</h1>
<!--Inicio de Sentencia :O -->
          <h3><?= $user['email'] ?></h3>
          <br><h2>Ha iniciado sesion correctamente</h2>
<!--Fin de sentendia -->

        </section>
        <div class="wave" style="height: 300px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.98 C165.06,112.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" 
            style="stroke: none; fill: white;"></path></svg></div>
    </header>
    <br><br>
    <div class="container">
      <center>
  <h2>Chatea y Convive con tus seres queridos</h2></center>
  </center>
  <br>
 <!-----------------------------------------------------------NAV TABS ------------------------------->
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">PRINCIPAL</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1">CHAT</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu2">PERFIL</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
 <!-----------------------------------------------------------CONTENEDOR 1------------------------------->
     



      <div class="formulario" style="margin-left:-50px;">
      <div class="con"><span class="material-icons" style="margin-left:170px;">all_inbox</span><h2>Post</h2>     
</div>

<section class="messa">
    
<div class="pre">

<?php foreach ($read as $datos): ?>
<div class="item">

<div>

<?php
    $readInformacion->execute(array('id' => $_SESSION['user_id']));
    foreach ($readInformacion as $nombre):
    
    ?>
  <form method="POST" action="../APP/delete.php">
    <button class="borrar"><span class="material-icons">delete</span></button>
     <input type="hidden" value="<?php echo $datos["codigo"]; ?>" name="codigo">
    </form>
    <input style="font-size:15px; display:flex; margin-left:0 px;" type="text" name="nombre"  value="<?php echo $nombre['name'];?>:" >
    <?php endforeach; ?>
    <p style="margin-left:-75px; margin-top:15px;"><?php echo $datos["Nombre"]; ?></p>

</div>
<p class="fecha"><?php echo $datos["Fecha"]; ?></p>

</div>

    <?php endforeach; ?>
</div>



</div>






    </div>
    
    </section>


    
<!-----------------------------------------------------------CONTENEDOR 2 ------------------------------->  
    <div id="menu1" class="container tab-pane fade"><br>
      <h1>CHAT</h1>
      
      <section class="message">
    <?php foreach($readMensaje as $mensaje): ?>
      <form method="POST" action="../APP/deleteM.php">
    <button class="borrar"><span class="material-icons">delete</span></button>
    <div class="container" style="margin-top:-50px; width:50%;">
			<p><?php echo $mensaje['Nombre']; ?>: <span><?php echo $mensaje['Mensaje']; ?></span></p>
      <p style="margin-top:-25px; font-size:13px;"><?php echo $mensaje['Fecha']; ?></p>
    </div>
     <input type="hidden" value="<?php echo $mensaje["Mensaje"]; ?>" name="men">
    </form>
		<?php endforeach; ?>
	</section>



  <?php
    $readInformacion->execute(array('id' => $_SESSION['user_id']));
    foreach ($readInformacion as $nombre):
    
    ?>
    <center>
  
         <form class="formu" action="../APP/addMsj.php" method="POST"> 
         <input type="text" name="nombre"  value="<?php echo $nombre['name'];?>" >      
         <input type="text" REQUIRED name="mensaje" placeholder="Escribe algo..."> 
         <button class="bu2"><span class="material-icons">queue</span>ENVIAR</button>
        </form> 
    
        <?php endforeach; ?>

    </center>
    </div>

<!-----------------------------------------------------------CONTENEDOR 3 ------------------------------->                               
    <div id="menu2" class="container tab-pane fade"><br>
      <h1>INFORMACIÓN PERSONAL</h1>
      <section class="on">
<table class="tablita">

		<thead>
  
    <?php
    $readInformacion->execute(array('id' => $_SESSION['user_id']));
    foreach ($readInformacion as $row):
    
    ?>

			<tr>
				<th>Nombre:</th>
				<th><?php echo $row['name'];?></th>
       </tr>
       <tr>
				<th>Apellido:</th>
				<th><?php echo $row['lastname'];?></th>
       </tr>
       <tr>
				<th>Edad:</th>
				<th><?php echo $row['age'];?></th>
       </tr>
       <tr>
				<th>Correo :</th>
				<th><?php echo $row['email'];?></th>
       </tr>
       <tr>
				<th>Telefono:</th>
				<th><?php echo $row['pnumber'];?></th>
       </tr>
       <tr>
				<th>Contraseña:</th>
				<th><?php echo $row['passwor'];?></th>
       </tr>
       <tr>
				<th>Usuario:</th>
				<th><?php echo $row['codi'];?></th>
       </tr>

      <?php endforeach; ?>
		</thead>


	</table>
<br><br>

</section>

<h1 class="titu">Editar datos</h1>

<form method="POST" action="../APP/datos.php">
      <div class="dato">     
        <h4><span>Nombre:</span><?php echo $row['name'];?></h4>
        <input type="radio" name="modificar"  value="name" cheked>
      </div>
      
      <div class="dato">     
        <h4><span>Apellido:</span><?php echo $row['lastname'];?></h4>
        <input type="radio" name="modificar"  value="lastname" cheked>
      </div>

      <div class="dato">     
        <h4><span>Edad:</span><?php echo $row['age'];?></h4>
        <input type="radio" name="modificar"  value="age" cheked>
      </div>

      <div class="dato">     
        <h4><span>Correo:</span><?php echo $row['email'];?></h4>
        <input type="radio" name="modificar"  value="email" cheked>
      </div>

      <div class="dato">     
        <h4><span>Telefono:</span><?php echo $row['pnumber'];?></h4>
        <input type="radio" name="modificar" value="pnumber" cheked>
      </div>

      <div class="dato">     
        <h4><span>Contraseña:</span><?php echo $row['passwor'];?></h4>
        <input type="radio" name="modificar"  value="passwor" cheked>
      </div>
      
      <div class="dato">     
        <h4><span>Usuario:</span><?php echo $row['codi'];?></h4>
        <input type="radio" name="modificar"  value="codi" cheked>
      </div>

      <center>
      <div class="dato">     
          <input type="text"  placeholder="Nuevo dato" name="nuevo">
          <button class="bu">Actualizar dato</button></center>
      </div>


      </form>

<div class="formu">
      <div class="con" ><span class="material-icons s" >dynamic_feed</span><h3 class="h3">Agregar contenido a BRAVE "The blog"</h3>     
</div>

   
<center>
         <form class="formu" action="../APP/add.php" method="POST">       
         <input type="text" REQUIRED name="nombre" placeholder="¿Que estas pensando?"> 
         <button class="button"><span class="material-icons">queue</span>Añadir post</button>
        </form> 
    </center>


</div>

  
    </div>

    </div>
      





  </div>
</div>
<br><br>
<br><br>
<br><br>




    <footer>       
        <h2 class="titulo-final">&copy; Daniel Cifuentes | Bryan Tojin</h2>
    </footer>

    
<?php else: ?>
  <h1>Please login or SignUp</h1>

<a href="login.php">Login</a>or 
<a href="signup.php">Sign Up</a>
<?php endif; ?>
</body>
</html>