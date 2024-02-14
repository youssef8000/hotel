<?php
require __DIR__ . '/../init.php';

if (isset($_POST['add'])) {
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dep = $_POST['dep'];
    $shift = $_POST['shift'];
    $insert = "INSERT INTO `employee` VALUES(null,'$fname','$lname','$email','$password',$dep,$shift,null)";
    $i = mysqli_query($conn, $insert);
    header("location: /hotel/adminpanle/employee/list.php ");
}

$selectdep=SeleetQuery('department');
$selectshift=SeleetQuery('shift');

$fname = "";
$lname = "";
$email = "";
$password = "";
$update = False;
if (isset($_GET['edit'])) {
    $update = true;
    $id = $_GET['edit'];
    $select = "SELECT * from `employee` where id = $id";
    $se = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($se);
    $fname = $row['firstName'];
    $lname = $row['lastName'];
    $email = $row['email'];
    $password = $row['password'];
    $dep = $row['departmentid'];
    $shift = $row['shift'];
    if (isset($_POST['update'])) {
        $id = $_GET['edit'];
        $fname = $_POST['firstName'];
        $lname = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $dep = $_POST['dep'];
        $shift = $_POST['shift'];
        $update = "UPDATE `employee` SET `firstName` = '$fname' ,`lastName` = '$lname' ,`email` = '$email' ,`password` = '$password' where `id` = $id";
        $u = mysqli_query($conn, $update);
        header("location: /hotel/adminpanle/employee/list.php ");
        exit();
    }
}
?>
<section class="vh-100 bg-image w-800">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h5 class="text-center">Data Employees</h5>

                            <!-- No Labels Form -->
                            <form class="row g-3" method="POST">
                                <div class="col-md-12">
                                    <input type="text" value="<?= $fname ?>" name="firstName" class="form-control" placeholder="Your First Name">
                                </div>
                                <div class="col-md-12">
                                    <input type="text" value="<?= $lname ?>" name="lastName" class="form-control" placeholder="Your Last Name">
                                </div>
                                <div class="col-md-12">
                                    <input type="email" value="<?= $email ?>" name="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="col-md-12">
                                    <input type="password" value="<?= $password ?>" name="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="col-md-6">
                                    <select id="inputState" name="dep" class="form-select">
                                        <option selected>Department</option>
                                        <?php foreach ($selectdep as $row) { ?>
                                            <option value="<?php echo $row[0]; ?>"><?php echo $row[1] ?>
                                            </option>
                                        <?php }; ?>
                                        <option>...</option>
                                    </select>
                                </div>
                                <select id="inputState" name="shift" class="form-select">
                                    <option selected>Shift</option>
                                    <?php foreach ($selectshift as $row2) {
                                        echo $row2 ?>
                                        <option value="<?php echo $row2[0]; ?>"><?php echo $row2[1] ?>
                                        </option>
                                    <?php }; ?>
                                    <option>...</option>
                                </select>
                                <div class="text-center">
                                    <?php if ($update) : ?>
                                        <button name="update" value="" class="btn btn-primary w-50 mx-auto text-lg">Update</button>
                                    <?php else : ?>
                                        <button name="add" class="btn btn-primary w-50 mx-auto text-lg">Add</button>
                                    <?php endif; ?>
                                </div>
                            </form><!-- End No Labels Form -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include '../includes/scripts.php';
?>