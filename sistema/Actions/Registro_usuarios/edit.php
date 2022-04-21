<?php
    include("db.php");

    if (!empty($_POST)){
        $alert='';
        if(empty($_POST['nombre']) || empty($_POST['correo']) || empty($_POST['usuario']) || empty($_POST['clave']) || empty($_POST['rol'])){
      
          $_SESSION['message'] = 'Todos los campos son obligatorios';
          $_SESSION['message_type'] = 'warning';
          header('Location: index.php');
  }else{
        
        if (isset($_GET['id'])){
            $id = $_GET['id'];
            $query = "SELECT * FROM usuario WHERE id=$id";
            $result = mysqli_query($conn, $query);
        
                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_array($result);
                    $nombre = $row['nombre'];
                    $correo = $row['correo'];
                    $usuario = $row['usuario'];
                    $clave = $row['clave'];
                }
        }

            if(isset($_POST['update'])){
                $id = $_GET['id'];
                $nombre = $_POST['nombre'];
                $correo = $_POST['correo'];
                $usuario = $_POST['usuario'];
                $clave = $_POST['clave'];

                $query = "UPDATE usuario SET nombre = '$nombre', correo = '$correo', usuario = '$usuario', clave = '$clave' WHERE id = $id";
                mysqli_query($conn,$query);
                $_SESSION['message'] = 'Task Updated Successfully';
                $_SESSION['message_type'] = 'warning';
                header('Location: index.php');
            }
        }
    }   
?>

<?php include('includes/header.php'); ?>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">

                        <div class="form-group">
                            <input type="text" name="nombre" values="<?php echo $nombre; ?>" class="form-control" placeholder="Update Nombre">
                        </div>

                        <div class="form-group">
                            <input type="text" name="correo" values="<?php echo $correo; ?>" class="form-control" cols="30" rows="10" placeholder="Update correo">
                        </div>

                        <div class="form-group">
                            <input type="text" name="usuario" values="<?php echo $usuario; ?>" class="form-control" placeholder="Update usuario">
                        </div>

                        <div class="form-group">
                            <input type="password" name="clave" values="<?php echo $clave; ?>" class="form-control" placeholder="Update password">
                        </div>

                        <button class="btn-success" name="update">
                            update
                        </button>
                    </form>
                </div>        
            </div>
        </div>
    </div>
<?php include("includes/footer.php") ?>















?>