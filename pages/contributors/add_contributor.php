<?php

include "../../includes/connection.php";


if(isset($_POST['save'])){


    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];



    $query = "INSERT INTO contributors
    (fullname, phone, gender, address)

    VALUES

    ('$fullname','$phone','$gender','$address')";


    $result = mysqli_query($conn,$query);



    if($result){

        echo "Contributor added successfully";

    }
    else{

        echo "Error: ".mysqli_error($conn);

    }

}


?>


<!DOCTYPE html>
<html>

<head>

<title>Add Contributor</title>

<meta name="viewport" content="width=device-width, initial-scale=1">


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


</head>


<body class="bg-light">


<div class="container mt-5">


<div class="card shadow">


<div class="card-header bg-dark text-white">

<h3>
Add Contributor
</h3>

</div>



<div class="card-body">


<form method="POST">


<div class="mb-3">

<label class="form-label">
Full Name
</label>


<input type="text"
name="fullname"
class="form-control"
required>


</div>



<div class="mb-3">


<label class="form-label">
Phone Number
</label>


<input type="text"
name="phone"
class="form-control">


</div>




<div class="mb-3">


<label class="form-label">
Gender
</label>


<select name="gender"
class="form-select">


<option value="Male">
Male
</option>


<option value="Female">
Female
</option>


</select>


</div>




<div class="mb-3">


<label class="form-label">
Address
</label>


<textarea name="address"
class="form-control"></textarea>


</div>




<button name="save"
class="btn btn-dark">

Save Contributor

</button>



<a href="view_contributors.php"
class="btn btn-secondary">

View Contributors

</a>



</form>


</div>


</div>


</div>


</body>

</html>