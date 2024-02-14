<?php 
include '../shared/head.php';
include '../shared/nav.php';
include '../shared/functions/functions.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
auth();
ob_start();

if (isset($_GET['Booking'])) {
    $id = $_GET['Booking'];
    $select = "SELECT rooms.id as roomID ,rooms.name as roomName , rooms.price as roomPrice,rooms.categoryId as CatID  ,category.name as CatName FROM `rooms` JOIN `category` on rooms.categoryId=category.id WHERE rooms. id=$id";
    $Select_room = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($Select_room);
    $RoomPrice = $row['roomPrice'];
    $catID = $row['CatID'];
}
function dateDiffInDays($date1, $date2)
{
    // Calculating the difference in timestamps
    $diff = strtotime($date2) - strtotime($date1);
    // 24 * 60 * 60 = 86400 seconds
    return abs(round($diff / 86400));
}

//Insert code 
if (isset($_POST['btnSumbit'])) {
    $start_date = $_POST['startDay'];
    $end_date = $_POST['endDay'];
    $roomId = $_GET['Booking'];
    $days = dateDiffInDays($start_date, $end_date);
    $totalPrice = $days * $RoomPrice;
    $customerID = $_SESSION['CustomerID'];
    $insert = "INSERT INTO `orders` VALUES (null,$customerID,$catID,$roomId,'$start_date','$end_date',$days, $totalPrice,null,'whating')";
    $i = mysqli_query($conn, $insert);
    print_r($i);
    header("location:/hotel/userpanel/order/order.php");
    exit();
}

?>

<br>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="card-body">
                    <div class="d-flex mt-3 ">
                        <h1 class="flex-grow-1  text-info">Reservation
                        </h1>
                    </div>
                    <form class="row g-3 mt-2 border-top border-dark" method="POST">
                        <div class="col-md-6">
                            <label>Room Type </label>
                            <input type="text" value="<?php echo $row['CatName'] ?>" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">

                        </div>
                        <div class="col-md-6">
                            <label>Room Name</label>
                            <input type="text" value="<?php echo $row['roomName'] ?>" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">

                        </div>
                        <div class="col-md-6">
                            <label>Cheek In</label>
                            <input type="date" class="form-control" name="startDay" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">

                        </div>
                        <div class="col-md-6">
                            <label>Cheek Out</label>
                            <input type="date" class="form-control" name="endDay" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        </div>
                        <div class="col-md-6">
                            <label>Total Price</label>
                            <input type="text" disabled name="totalPrice" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">

                        </div>
                        <button name="btnSumbit" class="btn btn-primary btn-block my-5 w-25" style="margin-left: 35%;"> Sumbit</button>

                    </form><!-- End No Labels Form -->

                </div>
            </div>
        </div>
    </div>
</section>


<?php include '../shared/script.php'; ?>