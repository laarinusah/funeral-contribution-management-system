<?php

include "../../includes/connection.php";


// Get contributors

$contributor_query = "SELECT * FROM contributors";

$contributor_result = mysqli_query($conn,$contributor_query);


// Get funerals

$funeral_query = "SELECT * FROM funerals";

$funeral_result = mysqli_query($conn,$funeral_query);



if(isset($_POST['save'])){


    $contributor_id = $_POST['contributor_id'];

    $funeral_id = $_POST['funeral_id'];

    $amount = $_POST['amount'];

    $payment_method = $_POST['payment_method'];

    $date = $_POST['contribution_date'];



    $query = "INSERT INTO contributions

    (contributor_id, funeral_id, amount, payment_method, contribution_date)

    VALUES

    ('$contributor_id',
     '$funeral_id',
     '$amount',
     '$payment_method',
     '$date')";



    $result = mysqli_query($conn,$query);



    if($result){

        echo "Contribution added successfully";

    }

    else{

        echo mysqli_error($conn);

    }


}


?>


<!DOCTYPE html>
<html>

<head>

<title>Add Contribution</title>

<meta name="viewport" content="width=device-width, initial-scale=1">


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


</head>


<body class="bg-light">


<div class="container mt-5">


<div class="card shadow">


<div class="card-header bg-dark text-white">

<h3>
Record Contribution
</h3>

</div>



<div class="card-body">


<form method="POST">


<div class="mb-3">

<label class="form-label">
Contributor
</label>


<select name="contributor_id"
class="form-select">


<?php while($row=mysqli_fetch_assoc($contributor_result)){ ?>


<option value="<?php echo $row['id']; ?>">

<?php echo $row['fullname']; ?>

</option>


<?php } ?>


</select>


</div>




<div class="mb-3">

<label class="form-label">
Funeral
</label>


<select name="funeral_id"
class="form-select">


<?php while($row=mysqli_fetch_assoc($funeral_result)){ ?>


<option value="<?php echo $row['id']; ?>">

<?php echo $row['deceased_name']; ?>

</option>


<?php } ?>


</select>


</div>




<div class="mb-3">

<label class="form-label">
Amount
</label>


<input type="number"
name="amount"
class="form-control"
required>


</div>




<div class="mb-3">

<label class="form-label">
Payment Method
</label>


<select name="payment_method"
class="form-select">


<option>
Cash
</option>


<option>
Mobile Money
</option>


<option>
Bank
</option>


</select>


</div>




<div class="mb-3">

<label class="form-label">
Contribution Date
</label>


<input type="date"
name="contribution_date"
class="form-control"
required>


</div>




<button name="save"
class="btn btn-dark">

Save Contribution

</button>



<a href="view_contributions.php"
class="btn btn-secondary">

View Contributions

</a>


</form>


</div>


</div>


</div>


</body>

</html>