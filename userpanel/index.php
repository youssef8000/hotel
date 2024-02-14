<?php include './shared/head.php';
include './shared/nav.php';

?>

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center" >

  <div class="container" data-aos="zoom-out" data-aos-delay="100">
    <div class="row">
      <div class="col-xl-6">
        <h1>Hilton Alexandria Corniche</h1>
        <h2>Make Your Vacation Comfortable</h2>
      </div>
    </div>
  </div>

</section> <br><br><!-- End Hero -->
<main id="main">

  <!-- ======= About Section ======= -->
  <section id="about" class="about section-bg">
    <div class="container" data-aos="fade-up">

      <div class="row no-gutters">
        <div class="content col-xl-5 d-flex align-items-stretch">
          <div class="content">
            <h3>Beachfront relaxation overlooking the Med</h3>
            <p>
              Find us on the Corniche beachfront promenade, facing the Mediterranean Sea and surrounded by shopping and dining.
              We're within six kilometers of history at Montaza Palace and the Royal Jewelry Museum, with a free shuttle to our own private beach.
              Relax at our spa, and enjoy a rooftop pool offering panoramic views and a sundeck. </p>
          </div>
        </div>
        <div class="col-xl-7 d-flex align-items-stretch">
          <img src="/hotel/userpanel/photo/1.png" style="width: 90%; border-radius:20px; margin:auto;" alt="">
        </div>
  </section><!-- End About Section -->


  <!-- ======= room Section ======= -->
  <section id="testimonials" class="testimonials">
    <div class="container-fluid" data-aos="fade-up">
      <div class="section-title">
        <h2>Rooms</h2>
      </div>
      <div>
        <img src="/hotel/userpanel/photo/king/KING GUEST ROOM POOL VIEW.jpg" style="width: 100%; height: 90vh;" alt=""><br><br>
        <a id="btn" href="/hotel/userpanel/room/room.php" class="btn btn-primary btn-lg btn-block">View All Rooms</a>
      </div>
    </div>
  </section><!-- End room Section -->
  <hr>

  <!-- ======= dining Section ======= -->
  <section id="testimonials" class="testimonials">
    <div class="container-fluid" data-aos="fade-up">
      <div class="section-title">
        <h2>Dining and drinks</h2>
        <p>Experience Greek, Lebanese, French, and international cuisines at our various restaurants, and stop by NEO sports bar to enjoy live entertainment. The Cigar Bar offers light meals and a selection of renowned cigars, and our infinity pool lounge serves dinner alongside Mediterranean views.</p>
      </div>

      <img src="/hotel/userpanel/photo/dinging and drinks/La Gourmandise Salon De The.png" style="width: 100%; height: 90vh;" alt=""><br><br>
      <a id="btn" href="/hotel/userpanel/dining/dining.php" class="btn btn-primary btn-lg btn-block ">View All Dinging</a>

    </div>
  </section><!-- End dining Section -->
    <!-- address -->
    <div class="container-fluid" id="info">
    <div class="row">
      <div class="col-lg-4" id="call">
        <div class="flex flex-col flex-auto items-center p-4 justify-start">
          <h3>CALL US</h3>
          <h4 style="font-size: 20px; color: #e03a3c"> +20 3 5490935</h4>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="flex flex-col flex-auto items-center p-4 justify-start">
          <h3>Address</h3>
          <a data-testid="utility-address-sec" href="http://maps.google.com/?q=544 El Geish Road, Sidi Bishr, Alexandria, Egypt" target="_blank" rel="noopener noreferrer">
            544 El Geish Road, Sidi Bishr<br>Alexandria, Egypt</a>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="flex flex-col flex-auto items-center p-4 justify-start">

          <h3>ARRIVAL TIME</h3>
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-4">
                <p style="font-size: 20px; color: #e03a3c">
                  Check-in<br>3:00 PM</p>
              </div>
              <div class="col-lg-4">
                <p style="font-size: 20px; color: #e03a3c" rel="noopener noreferrer">
                  Check-out<br>12:00 PM</p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</main><!-- End #main -->

<?php 
include './shared/footer.php';
include './shared/script.php'; 
?>