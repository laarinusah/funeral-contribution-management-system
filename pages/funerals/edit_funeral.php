<?php

include "../../includes/connection.php";


$id = $_GET['id'];


// Get existing funeral data

$query = "SELECT * FROM funerals WHERE id=$id";

$result = mysqli_query($conn,$query);

$row = mysqli_fetch_assoc($result);



if(isset($_POST['update'])){


    $name = $_POST['deceased_name'];

    $date = $_POST['funeral_date'];

    $location = $_POST['location'];



    $update = "UPDATE funerals SET

    deceased_name='$name',

    funeral_date='$date',

    location='$location'

    WHERE id=$id";



    $result = mysqli_query($conn,$update);



    if($result){

        echo "Funeral updated successfully";

    }

    else{

        echo "Update failed";

    }


}


?>



<!DOCTYPE html>

<html>

<head>

<title>Edit Funeral</title>

</head>


<body>


<h2>Edit Funeral</h2>



<form method="POST">


<label>
Deceased Name
</label>

<br>

<input type="text" 
name="deceased_name"
value="<?php echo $row['deceased_name']; ?>">


<br><br>



<label>
Funeral Date
</label>

<br>

<input type="date"
name="funeral_date"
value="<?php echo $row['funeral_date']; ?>">


<br><br>



<label>
Location
</label>

<br>

<input type="text"
name="location"
value="<?php echo $row['location']; ?>">



<br><br>


<button name="update">

Update Funeral

</button>


</form>


</body>

</html>