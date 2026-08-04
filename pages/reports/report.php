<?php

include "../../includes/connection.php";


// Total funerals

$funeral_query = mysqli_query($conn,

"SELECT COUNT(*) AS total FROM funerals"

);

$funerals = mysqli_fetch_assoc($funeral_query)['total'];



// Total contributors

$contributor_query = mysqli_query($conn,

"SELECT COUNT(*) AS total FROM contributors"

);

$contributors = mysqli_fetch_assoc($contributor_query)['total'];



// Total contributions

$contribution_query = mysqli_query($conn,

"SELECT COUNT(*) AS total FROM contributions"

);

$contributions = mysqli_fetch_assoc($contribution_query)['total'];



// Total amount

$amount_query = mysqli_query($conn,

"SELECT SUM(amount) AS total FROM contributions"

);

$amount = mysqli_fetch_assoc($amount_query)['total'];


// Report for each funeral

$report_query = mysqli_query($conn, "

SELECT

funerals.id,
funerals.deceased_name,
funerals.funeral_date,
funerals.location,

COUNT(DISTINCT contributions.contributor_id) AS total_contributors,

COALESCE(SUM(contributions.amount),0) AS total_amount

FROM funerals

LEFT JOIN contributions

ON funerals.id = contributions.funeral_id

GROUP BY

funerals.id,
funerals.deceased_name,
funerals.funeral_date,
funerals.location

ORDER BY funerals.funeral_date DESC

");


?>



<!DOCTYPE html>
<html>

<head>

<title>Funeral Contribution Reports</title>

<meta name="viewport" content="width=device-width, initial-scale=1">


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


</head>


<body class="bg-light">


<div class="container mt-5">


<h2 class="mb-4">

Funeral Contribution Reports

</h2>

<a href="contribution_summary.php" 
class="btn btn-dark mb-3">

View Contribution Summary

</a>

<div class="row g-4">



<div class="col-md-3">


<div class="card shadow">


<div class="card-body">


<h5>

Total Funerals

</h5>


<h2>

<?php echo $funerals; ?>

</h2>


</div>

</div>


</div>





<div class="col-md-3">


<div class="card shadow">


<div class="card-body">


<h5>

Contributors

</h5>


<h2>

<?php echo $contributors; ?>

</h2>


</div>

</div>


</div>





<div class="col-md-3">


<div class="card shadow">


<div class="card-body">


<h5>

Contribution Records

</h5>


<h2>

<?php echo $contributions; ?>

</h2>


</div>

</div>


</div>





<div class="col-md-3">


<div class="card shadow">


<div class="card-body">


<h5>

Total Amount

</h5>


<h2>

GH₵ <?php echo number_format($amount,2); ?>

</h2>


</div>

</div>


</div>



</div>

<div class="card shadow mt-5">

<div class="card-header bg-primary text-white">

<h4>Contribution Report Per Funeral</h4>

</div>

<div class="card-body">

<div class="table-responsive">

<table class="table table-bordered table-striped">

<thead class="table-dark">

<tr>

<th>#</th>

<th>Funeral</th>

<th>Date</th>

<th>Location</th>

<th>Total Contributors</th>

<th>Total Amount</th>

<th>Action</th>

</tr>

</thead>

<tbody>

<?php

$no = 1;

while($row = mysqli_fetch_assoc($report_query)){

?>

<tr>

<td><?php echo $no++; ?></td>

<td><?php echo $row['deceased_name']; ?></td>

<td><?php echo $row['funeral_date']; ?></td>

<td><?php echo $row['location']; ?></td>

<td><?php echo $row['total_contributors']; ?></td>

<td>

<strong>GH₵ <?php echo number_format($row['total_amount'],2); ?></strong>

</td>

<td>

<a href="../funerals/funeral_details.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">

Details

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</div>
</div>


</body>

</html>