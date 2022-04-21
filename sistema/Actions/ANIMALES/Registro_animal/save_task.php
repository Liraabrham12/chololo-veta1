<?php

  include('db.php');

  if (!empty($_POST)){
        $alert='';
        if(empty($_POST['rol_animal']) || empty($_POST['cantidad'])){
      
          $_SESSION['message'] = 'Todos los campos son obligatorios';
          $_SESSION['message_type'] = 'warning';
          header('Location: index.php');
  }else{
        if (isset($_POST['save_task'])) {
            $rol_animal = $_POST['rol_animal'];
            $cantidad = $_POST['cantidad'];

            $query = "INSERT INTO animal(tipo_animal,cantidad) VALUES ('$rol_animal', '$cantidad')";
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