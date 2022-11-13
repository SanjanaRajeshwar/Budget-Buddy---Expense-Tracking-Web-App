<?php
include("session.php");
$budgetamount = "";
$budgetdate = date("Y-m-d");
$alertamount = "";
if (isset($_POST['addbudget'])) {
    $budgetamount = $_POST['budgetamount'];
    $budgetdate = $_POST['budgetdate'];
    $alertamount = $_POST['alertamount'];
    $budgets = "INSERT INTO budget(user_id, budgetamt, alertamt, budgetdate) VALUES ('$userid', '$budgetamount','$alertamount', '$budgetdate')";
    $result = mysqli_query($con, $budgets) or die("Something Went Wrong!");
    header('location: add_budget.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Expense Manager - Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Feather JS for Icons -->
    <script src="js/feather.min.js"></script>

</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">
            <div class="user">
                <img class="img img-fluid rounded-circle" src="<?php echo $userprofile ?>" width="120">
                <h5><?php echo $username ?></h5>
                <p><?php echo $useremail ?></p>
            </div>
            <div class="sidebar-heading">Management</div>
            <div class="list-group list-group-flush">
                <a href="index.php" class="list-group-item list-group-item-action"><span data-feather="home"></span> Dashboard</a>
		    <a href="add_budget.php" class="list-group-item list-group-item-action"><span data-feather="alert-triangle"></span> Add Budget</a>
                <a href="add_expense.php" class="list-group-item list-group-item-action sidebar-active"><span data-feather="plus-square"></span> Add Expenses</a>
                <a href="manage_expense.php" class="list-group-item list-group-item-action"><span data-feather="dollar-sign"></span> Manage Expenses</a>
            </div>
            <div class="sidebar-heading">Settings </div>
            <div class="list-group list-group-flush">
                <a href="profile.php" class="list-group-item list-group-item-action "><span data-feather="user"></span> Profile</a>
                <a href="logout.php" class="list-group-item list-group-item-action "><span data-feather="power"></span> Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light  border-bottom">


                <button class="toggler" type="button" id="menu-toggle" aria-expanded="false">
                    <span data-feather="menu"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img img-fluid rounded-circle" src="<?php echo $userprofile ?>" width="25">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="profile.phcol-mdp">Your Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container">
                <h3 class="mt-4 text-center">Add Your Budget To Get Alerts</h3>
                <hr>
                <div class="row">

                    <div class="col-md-3"></div>

                    <div class="col-md" style="margin:0 auto;">
                        <form action="" method="POST">
                            <div class="form-group row">
                                <label for="budgetamount" class="col-sm-6 col-form-label"><b>Enter Budget Amount(Rs)</b></label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control col-sm-12" value="<?php echo $budgetamount; ?>" id="budgetamount" name="budgetamount" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="expensedate" class="col-sm-6 col-form-label"><b>Date</b></label>
                                <div class="col-md-6">
                                    <input type="date" class="form-control col-sm-12" value="<?php echo $budgetdate; ?>" name="budgetdate" id="budgetdate" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alertamount" class="col-sm-6 col-form-label"><b>Enter Amount(Rs) after spending which you want to receive an alert</b></label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control col-sm-12" value="<?php echo $alertamount; ?>" id="alertamount" name="alertamount" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12 text-right">
						<button type="submit" name="addbudget" class="btn btn-lg btn-block btn-success" style="border-radius: 0%;" onClick="disp()">Add Budget</button>
                                </div>
                                
                            </div>
                            
                        </form>
                    </div>
                    
                    <div class="col-md-3"></div>
                    
                </div>
            </div>
            <h2 id="msg" style="text-align:center; width:100%"></h2>
                        <script>
                            function disp(){
                               document.getElementById('msg').innerHTML = "Successfully Added!";
                            }
                        </script>
        </div>
        
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
    <script>
        feather.replace();
    </script>
    <script>

    </script>
</body>
</html>