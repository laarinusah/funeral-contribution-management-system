<?php

include "../../includes/connection.php";


if(isset($_POST['save'])){


    $name = $_POST['deceased_name'];

    $date = $_POST['funeral_date'];

    $location = $_POST['location'];



    $query = "INSERT INTO funerals
    (deceased_name, funeral_date, location)

    VALUES

    ('$name','$date','$location')";


    $result = mysqli_query($conn,$query);



    if($result){

        echo "Funeral added successfully";

    }

    else{

        echo "Error: ".mysqli_error($conn);

    }


}


?>



<!DOCTYPE html>
<html>

<head>

<title>Add Funeral</title>

<meta name="viewport" content="width=device-width, initial-scale=1">


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


</head>


<body class="bg-light">


<div class="container mt-5">


<div class="card shadow">


<div class="card-header bg-dark text-white">

<h3>
Add Funeral
</h3>

</div>



<div class="card-body">


<form method="POST">


<div class="mb-3">

<label class="form-label">
Name of Deceased
</label>


<input type="text"
name="deceased_name"
class="form-control"
required>

</div>



<div class="mb-3">


<label class="form-label">
Funeral Date
</label>


<input type="date"
name="funeral_date"
class="form-control"
required>


</div>




<div class="mb-3">


<label class="form-label">
Location
</label>


<input type="text"
name="location"
class="form-control">


</div>




<button name="save"
class="btn btn-dark">

Save Funeral

</button>


<a href="view_funeral.php"
class="btn btn-secondary">

View Funerals

</a>


</form>


</div>


</div>


</div>


</body>

</html>