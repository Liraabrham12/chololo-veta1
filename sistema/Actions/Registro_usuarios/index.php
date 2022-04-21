<!-- Abraham lira--><!--INDEX CRUD-->
<?php include("db.php"); ?>

<?php include('includes/header1.php'); ?>

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
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre Completo" autofocus>
          </div>

          <div class="form-group">
            <label for="correo">Correo electronico</label>
            <input type="email" name="correo" id="correo" rows="2" class="form-control" placeholder="Correo electronico" autofocus>
          </div>
          
          <div class="form-group">
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Nombre Usuario" autofocus>
          </div>

          <div class="form-group">
          <label for="clave">Clave</label>
          <input type="password" name="clave" id="clave" class="form-control" placeholder="Clave de acceso" autofocus>
          </div>

          <div class="form-group"> 
            <label for="rol">Tipo Usuario</label>
                <select name="rol" id="rol" class="form-control" autofocus>
                    <option value="1">administrador</option>
                    <option value="2">Spervisor</option>
                </select>
          </div>

          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Save Task">
        </form>
      </div>
    </div>


    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>nombre</th>
            <th>correo</th>
            <th>usuario</th>
            <th>rol</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM usuario";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['correo']; ?></td>
            <td><?php echo $row['usuario']; ?></td>    
            <td><?php echo $row['rol']; ?></td>
            <td>
            <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
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