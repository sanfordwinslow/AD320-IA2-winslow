<html>
<body>
<?php

/*$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

//GET request processing
if ($_SERVER['REQUEST_METHOD'] === "GET") {
  echo( "<p>GET REQUEST SENT</p>");
  $get_array =  $_GET;
  foreach($get_array as $key=>$val){
    echo $key . ': ' . $val . '<br>';
  }
echo $actual_link*/

//This line below is garbage. See w3 for implementation. 
function test_input( $x ){return $x; }

// define variables and set to empty values
$nameErr = $emailErr = $phoneErr = $stateErr = "";
$name = $email = $phone = $state = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  if (empty($_GET["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_GET["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_GET["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_GET["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_GET["phone"])) {
    $phone = "";
  } else {
    $phone = test_input($_GET["phone"]);
    // check if phone number syntax is valid
    if (!preg_match("[0-9]",$phone)) {
      $phoneErr = "Invalid phone number";
    }
  }

  if (empty($_GET["state"])) {
    $stateErr = "";
  } else {
    $state = test_input($_GET["state"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$state)) {
      $stateErr = "Only letters and white space allowed";
    }
  }
}
?>

<?php
echo "<h2>Your input:</h2>";
echo $name;
echo "<br>";
echo $email . "<br>";
echo $phone . "<br>";
echo $state;
?>
</body>
</html>
