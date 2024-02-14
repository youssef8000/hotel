<?php 
include '../shared/head.php';
include '../shared/nav.php';
include '../shared/functions/functions.php';
$customerID = $_SESSION['CustomerID'];

$select_order = "SELECT category.name as categoryName, orders.id as orderID ,orders.check_in as StartDay ,orders.check_out as EndDay,orders.price as orderPrice,rooms.name as roomName ,  orders.status as orderStatus from `orders` JOIN category on orders.categoryId=category.id JOIN rooms on orders.room_id=rooms.id where  `custmerId` = $customerID ";
$order_Selection = mysqli_query($conn, $select_order);


//delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $select = "SELECT orders.id as orderID, rooms.id as roomId   from `orders`  join `rooms` on orders.room_id=rooms.id where orders.id = $id";
    $se = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($se);
    $roomId = $row['roomId'];

    $update = "UPDATE `rooms` SET `status` = 'active'  where `id` = $roomId";
    $u = mysqli_query($conn, $update);

    $delete = "DELETE from `orders` where orders.id = $id";
    $delete_orders = mysqli_query($conn, $delete);
    header("location: /hotel/userpanel/order/order.php");
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
                        <a>add</button> -->
                        <div class="d-flex mt-3 mb-3 border-bottom border-dark">
                            <h1 class="flex-grow-1  text-info mb-3">Orders</h1>

                        </div>
                        <!-- Table with stripped rows -->
                        <table class="table rowtable ">
                            <thead>
                                <tr>
                                    <th scope="col">RoomName</th>
                                    <th scope="col">RoomType</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($order_Selection as $data) { ?>
                                    <tr class="<?php
                                                if ($_SESSION['CustomerID']) {
                                                    if ($data['orderStatus'] == 'whating') {
                                                        echo 'alert alert-warning';
                                                    } elseif ($data['orderStatus'] == 'filed') {
                                                        echo 'alert alert-danger';
                                                    } elseif ($data['orderStatus'] == 'aprove') {
                                                        echo 'alert alert-success';
                                                    }
                                                }
                                                ?>">
                                        <td><?php echo $data['roomName'] ?></td>
                                        <td><?php echo $data['categoryName'] ?></td>
                                        <td><?php echo $data['StartDay'] ?></td>
                                        <td><?php echo $data['EndDay'] ?></td>
                                        <td><?php echo $data['orderPrice'] ?><?php echo "$" ?></td>

                                        <td>

                                            <a class="btn btn-danger" href="/hotel/userpanel/order/order.php?delete=<?php echo $data['orderID'] ?>" onclick="return confirm('Are You Sure ? ')"><i class="bi bi-trash"></i></a>
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
<?php include '../shared/script.php'; ?>