<?php

include "../../includes/connection.php";


$id = $_GET['id'];


// Get contributor information

$query = "SELECT * FROM contributors WHERE id=$id";

$result = mysqli_query($conn,$query);

$row = mysqli_fetch_assoc($result);



if(isset($_POST['update'])){


    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];



    $update = "UPDATE contributors SET

    fullname='$fullname',

    phone='$phone',

    gender='$gender',

    address='$address'


    WHERE id=$id";



    $result = mysqli_query($conn,$update);



    if($result){

        echo "Contributor updated successfully";

    }

    else{

        echo "Update failed";

    }


}


?>


<!DOCTYPE html>
<html>

<head>

<title>Edit Contributor</title>

</head>


<body>


<h2>Edit Contributor</h2>



<form method="POST">


<label>
Full Name
</label>

<br>

<input type="text" 
name="fullname"
value="<?php echo $row['fullname']; ?>">


<br><br>


<label>
Phone
</label>

<br>

<input type="text"
name="phone"
value="<?php echo $row['phone']; ?>">


<br><br>


<label>
Gender
</label>

<br>

<select name="gender">


<option>

<?php echo $row['gender']; ?>

</option>


<option>Male</option>

<option>Female</option>


</select>


<br><br>


<label>
Address
</label>

<br>

<textarea name="address"><?php echo $row['address']; ?></textarea>


<br><br>


<button name="update">

Update Contributor

</button>


</form>


</body>

</html>