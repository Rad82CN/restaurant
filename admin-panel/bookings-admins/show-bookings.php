<?php require "../../config/config.php"; ?>
<?php require "../../libs/App.php"; ?>
<?php require "../layouts/header.php"; ?>
<?php

  $app = new App;
  $app->validateLoginAdmin();
  
  $query = "SELECT * FROM bookings";
  $bookings = $app->selectAll($query);

?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Bookings</h5>
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Booking Date</th>
                    <th scope="col">No of People</th>
                    <th scope="col">Special Request</th>
                    <th scope="col">Created_at</th>
                    <th scope="col">Status</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($bookings as $booking) : ?>
                    <tr>
                      <th scope="row"><?php echo $booking->id; ?></th>
                      <td><?php echo $booking->name; ?></td>
                      <td><?php echo $booking->email; ?></td>
                      <td><?php echo $booking->date_time; ?></td>
                      <td><?php echo $booking->people; ?></td>
                      <td><?php echo $booking->special_request; ?></td>
                      <td><?php echo $booking->created_at; ?></td>
                      <td><a href="status.php?id=<?php echo $booking->id; ?>" class="btn btn-primary  text-center "><?php echo $booking->status; ?></a></td>
                      <td><a href="delete-bookings.php?id=<?php echo $booking->id; ?>" class="btn btn-danger  text-center ">Delete</a></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>

<?php require "../layouts/footer.php"; ?>