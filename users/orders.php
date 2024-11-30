<?php require "../libs/App.php"; ?>
<?php require "../config/config.php"; ?>
<?php require "../includes/header.php"; ?>
<?php

  $app = new App;
  $app->validateLogin();

  $user_id = $_SESSION['user_id'];
  $query = "SELECT * FROM orders WHERE user_id='$user_id'";
  $orders = $app->selectAll($query);

?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Your Orders</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="<?php echo APPURL; ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo APPURL; ?>/users/orders.php">Orders</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Service Start -->
            <div class="container">
                
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Town</th>
                            <th scope="col">Country</th>
                            <th scope="col">zipcode</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Address</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Status</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php foreach($orders as $order) : ?>
                                <tr>
                                    <th><?php echo $order->name; ?></th>
                                    <td><?php echo $order->email; ?></td>
                                    <td><?php echo $order->town; ?></td>
                                    <td><?php echo $order->country; ?></td>
                                    <td><?php echo $order->zipcode; ?></td>
                                    <td><?php echo $order->phone_number; ?></td>
                                    <td><?php echo $order->address; ?></td>
                                    <td>$<?php echo $order->total_price; ?></td>
                                    <td><?php echo $order->status; ?></td>
                                    <td><?php echo $order->created_at; ?></td>
                                    <td><a href="<?php echo APPURL; ?>/users/delete-order.php?id=<?php echo $order->id; ?>" class="btn btn-danger text-white">Delete</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <!-- Service End -->
        
<?php require "../includes/footer.php"; ?>