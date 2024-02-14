<?php

require __DIR__ . '\..\init.php';

// $select= "SELECT employee.id as empID, employee.firstName as empfName,employee.lastName as emplName, employee.email as empEmail, employee.password as emppassword,createdAt as ca, department.name as depname, department.id as depid FROM `employee` JOIN `department` ON employee.departmentid = department.id";
// $ss = mysqli_query($conn , $select);
// $data = mysqli_fetch_assoc($ss);
?>







<main id="main" class="main mb-0 ">


    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <!-- <h1 class="display-5  text-info">Employee</h1>
                        <button>add</button> -->
                        <div class="d-flex mt-3 ">
                            <h1 class="flex-grow-1  text-info">Room Information</h1>
                        </div>
                        <form class="row g-3 mt-2 border-top border-dark">
                            <div class="col-md-6">
                                <label>Room Type </label>
                                <select id="inputState" class="form-select">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Room No</label>
                                <select id="inputState" class="form-select">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Cheek In</label>
                                <select id="inputState" class="form-select">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Cheek Out</label>
                                <select id="inputState" class="form-select">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </form><!-- End No Labels Form -->


                    </div>
                </div>

            </div>
        </div>
    </section>

</main>
<main id="main" class="main mt-0 mb-0">


    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-info">Customer Detail</h5>

                        <!-- Vertical Form -->
                        <form class="row g-3 mt-2 border-top border-dark">
                            <div class="col-6">
                                <label for="inputNanme4" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="inputNanme4">
                            </div>
                            <div class="col-6">
                                <label for="inputNanme4" class="form-label">Lsat Name</label>
                                <input type="text" class="form-control" id="inputNanme4">
                            </div>
                            <div class="col-6">
                                <label for="inputEmail4" class="form-label">Email</label>
                                <input type="email" class="form-control" id="inputEmail4">
                            </div>
                            <div class="col-6">
                                <label for="inputEmail4" class="form-label">Imag</label>
                                <input type="File" class="form-control" id="inputEmail4">
                            </div>
                            <div class="col-6">
                                <label for="inputAddress" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="inputAddress" >
                            </div>
                            <div class="col-6">
                                <label for="inputAddress" class="form-label">Address</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form><!-- Vertical Form -->

                    </div>
                </div>


            </div>
        </div>
    </section>

</main>

<?php
include '../includes/scripts.php';
?>