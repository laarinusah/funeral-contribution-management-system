<?php

include "../../includes/connection.php";


$query = "SELECT * FROM funerals ORDER BY id DESC";

$result = mysqli_query($conn, $query);


?>


<!DOCTYPE html>
<html>

<head>

<title>View Funerals</title>

<meta name="viewport" content="width=device-width, initial-scale=1">


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


</head>


<body class="bg-light">


<div class="container mt-5">


<div class="card shadow">


<div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">


<h3>
Funeral Records
</h3>


<a href="add_funeral.php" 
class="btn btn-light">

Add Funeral

</a>


</div>



<div class="card-body">



<div class="table-responsive">


<table class="table table-bordered table-striped">


<tr class="table-dark">


<th>ID</th>

<th>Deceased Name</th>

<th>Funeral Date</th>

<th>Location</th>

<th>Action</th>


</tr>



<?php while($row=mysqli_fetch_assoc($result)){ ?>


<tr>


<td>
<?php echo $row['id']; ?>
</td>


<td>
<?php echo $row['deceased_name']; ?>
</td>


<td>
<?php echo $row['funeral_date']; ?>
</td>


<td>
<?php echo $row['location']; ?>
</td>


<td>


<a href="funeral_details.php?id=<?php echo $row['id']; ?>"
class="btn btn-info btn-sm">

Details

</a>



<a href="edit_funeral.php?id=<?php echo $row['id']; ?>"
class="btn btn-warning btn-sm">

Edit

</a>



<a href="delete_funeral.php?id=<?php echo $row['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Delete this funeral?');">

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

<body>


<h2>
Funeral Records
</h2>


<a href="add_funeral.php">
Add New Funeral
</a>


<br><br>


<table>


<tr>

<th>ID</th>

<th>Deceased Name</th>

<th>Funeral Date</th>

<th>Location</th>

<th>Action</th>

</tr>



<?php while($row = mysqli_fetch_assoc($result)){ ?>


<tr>


<td>
<?php echo $row['id']; ?>
</td>


<td>
<?php echo $row['deceased_name']; ?>
</td>


<td>
<?php echo $row['funeral_date']; ?>
</td>


<td>
<?php echo $row['location']; ?>
</td>


<td>

<a href="edit_funeral.php?id=<?php echo $row['id']; ?>">
Edit
</a>


|

<a href="delete_funeral.php?id=<?php echo $row['id']; ?>">
Delete
</a>


</td>


</tr>


<?php } ?>



</table>


</body>

</html>