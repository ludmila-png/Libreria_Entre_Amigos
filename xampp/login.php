<?php
session_start();
$msj = "";
if(isset($_SESSION["OK"])){
    if($_SESSION["OK"]){
        header("location:/index.php");
        exit;
    }
}
if(isset($_POST["EMAIL"]))
{
    $EMAIL = $_POST["EMAIL"];
    $_SESSION["EMAIL"] = $EMAIL;
    $PSW = $_POST["PSW"];
    $_SESSION["PSW"] = $PSW;
    $ref = mysqli_connect("localhost","root","");
    if(!$ref){
        $msj = "Error de conexion";
    }
    else {
        $consulta = "SELECT * FROM lapiz_magico.usuarios WHERE email='$EMAIL' and password='$PSW'";
        $rta=mysqli_query($ref,$consulta);
                if(!$rta)
            $msj="Query error";
        else {
            if(mysqli_num_rows($rta) == 0) {
                $msj = "No se ha encontrado un usuario con ese nombre o contraseña.";
            } else {
                $_SESSION["OK"] = 1;
                header("location:/index.php");
                exit;
        }
    }
}}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Iniciar Sesión - Entre Amigos</title>
  <link rel="stylesheet" href="styles2.css" />
</head>
<body>
  <main class="login-container" role="main" aria-label="Formulario de inicio de sesión">
    <svg class="book-icon" viewBox="0 0 64 64" aria-hidden="true" focusable="false" >
      <path d="M8 8h40a4 4 0 014 4v40a4 4 0 01-4 4H8a4 4 0 01-4-4V12a4 4 0 014-4zm2 6v32h36V14H10zm0 36v4h36v-4H10z"/>
      <path d="M14 18h28v4H14zM14 26h28v4H14zM14 34h28v4H14z"/>
    </svg>
    <h2>Iniciar Sesión</h2>
    <form action="login.php" method="POST" novalidate>
      <label for="email">Correo Electrónico</label>
      <input
        type="email"
        id="email"
        name="EMAIL"
        placeholder="tu@correo.com"
        required
        autocomplete="email"
        aria-required="true"
      />

      <label for="password">Contraseña</label>
      <input
        type="password"
        id="password"
        name="PSW"
        placeholder="********"
        required
        autocomplete="current-password"
        aria-required="true"
      />

      <button type="submit" aria-label="Iniciar sesión">Entrar</button>
    </form>
    <a href="./forget.php" class="forgot-password">¿Olvidaste tu contraseña?</a>
    <a href="./register.php" class="forgot-password">Me quiero registrar.</a></p>
        <a href="./index.php" class="forgot-password">Quiero volver.</a></p>
    <p><?php echo $msj?></p>
  </main>
</body>
</html>
<!--
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <link href="assets/bootstrap.min.css" rel="stylesheet">

    <link href="assets/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="POST" action="login.php">
      <img class="mb-4" src="./assets/logo.png" alt="" width="200" height="200"> !!!|
      <h1 class="h3 mb-3 font-weight-normal">Inicia sesión</h1>
      <label for="inputEmail" class="sr-only">Email address</label> !!!
      <input name="EMAIL" type="email" id="inputEmail" class="form-control" placeholder="Ingresa tu email." required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>   !!!
      <input name="PSW" type="password" id="inputPassword" class="form-control" placeholder="Ingresa tu contraseña." required>
      <div class="checkbox mb-3">
        <label>
          <input name="remember"type="checkbox" value="remember-me"> Recuérdame
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted"><a href="./register.php">Me quiero registrar.</a></p> !!!
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
      <p><?php echo $msj?></p>
    </form>
  </body>
</html>
-->