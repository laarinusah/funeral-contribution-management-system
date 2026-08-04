<?php

include "../../includes/connection.php";


$id = $_GET['id'];


// Get contribution details

$query = "SELECT * FROM contributions WHERE id=$id";

$result = mysqli_query($conn,$query);

$row = mysqli_fetch_assoc($result);



if(isset($_POST['update'])){


    $amount = $_POST['amount'];

    $payment_method = $_POST['payment_method'];

    $date = $_POST['contribution_date'];



    $update = "UPDATE contributions SET

    amount='$amount',

    payment_method='$payment_method',

    contribution_date='$date'


    WHERE id=$id";



    $result = mysqli_query($conn,$update);



    if($result){

        echo "Contribution updated successfully";

    }

    else{

        echo "Update failed";

    }


}


?>


<!DOCTYPE html>
<html>

<head>

<title>Edit Contribution</title>

</head>


<body>


<h2>Edit Contribution</h2>


<form method="POST">


<label>
Amount
</label>

<br>

<input type="number" 
name="amount"
value="<?php echo $row['amount']; ?>">


<br><br>


<label>
Payment Method
</label>

<br>


<select name="payment_method">


<option>

<?php echo $row['payment_method']; ?>

</option>


<option>Cash</option>

<option>Mobile Money</option>

<option>Bank</option>


</select>


<br><br>



<label>
Date
</label>

<br>


<input type="date"
name="contribution_date"
value="<?php echo $row['contribution_date']; ?>">


<br><br>


<button name="update">

Update Contribution

</button>


</form>


</body>

</html>