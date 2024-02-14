<?php
require __DIR__ . '/../init.php';
// show all type Room    s=alltype
$select = "SELECT category.id as CatID ,category.name as catName FROM `category`";
$s = mysqli_query($conn, $select);
$dataCat = mysqli_fetch_assoc($s);


// show all room where id = id

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $select = "SELECT * FROM `rooms` WHERE id=$id";
    $su = mysqli_query($conn, $select);
    $datau = mysqli_fetch_assoc($su);


    $name = $datau['name'];
    $price = $datau['price'];
    $description = $datau['descriptions'];
    $category = $dataCat['catName'];
    $image = $datau['img'];

    // update
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['update'])) {
            $name = $_POST['Roomname'];
            $price = $_POST['Roomprice'];
            $description = $_POST['Roomdescriptions'];
            $type = $_POST['Roomtype'];
            //    updata image
            $image_name = time() . $_FILES['Roomimg']['name'];
            $image_temp = $_FILES['Roomimg']['tmp_name'];
            $location = "upload/";
            move_uploaded_file($image_temp, $location . $image_name);

            $update = "UPDATE `rooms` SET  `name`='$name',`price`= $price ,`descriptions`='$description',`img`='$image_name', `adminId`= NULL , `categoryId` = $type ,`createAt` = NULL  WHERE id =$id";
            $u = mysqli_query($conn, $update);
            header('location:/hotel/adminpanle/rooms/view.php');
            exit();
        }
    }
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

                                    <?php foreach ($s as $data) { ?>

                                        <option value="<?php echo $data['CatID']; ?>" <?php if ($datau['categoryId'] == $data['CatID']) {
                                                                                            echo 'selected';
                                                                                        } else {
                                                                                            echo '';
                                                                                        } ?>> <?php echo $data['catName']  ?> </option>
                                    <?php } ?>

                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Room Name</label>
                                <input name="Roomname" value="<?php echo $name ?>" type="text" class="form-control" id="inputNanme4">

                            </div>
                            <div class="col-6">
                                <label for="inputEmail4" class="form-label">Image</label>
                                <input name="Roomimg" value="<?php echo $image_name ?>" type="File" class="form-control" id="inputEmail4">
                            </div>
                            <div class="col-6">
                                <label for="inputNanme4" class="form-label">Descriptions</label>
                                <input name="Roomdescriptions" value="<?php echo $description ?>" type="text" class="form-control" id="inputNanme4">
                            </div>
                            <div class="col-6">
                                <label for="inputNanme4" class="form-label">price</label>
                                <input name="Roomprice" value="<?php echo $price ?>" type="text" class="form-control" id="inputNanme4">
                            </div>

                            <button name="update" class="btn btn-primary">Update Data</button>
                        </form><!-- End No Labels Form -->


                    </div>
                </div>

            </div>
        </div>
    </section>


    <?php
    include '../includes/scripts.php';
    ?>