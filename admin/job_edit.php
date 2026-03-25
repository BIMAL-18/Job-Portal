<?php

include('include/header.php');
include('include/sidebar.php');
?>

<?php
include('connection/db.php');
echo $edit= $_GET['edit'];
$query = mysqli_query($conn,"select * from all_jobs where job_id='{$edit}'");
// var_dump($query);
while($row= mysqli_fetch_array($query)){
    $Title = $row['job_title'];
    $Description = $row['des'];
    $country = $row['country'];
    $state = $row['state'];
    $city = $row['city'];

}
?>




        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
              <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="Job_create.php">All Job List</a></li>
    <li class="breadcrumb-item"><a href="#">Edit Job</a></li>
  </ol>
</nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
       
<h1 class="h2">Edit Job</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
              
              </div>
              <!-- <a href="add_customer.php" class="btn btn-primary">Add Customer</a> -->
            </div>

          </div>
          <div style="width: 60%; margin-left:25%; background-color: #F2F4F4;">
            
            <div id="msg"></div>
            <form action="" method="post" style="margin: 3% ; padding: 3%;" name="job_form" id="job_form">
              <div class="form-group">
                <label for="Customer Email">Job Title</label>
               <input type="text" name="job_title" value="<?php echo $Title; ?>" id="job_title" class="form-control" placeholder="Enter job title">

                <!-- <input type="email" name="email" id="email" class="form-control" placeholder="Enter Customer Email"> -->
                
            </div>
            <div class="form-group">
                <label for="Customer Username">Description</label>
                <textarea name="Description" id="Description" class="form-control" cols="30" rows="10"><?php echo $Description ?></textarea>
                <!-- <input type="text" name="Username" id="Username" class="form-control" placeholder="Enter Customer Username"> -->

            </div classname="form-group">
            <label for=""></label>

            <div class="form-group">

            <input type="hidden" name="id" id="id" value="<?php echo $_GET['edit']; ?>">
    <label>Country</label>
    <select name="country" value="<?php echo $country; ?> " class="form-control" id="countryId">
        <option value="">Select Country</option>
    </select>
</div>

<div class="form-group">
    <label>State</label>
    <select name="state" class="form-control" value="<?php echo $state; ?>" id="stateId" disabled>
        <option value="">Select State</option>
    </select>
</div>

<div class="form-group">
    <label>City</label>
    <select name="city" class="form-control" value="<?php echo $city ;?>" id="cityId" disabled>
        <option value="">Select City</option>
    </select>
</div>

<script>
// Data: countries -> states -> cities
const data = {
    "USA": {
        "California": ["Los Angeles", "San Francisco", "San Diego"],
        "Texas": ["Houston", "Dallas", "Austin"]
    },
    "India": {
        "Maharashtra": ["Mumbai", "Pune", "Nagpur"],
        "Karnataka": ["Bangalore", "Mysore", "Mangalore"]
    },
    "Canada": {
        "Ontario": ["Toronto", "Ottawa", "Hamilton"],
        "Quebec": ["Montreal", "Quebec City"]
    },
    "Nepal": {
        "Bagmati": ["Kathmandu", "Lalitpur", "Bhaktapur"],
        "Gandaki": ["Pokhara", "Lekhnath", "Dewachen"],
        "Lumbini": ["Butwal", "Bhairahawa"]
    }
};

// Populate country dropdown
const countrySelect = document.getElementById('countryId');
const stateSelect = document.getElementById('stateId');
const citySelect = document.getElementById('cityId');

window.addEventListener('load', () => {
    for (let country in data) {
        const option = document.createElement('option');
        option.value = country;
        option.text = country;
        countrySelect.appendChild(option);
    }
});

// When country changes, populate states
countrySelect.addEventListener('change', () => {
    const country = countrySelect.value;

    // Reset state and city
    stateSelect.innerHTML = '<option value="">Select State</option>';
    citySelect.innerHTML = '<option value="">Select City</option>';
    stateSelect.disabled = true;
    citySelect.disabled = true;

    if (country !== "") {
        stateSelect.disabled = false;
        const states = Object.keys(data[country]);
        states.forEach(state => {
            const option = document.createElement('option');
            option.value = state;
            option.text = state;
            stateSelect.appendChild(option);
        });
    }
});

// When state changes, populate cities
stateSelect.addEventListener('change', () => {
    const country = countrySelect.value;
    const state = stateSelect.value;

    citySelect.innerHTML = '<option value="">Select City</option>';
    citySelect.disabled = true;

    if (state !== "") {
        citySelect.disabled = false;
        const cities = data[country][state];
        cities.forEach(city => {
            const option = document.createElement('option');
            option.value = city;
            option.text = city;
            citySelect.appendChild(option);
        });
    }
});
</script>

            <!-- <div class="form-group">
                <label for="Admin Type">Admin Type</label>
                <select name="admin_type"  class="form-control" id="admin_type">
                    <option value="1">Super Admin</option>
                    <option value="2">Customer Admin</option>
                    </select>

                </div> -->
                <div class="form-group">
              
                <input type="submit" class="btn btn-block btn-success" placeholder="Save" name="submit" id="submit">


            </div>



          </form>
          </div>
          <canvas class="my-4" id="myChart" width="900" height="380"></canvas>

          <div class="table-responsive">
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- datatables plugins -->

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.3.7/js/dataTables.js"></script>
    <script>
        $(document).ready(function(){
            $('#example').DataTable();
        });
    </script>

    <script>
    //   $(document).ready(function(){
    //  $("#submit").click(function () {
    //   var Description = $("#Description").val();
    //   var job_title = $("#job_title").val();
    //   var countryId = $("#countryId").val();
    //   var stateId = $("#stateId").val();
    //   var cityId = $("#cityId").val();

   

    // if(Description ==''){
    //     // alert("Please Enter Description");
    //     return false;
    // }
    // // if(job_title == ''){
    //     alert("Please Enter job title");
    //     return false;
    // }
    // // if(countryId == ''){
    //     alert("Please Select country Name");
    //     return false;
    // }
    // if(stateId == ''){
    //     alert("Please Select state Name");
    //     return false;
    // }
    // if(cityId == ''){
    //     alert("Please Select city Name");
    //     return false;
    // }


    //   var data = $("#job_form").serialize();

//       $.ajax({
//         type:"POST",
//         url:"add_new_job.php",
//         data:data,
//         success:function(data){

//   // $("#msg").html(data);
//   // data read from customer_add.php
//         alert(data);


//         }
    //   });

      // alert(admin_type);
      // alert(email);  
      
      
    //  })
    //   });
    </script>

  </body>
</html>

<?php
include('connection/db.php');
if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $job_title = $_POST['job_title'];
    $Description = $_POST['Description'];

    // Fetch existing values
    $query = mysqli_query($conn,"SELECT * FROM all_jobs WHERE job_id='$id'");
    $row = mysqli_fetch_assoc($query);

    $country = !empty($_POST['country']) ? $_POST['country'] : $row['country'];
    $state = !empty($_POST['state']) ? $_POST['state'] : $row['state'];
    $city = !empty($_POST['city']) ? $_POST['city'] : $row['city'];

    $query1 = mysqli_query($conn,"UPDATE all_jobs SET 
        job_title='$job_title',
        des='$Description',
        country='$country',
        state='$state',
        city='$city'
        WHERE job_id='$id'");

    if($query1){
        echo "<script>alert('Record has been Updated successfully');</script>";
    }else{
        echo "<script>alert('Error Updating record');</script>";
    }
}
?>