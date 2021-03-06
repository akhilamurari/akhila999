<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.garages {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
#bt{

  background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    font: 400 13.3333px Arial;
}
</style>
</head>
<body>
   <form class="modal-content animate" method="post" action="insert_garages.php">
    <div class="imgcontainer">
      <!-- <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span> -->
      <img src="img/garages.jpg" alt="garages" class="garages">
    </div>

    <div class="container">
      <label for="customer_id"><b>customer_id</b></label>
      <input type="text" placeholder="Enter customer id" name="customer_id" required>
      <label for="no_of_cars"><b>no_of_cars</b></label>
      <input type="text" placeholder="Enter no of cars" name="no_of_cars" required>
      <label for="car_rented_or_repaired"><b>car_rented_or_repaired</b></label>
      <input type="text" placeholder="Enter car rented or repaired" name="car_rented_or_repaired" required>
      <label for="payment_mode"><b>payment_mode</b></label>
      <input type="text" placeholder="Enter payment mode" name="payment_mode" required>
      <label for="payment_amount"><b>payment_amount</b></label>
      <input type="text" placeholder="Enter payment amount" name="payment_amount" required>
      <label for="garage_id"><b>garage_id</b></label>
      <input type="text" placeholder="Enter garage id" name="garage_id" required>
        <button type="submit">submit</button>
    </div>
  </form>
</div>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>
</html>


<?php
$customer_id = filter_input(INPUT_POST,'customer_id');
$car_no = filter_input(INPUT_POST,'car_no');
$car_rented_or_repaired=filter_input(INPUT_POST,'car_rented_or_repaired');
$payment_mode=filter_input(INPUT_POST,'payment_mode');
$payment_amount=filter_input(INPUT_POST,'payment_amount');
$garage_id=filter_input(INPUT_POST,'garage_id');
 if (!empty($customer_id)){
if (!empty($car_no)){
 if (!empty($car_rented_or_repaired)){
if (!empty($payment_mode)){
if (!empty($payment_amount)){
if (!empty($garage_id)){  
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "admin";

// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

  if(mysqli_connect_error()){
      die('Connect Error ('. mysqli_connect_errno() .')'. mysqli_connect_error());
    }
}
else{
  $sql = "INSERT INTO owner (customer_id,car_no,car_rented_or_repaired,payment_mode,payment_amount,garage_id)
  values ('$customer_id','$car_no','$car_rented_or_repaired','$payment_mode','payment_amount','$garage_id')";
  if($conn->query($sql)){
    echo "New record is inserted";
  }
  else {
    echo "Error" .$sql ."
    ". $conn->error;
  }
  $conn->close();
    }
  }
}}}
  else{
    echo "customer id shouldnt be empty";
    die();
  }
  }
  ?>
