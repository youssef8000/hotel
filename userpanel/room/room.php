<?php include '../shared/head.php';
include '../shared/nav.php';
include '../shared/functions/functions.php';

$select = "SELECT rooms.id as romid ,rooms.name as nameRoom ,rooms.descriptions as desrooms,rooms.img as imgrooms,rooms.price as priceroom ,category.name as catname, rooms.status as statusRoom from `rooms` join `category` on rooms.categoryId=category.id where rooms.status = 'active'";
$Room_Selection = mysqli_query($conn, $select);

?>
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <h2>Guest Rooms</h2>
    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Blog Section ======= -->
  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <?php foreach ($Room_Selection as $data) { ?>
          <div class="col-lg-6 entries ">

            <article class="entry">

              <div class="entry-img">
                <img src="/hotel/adminpanle/rooms/upload/<?php echo $data['imgrooms'] ?>" alt="" class="container">
              </div>

              <h2 class="entry-title">
                <?php echo $data['catname'] ?>-<?php echo $data['nameRoom'] ?>
              </h2>

              <div class="entry-content">
                <p>
                  <?php echo $data['desrooms'] ?>
                <h2 class="entry-title">
                  price: <?php echo $data['priceroom'] ?><?php echo "$"; ?>
                </h2>
                </p>
                <div class="read-more">
                  <a name="Booking" href="/hotel/userpanel/booking/add.php?Booking=<?php echo $data['romid'] ?>"> Booking </a>
                </div>
              </div>
            </article><!-- End blog entry -->
          </div>
        <?php } ?>

      </div>
    </div>


</main><!-- End #main -->

<?php
include '../shared/footer.php';
include '../shared/script.php';
?>