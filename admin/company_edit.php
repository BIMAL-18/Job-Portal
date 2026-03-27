<?php
include('connection/db.php');

include('include/header.php');
include('include/sidebar.php');

$id = $_GET['edit'];

$query = mysqli_query($conn,"select * from company where company_id='$id'");
while ($row=mysqli_fetch_array($query)) {
    $company_name = $row['company'];
    $des = $row['des'];
    $admin = $row['admin'];
}
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="create_company.php">Company</a></li>
            <li class="breadcrumb-item"><a href="#">Update Company</a></li>
        </ol>
    </nav>

    <h1 class="h2">Update Company</h1>

    <div style="width: 60%; margin-left:25%; background-color: #F2F4F4;">
        
        <div id="msg"></div>

        <form action="" method="post" style="margin: 3%; padding: 3%;" name="customer_form" id="customer_form">

            <div class="form-group">
                <label>Enter Company Name</label>
                <input type="text" name="Company" id="Company"
                       value="<?php echo $company_name; ?>"
                       class="form-control"
                       placeholder="Company Name">
            </div>

            <div class="form-group">
                <label>Enter Description</label>
                <textarea name="des" id="des" class="form-control" cols="30" rows="10"><?php echo $des; ?></textarea>
            </div>
                        <div class="form-group">
    <label for="Customer Username">Select Company Admin</label>
    <select name="admin" id="admin" class="form-control">
        <?php
        include('connection/db.php');
        $sql = mysqli_query($conn, "SELECT * FROM admin_login WHERE admin_type='2'");
        while ($row = mysqli_fetch_array($sql)) {
        ?>
            <option value="<?php echo $row['admin_email']; ?>"><?php echo $row['admin_email']; ?></option>
        <?php
        }
        ?>
    </select>
</div>

            <div class="form-group">
                <input type="hidden" name="id" id="id" value="<?php echo $_GET['edit']; ?>">

                <input type="submit" class="btn btn-block btn-success" name="submit" id="submit" value="Update">
            </div>

        </form>
    </div>

</main>

<?php
// ================= UPDATE PHP =================
if(isset($_POST['submit'])){

    $id = $_POST['id'];
    $company = $_POST['Company'];
    $des = $_POST['des'];
    $admin = $_POST['admin'];

    $query1 = mysqli_query($conn,"UPDATE company SET 
        company='$company',
        des='$des',
        admin='$admin'

        WHERE company_id='$id'");

    if($query1){
        echo "<script>alert('Record has been Updated successfully')</script>";
    }else{
        echo "<script>alert('Error Updating record')</script>";
    }
}
?>

</div>

<!-- JS Files -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="../../assets/js/vendor/popper.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>

<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace();
</script>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.3.7/js/dataTables.js"></script>
<script>
    $(document).ready(function(){
        $('#example').DataTable();
    });
</script>

</body>
</html>