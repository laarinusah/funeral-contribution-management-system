<?php

include "../../includes/connection.php";


if(isset($_GET['search'])){


$search = $_GET['search'];



$query = "

SELECT 

contributions.id,

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


WHERE contributors.fullname LIKE '%$search%'

OR funerals.deceased_name LIKE '%$search%'


ORDER BY contributions.id DESC

";


}

else{


$query = "

SELECT 

contributions.id,

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


}

$result = mysqli_query($conn,$query);


?>


<!DOCTYPE html>
<html>

<head>

<title>View Contributions</title>

<meta name="viewport" content="width=device-width, initial-scale=1">


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


</head>


<body class="bg-light">


<div class="container mt-5">


<div class="card shadow">


<div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">


<h3>
Contribution Records
</h3>


<a href="add_contribution.php"
class="btn btn-light">

Add Contribution

</a>


</div>




<div class="card-body">



<?php

$total_query = "SELECT SUM(amount) AS total FROM contributions";

$total_result = mysqli_query($conn,$total_query);

$total = mysqli_fetch_assoc($total_result)['total'];

?>



<div class="alert alert-success">

<h5>

Total Amount Collected:

GH₵ <?php echo number_format($total,2); ?>

</h5>

</div>





<div class="table-responsive">

<form method="GET" class="mb-3">


<div class="input-group">


<input 
type="text"
name="search"
class="form-control"
placeholder="Search contributor or funeral">


<button class="btn btn-dark">

Search

</button>


</div>


</form>


<table class="table table-bordered table-striped">


<tr class="table-dark">


<th>ID</th>

<th>Contributor</th>

<th>Funeral</th>

<th>Amount</th>

<th>Payment Method</th>

<th>Date</th>

<th>Action</th>


</tr>




<?php while($row=mysqli_fetch_assoc($result)){ ?>


<tr>


<td>

<?php echo $row['id']; ?>

</td>



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



<td>


<a href="edit_contribution.php?id=<?php echo $row['id']; ?>"
class="btn btn-warning btn-sm">

Edit

</a>



<a href="delete_contribution.php?id=<?php echo $row['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Delete this contribution?');">

Delete

</a>


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