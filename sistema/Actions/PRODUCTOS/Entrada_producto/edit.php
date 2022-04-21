<?php

    include("db.php");
   
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM productos WHERE id=$id";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $nombre = $row['nombre'];
            $existencia_unitaria = $row['existencia_unitaria'];
        }
    }

        $sum_n = "";
        $res = 0;
     
    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        $existencia_unitaria = (int)$_POST["existencia_unitaria"]; 
        $sum_n = (int)$_POST["sum_n"];

        $res = $existencia_unitaria + $sum_n;


        $query = "UPDATE productos SET nombre = '$nombre', existencia_unitaria = '$res' WHERE id = $id";
        mysqli_query($conn,$query);
        $_SESSION['message'] = 'Entrada de producto echa!';
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
                            <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $nombre;?>" readonly>
                        </div>

                        <div class="form-group">
                            <input type="text" name="existencia_unitaria" id="existencia_unitaria" class="form-control" value="<?php echo $existencia_unitaria;?>" readonly>
                        </div> 

                        <div class="form-group">
                            <input type="text" name="sum_n" id="sum_n" class="form-control">
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