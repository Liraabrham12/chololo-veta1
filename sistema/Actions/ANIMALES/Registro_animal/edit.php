<?php

    include("db.php");
   
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM animal WHERE id=$id";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $tipo_animal = $row['tipo_animal'];
            $cantidad = $row['cantidad'];
        }
    }

        $sum_n = "";
        $res = 0;
     
    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $tipo_animal = $_POST['tipo_animal'];
        $cantidad = (int)$_POST['cantidad']; 
        $sum_n = (int)$_POST["sum_n"];

        $res = $cantidad + $sum_n;


        $query = "UPDATE animal SET cantidad = '$res' WHERE id = $id";
        mysqli_query($conn,$query);
        $_SESSION['message'] = 'Cantidad de animal agregada';
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
                            <input type="text" name="tipo_animal" id="tipo_animal" class="form-control" value="<?php echo $tipo_animal;?>" readonly>
                        </div>

                        <div class="form-group">
                            <input type="text" name="cantidad" id="cantidad" class="form-control" value="<?php echo $cantidad;?>">
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