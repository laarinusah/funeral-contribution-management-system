<?php

include "../../includes/connection.php";


if(isset($_GET['search'])){


$search = $_GET['search'];


$query = "SELECT * FROM contributors

WHERE fullname LIKE '%$search%'

OR phone LIKE '%$search%'

ORDER BY id DESC";


}

else{


$query = "SELECT * FROM contributors ORDER BY id DESC";


}

$result = mysqli_query($conn, $query);


?>


<!DOCTYPE html>
<html>

<head>

<title>View Contributors</title>

<meta name="viewport" content="width=device-width, initial-scale=1">


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


</head>


<body class="bg-light">


<div class="container mt-5">


<div class="card shadow">


<div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">


<h3>
Contributor Records
</h3>


<a href="add_contributor.php"
class="btn btn-light">

Add Contributor

</a>


</div>




<div class="card-body">



<div class="table-responsive">

<form method="GET" class="mb-3">

<div class="input-group">

<input 
type="text"
name="search"
class="form-control"
placeholder="Search contributor name or phone">


<button class="btn btn-dark">

Search

</button>


</div>

</form>

<table class="table table-bordered table-striped">


<tr class="table-dark">


<th>ID</th>

<th>Full Name</th>

<th>Phone</th>

<th>Gender</th>

<th>Address</th>

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

<?php echo $row['phone']; ?>

</td>


<td>

<?php echo $row['gender']; ?>

</td>


<td>

<?php echo $row['address']; ?>

</td>


<td>


<a href="edit_contributor.php?id=<?php echo $row['id']; ?>"
class="btn btn-warning btn-sm">

Edit

</a>



<a href="delete_contributor.php?id=<?php echo $row['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Delete this contributor?');">

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