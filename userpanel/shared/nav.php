<?php 
session_start();
if (isset($_POST['logout'])) {
  session_unset();
  session_destroy();
  header("location:/hotel/userpanel/index.php");
}

?>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
  <div class="container d-flex align-items-center">
    <h1 class="logo me-auto"><a href="/hotel/userpanel/index.php"><img src="/hotel/userpanel/photo/icon.jpg" style="width:150% ;" alt=""></a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt=""></a>-->
    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a class="nav-link scrollto active" href="/hotel/userpanel/index.php">Home</a></li>
        <li><a class="nav-link scrollto" href="/hotel/userpanel/activity/activty.php">Activities</a></li>
        <li><a href="/hotel/userpanel/room/room.php">Rooms</a></li>
        <li><a href="/hotel/userpanel/dining/dining.php">Dining</a></li>
        <li><a href="/hotel/userpanel/order/order.php">Order</a></li>


      </ul>
      <i class="bi mobile-nav-toggle bi-list"></i>

    </nav>

    <?php if (isset($_SESSION['custmer'])) : ?>
      <form method="POST">
        <input name="logout" class="btn btn-primary" style="margin-left: 12px;" type="submit" value="Logout">
      </form>
    <?php else : ?>
      <a href="/hotel/userpanel/registration/login.php" class="get-started-btn scrollto">Login</a>
      <a href="/hotel/userpanel/registration/signup.php" class="get-started-btn scrollto">Signup</a>
    <?php endif; ?>

  </div>
</header><!-- End Header -->