<?php require "../../config/config.php"; ?>
<?php require "../../libs/App.php"; ?>
<?php require "../layouts/header.php"; ?>
<?php

  $app = new App;
  $app->validateLoginAdmin();
  
  $query = "SELECT * FROM foods";
  $foods = $app->selectAll($query);

?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Foods</h5>
              <a  href="create-foods.php" class="btn btn-primary mb-4 text-center float-right">Create Foods</a>

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">image</th>
                    <th scope="col">price</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($foods as $food) : ?>
                    <tr>
                      <th scope="row"><?php echo $food->id; ?></th>
                      <td><?php echo $food->name; ?></td>
                      <td><img style="width: 50px; height: 50px" src="<?php echo APPIMAGES; ?>/<?php echo $food->image; ?>"></td>
                      <td>$<?php echo $food->price; ?></td>
                      <td><a href="delete-foods.php?id=<?php echo $food->id; ?>" class="btn btn-danger  text-center ">Delete</a></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>

<?php require "../layouts/footer.php"; ?>