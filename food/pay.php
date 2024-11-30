<?php require "../libs/App.php"; ?>
<?php require "../config/config.php"; ?>
<?php require "../includes/header.php"; ?>
<?php

    App::validateLogin();
    
    if(isset($_POST['submit'])) {
    
        echo "<script>window.location.href='delete-paid-cart.php'</script>";
    
    }

?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Pay</h1>
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
                <div class="col-md-12">
                    <div class="position-relative mx-auto justify-content-center">
                        <form method="POST" action="pay.php">
                          <button name="submit" type="submit" class="btn btn-primary py-2 top-0 end-0 mt-2 me-2">Pay</button>
                        </form>
                    </div>
                </div>
        <!-- Service End -->
        
<?php require "../includes/footer.php"; ?>