<?php

include './init.php';

$countEmployee = seletQuery('employee');
$countRoom = seletQuery('rooms');
$countorders = seletQuery('orders');


$availableRooms = seletQuery('rooms', "WHERE status = 'active'");
$bookedRooms = seletQuery('rooms', "WHERE status = 'booked'");


// $select = "SELECT * FROM `rooms` WHERE status = 'active'";
// $sh = mysqli_query($conn, $select);
// $row = mysqli_fetch_all($sh);
// $availableRooms = COUNT($row);


// $selectBookedRooms = "SELECT * FROM `rooms` WHERE status = 'booked'";
// $sh = mysqli_query($conn, $select);
// $row = mysqli_fetch_all($sh);
// $bookedRooms = COUNT($row);

?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Employee Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card customers-card">

                            <div class="card-body">
                                <h5 class="card-title text-center">Employees </h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $countEmployee ?></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Rooms Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title text-center">Rooms </h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class='bx bx-hotel'></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $countRoom ?></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- End Rooms Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title text-center">Available Rooms </h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-check-circle-fill text-success"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $availableRooms ?></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title text-center">Booked Rooms </h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-clipboard-check"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $bookedRooms ?></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title text-center">Orders </h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-clipboard-check"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $countorders ?></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title text-center">Total Earnings </h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-coin text-success"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>145</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div> -->

                </div>
            </div>
        </div>
    </section>
</main>
<?php
include './includes/scripts.php';
?>