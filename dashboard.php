<?php

session_start();
include "includes/connection.php";



$total_funerals = mysqli_query($conn,
"SELECT COUNT(*) AS total FROM funerals");


$funeral_count = mysqli_fetch_assoc($total_funerals)['total'];



$total_contributors = mysqli_query($conn,
"SELECT COUNT(*) AS total FROM contributors");


$contributor_count = mysqli_fetch_assoc($total_contributors)['total'];



$total_contributions = mysqli_query($conn,
"SELECT COUNT(*) AS total FROM contributions");


$contribution_count = mysqli_fetch_assoc($total_contributions)['total'];



$total_amount = mysqli_query($conn,
"SELECT SUM(amount) AS total FROM contributions");


$amount = mysqli_fetch_assoc($total_amount)['total'];


?>

if(!isset($_SESSION['username'])){

    header("Location: login.php");
    exit();

}

?>


?>


<!DOCTYPE html>
<html>

<head>

<title>Dashboard - FCMS</title>

<meta name="viewport" content="width=device-width, initial-scale=1">


<!-- Bootstrap 5 -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<!-- Icons -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


</head>


<body>


<!-- Navbar -->

<nav class="navbar navbar-dark bg-dark">

<div class="container-fluid">


<a class="navbar-brand" href="#">
<i class="bi bi-heart-pulse"></i>
Funeral Contribution Management System (FCMS)
</a>

Funeral Contribution Management System (FCMS)
</a>



<button class="navbar-toggler" 
type="button" 
data-bs-toggle="offcanvas" 
data-bs-target="#sidebar">


<span class="navbar-toggler-icon"></span>

</button>


</div>

</nav>



<!-- Sidebar -->

<div class="offcanvas offcanvas-start bg-dark text-white"
tabindex="-1"
id="sidebar">


<div class="offcanvas-header">


<h5>

Funeral System

</h5>


<button type="button"
class="btn-close btn-close-white"
data-bs-dismiss="offcanvas">

</button>


</div>



<div class="offcanvas-body">


<a href="dashboard.php" class="btn btn-dark w-100 text-start mb-2">

<i class="bi bi-speedometer2"></i>
Funeral Contribution Management System Dashboard
</a>


<a href="pages/funerals/view_funeral.php" class="btn btn-dark w-100 text-start mb-2">

<i class="bi bi-person"></i>
Funerals

</a>


<a href="pages/contributors/view_contributors.php" 
class="btn btn-dark w-100 text-start mb-2">

<i class="bi bi-people"></i>

Contributors

</a>


<a href="pages/reports/report.php" 
class="btn btn-dark w-100 text-start mb-2">

<i class="bi bi-bar-chart"></i>

Reports

</a>


<a href="pages/contributions/view_contributions.php" class="btn btn-dark w-100 text-start mb-2">

<i class="bi bi-cash"></i>
Contributions

</a>


<a href="logout.php" class="btn btn-danger w-100 text-start">

<i class="bi bi-box-arrow-right"></i>
Logout

</a>


</div>

</div>




<!-- Main Content -->


<div class="container mt-4">


<h2>

Welcome, <?php echo $_SESSION['username']; ?>

</h2>


<p class="text-muted">

Funeral Contribution Management Dashboard

</p>



<div class="row g-4">



<!-- Funeral Card -->

<div class="col-md-3 col-sm-6">


<div class="card shadow">


<div class="card-body">


<h5>

<i class="bi bi-flower1"></i>

Funerals

</h5>


<h2>

<?php echo $funeral_count; ?>

</h2>


</div>


</div>


</div>





<!-- Contributor Card -->

<div class="col-md-3 col-sm-6">


<div class="card shadow">


<div class="card-body">


<h5>

<i class="bi bi-people"></i>

Contributors

</h5>


<h2>

<?php echo $contributor_count; ?>

</h2>


</div>


</div>


</div>





<!-- Contribution Card -->


<div class="col-md-3 col-sm-6">


<div class="card shadow">


<div class="card-body">


<h5>

<i class="bi bi-receipt"></i>

Records

</h5>


<h2>

<?php echo $contribution_count; ?>

</h2>


</div>


</div>


</div>





<!-- Amount Card -->


<div class="col-md-3 col-sm-6">


<div class="card shadow">


<div class="card-body">


<h5>

<i class="bi bi-currency-exchange"></i>

Amount

</h5>


<h2>

GH₵ <?php echo number_format($amount,2); ?>

</h2>


</div>


</div>


</div>



</div>


</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<canvas id="myChart"></canvas>


<script>


const ctx = document.getElementById('myChart');


new Chart(ctx, {


type: 'bar',


data: {


labels: [

'Funerals',

'Contributors',

'Contributions'

],


datasets: [{

label: 'System Statistics',


data: [

<?php echo $funeral_count; ?>,

<?php echo $contributor_count; ?>,

<?php echo $contribution_count; ?>

]


}]


},


options: {


responsive:true

}


});


</script>

</body>

</html>