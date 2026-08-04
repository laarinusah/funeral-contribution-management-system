<?php

include "../../includes/connection.php";


$id = $_GET['id'];


// Get funeral details

$funeral_query = "

SELECT * FROM funerals WHERE id=$id

";


$funeral_result = mysqli_query($conn,$funeral_query);


$funeral = mysqli_fetch_assoc($funeral_result);




// Get contributors and contributions

$contribution_query = "

SELECT

contributors.fullname,

contributors.phone,

contributions.amount,

contributions.payment_method,

contributions.contribution_date


FROM contributions


INNER JOIN contributors

ON contributions.contributor_id = contributors.id


WHERE contributions.funeral_id=$id


";


$contribution_result = mysqli_query($conn,$contribution_query);




// Calculate total amount

$total_query = "

SELECT SUM(amount) AS total

FROM contributions

WHERE funeral_id=$id

";


$total_result = mysqli_query($conn,$total_query);


$total = mysqli_fetch_assoc($total_result)['total'];



?>


<!DOCTYPE html>
<html>

<head>

<title>Funeral Details</title>

<meta name="viewport" content="width=device-width, initial-scale=1">


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


</head>


<body class="bg-light">


<div class="container mt-5">


<div class="card shadow">


<div class="card-header bg-dark text-white">


<h3>

<?php echo $funeral['deceased_name']; ?>

</h3>


</div>



<div class="card-body">


<p>

<strong>Funeral Date:</strong>

<?php echo $funeral['funeral_date']; ?>

</p>


<p>

<strong>Location:</strong>

<?php echo $funeral['location']; ?>

</p>




<div class="alert alert-success">


<h5>

Total Collected:

GH₵ <?php echo number_format($total,2); ?>

</h5>


</div>





<h4>

Contributors

</h4>



<div class="table-responsive">


<table class="table table-bordered table-striped">


<tr class="table-dark">


<th>Name</th>

<th>Phone</th>

<th>Amount</th>

<th>Method</th>

<th>Date</th>


</tr>



<?php while($row=mysqli_fetch_assoc($contribution_result)){ ?>


<tr>


<td>

<?php echo $row['fullname']; ?>

</td>


<td>

<?php echo $row['phone']; ?>

</td>


<td>

GH₵ <?php echo $row['amount']; ?>

</td>


<td>

<?php echo $row['payment_method']; ?>

</td>


<td>

<?php echo $row['contribution_date']; ?>

</td>


</tr>


<?php } ?>


</table>


</div>


</div>


</div>


</div>


</body>

</html>