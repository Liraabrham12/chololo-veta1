<?php   

$alert = '';
session_start();
if(!empty($_SESSION['active'])){
    header('Location: sistema/');

} else{
 
    if(!empty($_POST)){

        if(empty($_POST['usuario']) || empty($_POST['clave'])){

            $alert='Ingrese usuario y contraseña';
        
        }else{

            require_once "conexion.php";

            $user = mysqli_real_escape_string($conection,$_POST['usuario']); 
            $pass = md5(mysqli_real_escape_string($conection,$_POST['clave']));

            $query = mysqli_query($conection,"SELECT * FROM usuario WHERE usuario = '$user' AND clave = '$pass'");
            mysqli_close($conection);
            $result = mysqli_num_rows($query);


            if($result > 0)
            {
                $data = mysqli_fetch_array($query);
                $_SESSION['active'] = true;
                $_SESSION['idUser'] = $data['idusuario'];
                $_SESSION['nombre'] = $data['nombre'];
                $_SESSION['email']  = $data['email'];
                $_SESSION['user']   = $data['usuario'];
                $_SESSION['rol']    = $data['rol'];

                header('Location: sistema/');
            }else{
                $alert='Usuario o Contraseña incorrecto';
               session_destroy();
            }
        } 
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <title>LOGIN</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center pt-5 mt-5 m-1">
            <div class="col-md-6 col-sm-8 col-xl-4 col-lg-5 formulario">
                <form action="" method="POST">
                    <div class="form-group text-center pt-3">
                        <h1 class="text-light">INICIAR SESIÓN</h1>
                    </div>
                    <div class="container text-center">
                        <img src="img/descargas.jfif">
                    </div>
                    
                    <div class="form-group mx-sm-4 pt-3">
                        <input type="text" class="form-control" name="usuario" placeholder="Ingrese su Usuario">
                    </div>
                    <div class="form-group mx-sm-4 pb-3">
                        <input type="password" class="form-control" name="clave" placeholder="Ingrese su Contraseña">
                    </div>
                    
                    <div class="form-group mx-sm-4 pb-2">
                        <input type="submit" class="btn btn-block ingresar" value="INGRESAR">
                    </div>
                    <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

                 </form>
            </div>    
        </div>
    </div>
</body>
</html>