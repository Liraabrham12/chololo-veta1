<!-- Abraham lira--><!--INDEX CRUD-->
<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_task.php" method="POST">

        <div class="form-group"> 

            <label for="rol_animal">Tipo Animal</label>
                <select name="rol_animal" id="rol_animal" class="form-control" autofocus>
                    <option value="chalecos">Chalecos</option>
                    <option value="res">Res</option>
                    <option value="chivo">Chivo</option>
                    <option value="borrego">Borrego</option>
                </select>
          </div>

          <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="text" name="cantidad" id="cantidad" class="form-control" placeholder="Cantidad" autofocus>
          </div>

          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Save Task">

        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Tipo animal</th> 
            <th>cantidad</th>
            
            <th>Action</th>
          </tr>
        </thead>
        <br>
        <tbody>
          <?php
          $query = "SELECT * FROM animal";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['tipo_animal']; ?></td>
            <td><?php echo $row['cantidad']; ?></td>
            
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
              <a href="update_minus.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-minus-circle"></i>
              </a>
              <a href="update_plus.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
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