<?php
require __DIR__ . '/../init.php';
//select
$select = "SELECT rooms.id as roomID, rooms.name as roomName,rooms.price as roomPrice , category.name as catName from `rooms` JOIN category ON rooms.categoryId=category.id";
$s = mysqli_query($conn, $select);
//delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM `rooms` WHERE id=$id";
    $d = mysqli_query($conn, $delete);
    header('location:/hotel/adminpanle/rooms/view.php');
    exit();
}
?>



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
                            <a href="/hotel/adminpanle/rooms/add.php" class="btn btn-info mb-3" data-bs-target="#exampleModal">
                                Add Room</a>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">RoomName</th>
                                    <th scope="col">Room Type</th>
                                    <th scope="col">price</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($s as $data) { ?>
                                    <tr>

                                        <th scope="row"><?php echo $data['roomName'] ?></th>
                                        <td><?php echo $data['catName'] ?></td>
                                        <td> <?php echo $data['roomPrice'] ?></td>
                                        <td>
                                            <a class="btn btn-info" href="/hotel/adminpanle/rooms/update.php?edit=<?php echo $data['roomID'] ?>" name="edit"><i class="bi bi-eye-fill"></i></a>
                                            <a class="btn btn-danger" href="/hotel/adminpanle/rooms/view.php?delete=<?php echo $data['roomID'] ?>" onclick="return confirm('Are you sure?')" name="delete"><i class="bi bi-trash"></i></a>
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