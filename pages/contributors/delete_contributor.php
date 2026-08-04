<?php

include "../../includes/connection.php";


$id = $_GET['id'];



$query = "DELETE FROM contributors WHERE id=$id";



$result = mysqli_query($conn,$query);



if($result){

    header("Location:view_contributors.php");

}

else{

    echo "Delete failed";

}


?>