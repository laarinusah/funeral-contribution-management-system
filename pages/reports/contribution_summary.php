<?php

include "../../includes/connection.php";


$query = "

SELECT 

contributors.fullname,

funerals.deceased_name,

contributions.amount,

contributions.payment_method,

contributions.contribution_date


FROM contributions


INNER JOIN contributors

ON contributions.contributor_id = contributors.id


INNER JOIN funerals

ON contributions.funeral_id = funerals.id


ORDER BY contributions.id DESC


";


$result = mysqli_query($conn,$query);



$total_query = "SELECT SUM(amount) AS total FROM contributions";


$total_result = mysqli_query($conn,$total_query);


$total = mysqli_fetch_assoc($total_result)['total'];



?>


<!DOCTYPE html>
<html>

<head>

<title>Contribution Summary</title>

<meta name="viewport" content="width=device-width, initial-scale=1">


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


</head>


<body class="bg-light">


<div class="container mt-5">


<div class="card shadow">


<div class="card-header bg-dark text-white">


<h3>
Contribution Summary
</h3>


</div>


<div class="card-body">



<div class="alert alert-success">

<h5>

Total Amount Collected:

GH₵ <?php echo number_format($total,2); ?>

</h5>

</div>




<div class="table-responsive">


<table class="table table-bordered table-striped">


<tr class="table-dark">


<th>Contributor</th>

<th>Funeral</th>

<th>Amount</th>

<th>Payment Method</th>

<th>Date</th>


</tr>



<?php while($row=mysqli_fetch_assoc($result)){ ?>


<tr>


<td>

<?php echo $row['fullname']; ?>

</td>


<td>

<?php echo $row['deceased_name']; ?>

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