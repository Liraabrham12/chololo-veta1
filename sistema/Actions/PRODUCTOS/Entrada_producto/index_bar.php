<!-- Abraham lira--><!--INDEX CRUD-->
<?php include("db.php"); ?>

<?php include('includes/header_bar.php'); ?>

<main class="container p-4">
 
    <div class="col-md-8">

    <div class="card card-body">
      <form action="index.php" method="POST">
        <div class="form-group">
            <center><input type="text" name="buscar"></center>
            <br>
            <center><input type="submit" value="Buscar"></center>       
        </div>
      </form>
    </div>
    <br>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Existencia unitaria</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php include 'read.php';
      
          $query = "SELECT * FROM bar";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['existencia_unitaria']; ?></td>
            <td>
              <a href="edit_bar.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-plus-circle"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?> 