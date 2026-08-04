<?php

include "../../includes/connection.php";


$id = $_GET['id'];



$query = "DELETE FROM funerals WHERE id=$id";


$result = mysqli_query($conn,$query);



if($result){

    header("Location:view_funeral.php");

}

else{

    echo "Delete failed";

}


?>