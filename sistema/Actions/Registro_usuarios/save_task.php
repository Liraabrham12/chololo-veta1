<?php

  include('db.php');

  if (!empty($_POST)){
        $alert='';
        if(empty($_POST['nombre']) || empty($_POST['correo']) || empty($_POST['usuario']) || empty($_POST['clave']) || empty($_POST['rol'])){
      
          $_SESSION['message'] = 'Todos los campos son obligatorios';
          $_SESSION['message_type'] = 'warning';
          header('Location: index.php');
  }else{
        if (isset($_POST['save_task'])) {
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $usuario = $_POST['usuario'];
            $clave = $_POST['clave'];
            $rol = $_POST['rol'];

            $query = "INSERT INTO usuario(nombre,correo,usuario,clave,rol) VALUES ('$nombre', '$correo', '$usuario', '$clave','$rol')";
            $result = mysqli_query($conn, $query);
    
              if(!$result) {
                die("Query Failed.");
              }

                  $_SESSION['message'] = 'Task Saved Successfully';
                  $_SESSION['message_type'] = 'success';
                  header('Location: index.php');
        } 
      }
    }  
?>