<?php

include "../../includes/connection.php";


$id = $_GET['id'];



$query = "DELETE FROM contributions WHERE id=$id";



$result = mysqli_query($conn,$query);



if($result){

    header("Location:view_contributions.php");

}

else{

    echo "Delete failed";

}


?>