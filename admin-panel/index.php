<?php require "../config/config.php"; ?>
<?php require "../libs/App.php"; ?>
<?php require "layouts/header.php"; ?>
<?php

  $app = new App;
  $app->validateLoginAdmin();

  $query = "SELECT COUNT(*) AS foods_count FROM foods";
  $foods = $app->selectOne($query);

  $query = "SELECT COUNT(*) AS orders_count FROM orders";
  $orders = $app->selectOne($query);

  $query = "SELECT COUNT(*) AS bookings_count FROM bookings";
  $bookings = $app->selectOne($query);

  $query = "SELECT COUNT(*) AS admins_count FROM admins";
  $admins = $app->selectOne($query);

?>
            
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Foods</h5>
              <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
              <p class="card-text">number of foods: <?php echo $foods->foods_count; ?></p>
             
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Orders</h5>
              
              <p class="card-text">number of orders: <?php echo $orders->orders_count; ?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Bookings</h5>
              
              <p class="card-text">number of bookings: <?php echo $bookings->bookings_count; ?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admins</h5>
              
              <p class="card-text">number of admins: <?php echo $admins->admins_count; ?></p>
              
            </div>
          </div>
        </div>
      </div>

<?php require "layouts/footer.php"; ?>