<?php
    require 'config.php';

    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql="SELECT * FROM product WHERE id='$id'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result);

        $pname=$row['product_name'];
        $pprice=$row['product_price'];
        $del_charge=20000;
        $total_price=$pprice+$del_charge;
        $pimage=$row['product_image'];
    }
    else{
        echo 'No product found';
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete your order</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-md bg-warning navbar-light">
    <!-- Brand -->
    <a class="navbar-brand" href="#">AGAINST.TH</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="index.php">Products</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Settings</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Account</a>
        </li>
        </ul>
    </div>
    </nav>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5">
                <h2 class="text-center p-2 text-dark"> Fill the detail to complete your order</h2>
                <h3>Product Detail</h3>
                <table class="table-bordered" width="1000">
                    <tr>
                        <th>Product Name :</th>
                        <td><?= $pname; ?></td>
                        <td rowspan="4" class="text-center"><img src="<?= $pimage; ?>" width="200"></td>
                    </tr>
                    <tr>
                        <th>Product Price :</th>
                        <td>Rp.<?= number_format($pprice);?></td>
                    </tr>
                    <tr>
                        <th>Delivery Charge :</th>
                        <td>Rp.<?= number_format($del_charge);?></td>
                    </tr>
                    <tr>
                        <th>Total Price :</th>
                        <td>Rp.<?= number_format($total_price);?></td>
                    </tr>
                </table>
                <br>
                <br>
                <a href="pay.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-block btn-lg">Pay now
                </a>
            </div>
        </div>
    </div>
</body>
</html>