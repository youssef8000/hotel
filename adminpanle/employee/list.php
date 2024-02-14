<?php
ob_start();
require __DIR__ . '/../init.php';

$select = "SELECT employee.id as empID, employee.firstName as empfName,employee.lastName as emplName, employee.email as empEmail, employee.password as emppassword,createdAt as ca, department.name as depname, department.id as depid FROM `employee` JOIN `department` ON employee.departmentid = department.id";
$ss = mysqli_query($conn, $select);
$data = mysqli_fetch_assoc($ss);
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE from `employee` where `id` = $id";
    $d = mysqli_query($conn, $delete);
    header("location: /hotel/adminpanle/employee/list.php");
    exit();
}
?>
<a href="/hotel/adminpanle/employee/add.php" class="btn btn-primary">
    <h5>Add Employees</h5>
</a>
<main id="main" class="main">


    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <!-- <h1 class="display-5  text-info">Employee</h1>
                        <a>add</button> -->
                        <div class="d-flex mt-3 mb-3 border-bottom border-dark">
                            <h1 class="flex-grow-1  text-info mb-3">Employee</h1>
                            <a href="/hotel/adminpanle/employee/add.php" class="btn btn-info mb-3">
                                Add Employee
                            </a>
                        </div>
                        <!-- Table with stripped rows -->
                        <table class="table rowtable ">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">FirstName</th>
                                    <th scope="col">LastName</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($ss as $data) { ?>
                                    <tr>

                                        <th scope="row"><?php echo $data['empID'] ?></th>
                                        <td><?php echo $data['empfName'] ?></td>
                                        <td><?php echo $data['emplName'] ?></td>
                                        <td><?php echo $data['depname'] ?></td>
                                        <td><?php echo $data['empEmail'] ?></td>
                                        <td><?php echo $data['ca'] ?></td>

                                        <td>
                                            <a class="btn btn-info" href="/hotel/adminpanle/employee/add.php?edit=<?php echo $data['empID'] ?>"><i class="bi bi-pencil-square"></i></a>
                                            <a class="btn btn-danger" href="/hotel/adminpanle/employee/list.php?delete=<?php echo $data['empID'] ?>" onclick="return confirm('Are You Sure ? ')"><i class="bi bi-trash"></i></a>
                                        </td>

                                    </tr>
                                <?php }; ?>
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