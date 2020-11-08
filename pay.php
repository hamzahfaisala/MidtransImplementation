<?php


  require 'config.php';
  require_once dirname(__FILE__) . '/midtrans-php-master/Midtrans.php';

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

  // Set your Merchant Server Key
  \Midtrans\Config::$serverKey = 'SB-Mid-server-nMYaTiJ9exb4_q2eQ9YhLlPA';
  // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
  \Midtrans\Config::$isProduction = false;
  // Set sanitization on (default)
  \Midtrans\Config::$isSanitized = true;
  // Set 3DS transaction for credit card to true
  \Midtrans\Config::$is3ds = true;

  

  $params = array(
    'transaction_details' => array(
        'order_id' => rand(),
        'gross_amount' => $total_price,
    )
);

try {
  // Get Snap Payment Page URL
  $paymentUrl = \Midtrans\Snap::createTransaction($params)->redirect_url;
  
  // Redirect to Snap Payment Page
  header('Location: ' . $paymentUrl);
}
catch (Exception $e) {
  echo $e->getMessage();
}
?>