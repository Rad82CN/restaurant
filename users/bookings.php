<?php require "../libs/App.php"; ?>
<?php require "../config/config.php"; ?>
<?php require "../includes/header.php"; ?>
<?php

  $app = new App;
  $app->validateLogin();

  $user_id = $_SESSION['user_id'];
  $query = "SELECT * FROM bookings WHERE user_id='$user_id'";
  $bookings = $app->selectAll($query);

?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Your Bookings</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="<?php echo APPURL; ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo APPURL; ?>/users/bookings.php">Bookings</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Service Start -->
            <div class="container">
                <div class="col-md-12">
                    <?php foreach($bookings as $booking) : ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Date Time</th>
                                    <th scope="col">No of People</th>
                                    <th scope="col">Special Request</th>
                                    <th scope="col">Status</th>
                                    <?php if($booking->status == "pending") : ?>
                                        <th scope="col">Delete</th>
                                    <?php else : ?>
                                        <th scope="col">Review</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th><?php echo $booking->name; ?></th>
                                    <td><?php echo $booking->email; ?></td>
                                    <td><?php echo $booking->date_time; ?></td>
                                    <td><?php echo $booking->people; ?></td>
                                    <td><?php echo $booking->special_request; ?></td>
                                    <td><?php echo $booking->status; ?></td>
                                    <?php if($booking->status == "pending") : ?>
                                        <td><a href="<?php echo APPURL; ?>/users/delete-booking.php?id=<?php echo $booking->id; ?>" class="btn btn-danger text-white">Delete</td>
                                    <?php else : ?>
                                        <td><a href="<?php echo APPURL; ?>/users/review.php" class="btn btn-success text-white">Review Us</td>
                                    <?php endif; ?>
                                </tr>
                            </tbody>
                        </table>
                    <?php endforeach; ?>
                </div>
            </div>
        <!-- Service End -->
        
<?php require "../includes/footer.php"; ?>