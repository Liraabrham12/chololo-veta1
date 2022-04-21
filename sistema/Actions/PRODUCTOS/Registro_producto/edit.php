<?php

    include("db.php");
   
   
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM productos WHERE id=$id";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $nombre = $row['nombre'];
            $description = $row['description'];
            $precio = $row['precio'];
            $existencia_unitaria = $row['existencia_unitaria'];
            $existencia_gramaje = $row['existencia_gramaje'];
        }
    }

    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        $description = $_POST['description'];
        $precio = $_POST['precio'];
        $existencia_unitaria = $_POST['existencia_unitaria'];
        $existencia_gramaje = $_POST['existencia_gramaje'];

        $query = "UPDATE productos SET nombre = '$nombre', description = '$description', precio = '$precio', existencia_unitaria = '$existencia_unitaria', existencia_gramaje = '$existencia_gramaje'  WHERE id = $id";
        mysqli_query($conn,$query);
        $_SESSION['message'] = 'Task Updated Successfully';
        $_SESSION['message_type'] = 'warning';
        header('Location:index.php');
    }
?>

<?php include('includes/header.php'); ?>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">

                        <div class="form-group">
                            <input type="text" name="nombre" values="<?php echo $nombre;?>" class="form-control" placeholder="Update name">
                        </div>

                        <div class="form-group">
                            <textarea name="description" cols="30" rows="1" value="<?php echo $description;?>" class="form-control"  placeholder="update description"></textarea>
                        </div>

                        <div class="form-group">
                            <input type="text" name="precio" value="<?php echo $precio;?>"class="form-control" placeholder="update price">
                        </div>
                        
                        <div class="form-group">
                            <input type="text" name="existencia_unitaria" value="<?php echo $existencia_unitaria;?>"class="form-control" placeholder="Existencia Unitaria" onlyread>
                        </div>

                        <div class="form-group">
                            <input type="text" name="existencia_gramaje" value="<?php echo $existencia_gramaje;?>"class="form-control" placeholder="Existencia Gramaje" onlyread>
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