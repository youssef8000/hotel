<?php
require __DIR__ . '/../init.php';


$select = "SELECT * FROM `category`";
$s = mysqli_query($conn, $select);
//Insert
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['Roomname'];
    $price = $_POST['Roomprice'];
    $description = $_POST['Roomdescriptions'];
    $image_name = time() . $_FILES['Roomimg']['name'];
    $image_temp = $_FILES['Roomimg']['tmp_name'];
    $type = $_POST['Roomtype'];
    $location = "upload/";
    $id = $_SESSION['id'];
    move_uploaded_file($image_temp, $location . $image_name);
    $insert = "INSERT INTO `rooms` VALUES (null,'$name',$price,'$description','$image_name',$id,$type,'active',null)";
    $i = mysqli_query($conn, $insert);
    header('location:/hotel/adminpanle/rooms/view.php');
    exit();
}
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
                        <form class="row g-3 mt-2 border-top border-dark" method="POST" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <label>Room Type </label>
                                <select name="Roomtype" id="inputState" class="form-select">
                                    <option selected><?php foreach ($s as $data) { ?>

                                    <option value="<?php echo $data['id']  ?> "> <?php echo $data['name']  ?> </option>
                                <?php } ?>

                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Room Name</label>
                                <input name="Roomname" type="text" class="form-control" id="inputNanme4">

                            </div>
                            <div class="col-6">
                                <label for="inputEmail4" class="form-label">Image</label>
                                <input name="Roomimg" type="File" class="form-control" id="inputEmail4">
                            </div>
                            <div class="col-6">
                                <label for="inputNanme4" class="form-label">Descriptions</label>
                                <input name="Roomdescriptions" type="text" class="form-control" id="inputNanme4">
                            </div>
                            <div class="col-6">
                                <label for="inputNanme4" class="form-label">price</label>
                                <input name="Roomprice" type="text" class="form-control" id="inputNanme4">
                            </div>
                            <div class="text-center">
                                <button name="btnSend" class="btn btn-primary w-25 mx-auto">Send Data</button>
                            </div>
                        </form><!-- End No Labels Form -->


                    </div>
                </div>

            </div>
        </div>
    </section>


    <?php
    include '../includes/scripts.php';
    ?>