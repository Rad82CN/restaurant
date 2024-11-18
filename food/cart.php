<?php require "../libs/App.php"; ?>
<?php require "../config/config.php"; ?>
<?php require "../includes/header.php"; ?>
<?php

  if(isset($_SESSION['user_id'])) {

    $app = new App;
    $user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM cart WHERE user_id='$user_id'";
    $cart_items = $app->selectAll($query);

  }

?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Cart</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Cart</a></li>
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
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($cart_items as $cart_item) : ?>
                          <tr>
                            <th><img src="<?php echo APPURL; ?>/img/<?php echo $cart_item->image; ?>" alt="" style="width: 50px; height: 50px;"></th>
                            <td><?php echo $cart_item->name; ?></td>
                            <td>$<?php echo $cart_item->price; ?></td>
                            <td><a href="<?php echo APPURL; ?>/food/delete-cart-item?id=<?php $cart_item->id ?>" class="btn btn-danger text-white">delete</td>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                      <div class="position-relative mx-auto" style="max-width: 400px; padding-left: 679px;">
                        <p style="margin-left: -7px;" class="w-19 py-3 ps-4 pe-5" type="text"> Total: $100</p>
                        <button type="button" class="btn btn-primary py-2 top-0 end-0 mt-2 me-2">Checkout</button>
                    </div>
                </div>
            </div>
        <!-- Service End -->
        
<?php require "../includes/footer.php"; ?>