<?php
include '../includes/head.php';

// include '../includes/headers.php';
include '../includes/aside.php';
include '../env.php';

$do = isset($_GET['do']) ? $do = $_GET['do'] : '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    if (trim($name) == ""  || strlen($name) < 4) {
        if (trim($name) == "") {
            $vaildname = "<div class='alert alert-danger w-50'>Please Enter Your Role</div>";
        }

        if (strlen($name) < 4) {
            $vaildname = "<div class='alert alert-danger w-50'>Please Enter Name Must be More 4 Character </div>";
        }
    } else {
        $insert = "INSERT INTO `roles` VALUES (NULL,'$name',NULL)";
        $i = mysqli_query($conn, $insert);
        // testMessage($i, "Insert Doctor");
    }
}

$select = "SELECT * FROM `roles`";
$rows = mysqli_query($conn, $select);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delet = "DELETE FROM `roles` WHERE id=$id";
    $d = mysqli_query($conn, $delet);
    header("location:/hotel/adminpanle/roles/index.php");
}

$name = '';
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $select = "SELECT * FROM `roles` WHERE  id=$id";
    $su = mysqli_query($conn, $select);
    $data = mysqli_fetch_assoc($su);
    $name = $data['name'];

    // if (isset($_POST['update'])) {
    //     $name = $_POST['name'];
    //     $email = $_POST['email'];
    //     $speciliz = $_POST['specilizID'];
    //     $update = "UPDATE `doctor` SET `name`='$name', `email`='$email', specilization_id=$speciliz WHERE id=$id";
    //     $u = mysqli_query($conn, $update);
    //     header("location:/hms/doctor/list.php");
    // }
}
if ($do == 'edit') {
    $id = $_GET['id'];
?>
    <div class="modal fade " id="eidtRole" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
        <div class=" modal-dialog">
            <?php
            // $select = "SELECT * FROM `roles` WHERE  id=$row[id]";
            // $su = mysqli_query($conn, $select);
            // $data = mysqli_fetch_assoc($su);
            ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title ">Role Name</h5>

                            <!-- No Labels Form -->
                            <form class="row g-3" method="POST">
                                <div class="col-md-12">
                                    <input type="text" value="<?= $_GET['id'] ?>" name='name' class="form-control" placeholder=" Role Name">
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary w-50 mx-auto text-lg">Update</button>
                                </div>
                            </form><!-- End No Labels Form -->

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<?php
}

?>






<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title ">Role Name</h5>

                        <!-- No Labels Form -->
                        <form class="row g-3" method="POST">
                            <div class="col-md-12">
                                <input type="text" name='name' class="form-control" placeholder=" Role Name">
                            </div>
                            <div class="text-center">
                                <button name='add' class="btn btn-primary w-50 mx-auto text-lg">Add</button>
                            </div>
                        </form><!-- End No Labels Form -->

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<main id="main" class="main">


    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <!-- <h1 class="display-5  text-info">Employee</h1>
                        <button>add</button> -->
                        <div class="d-flex mt-3 mb-3 border-bottom border-dark">
                            <h1 class="flex-grow-1 mb-3 text-info">Rooms</h1>
                            <button type="button" class="btn btn-info mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Add Role
                            </button>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name Role</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($rows as $row) { ?>
                                    <tr>
                                        <th scope="row"><?= $row['id'] ?></th>
                                        <td><?= $row['name'] ?></td>

                                        <td>
                                            <a data-bs-toggle="modal" id="editRole" data-bs-target="#eidtRole" class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i></a>
                                            <a href="/hotel/adminpanle/roles/index.php?delete=<?php echo $row['id'] ?>" onclick="return confirm('Are You Sure')" class="btn btn-danger"><i class="bi bi-trash"></i></a>

                                        </td>
                                    </tr>


                                <?php } ?>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main>

<?php
include '../includes/scripts.php';
?>