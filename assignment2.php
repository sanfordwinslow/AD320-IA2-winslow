<html>
<body>
<p>Thank You!<p>
<?php

// define variables and set to empty values
$nameErr = $emailErr = $phoneErr = $stateErr = "";
$name = $email = $phone = $state = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {

  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }

  if (empty($_GET["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_GET["name"]);
    echo "Name: " . $name . "<br>";
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
    echo "Email Address: " . $email . "<br>";
    }
  }

  if (empty($_GET["phone"])) {
    $phone = "";
  } else {
    $phone = test_input($_GET["phone"]);
    echo "Phone Number: " . $phone . "<br>";
    // check if phone number syntax is valid
    if (!preg_match("/^[0-9]*$/",$phone)) {
      $phoneErr = "Invalid phone number";

    }
  }

  if (empty($_GET["state"])) {
    $stateErr = "";
  } else {
    $state = test_input($_GET["state"]);
    echo "State of Residence: ". $state;
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$state)) {
      $stateErr = "Only letters and white space allowed";
    }
  }

}


//echo "<h2>Your input:</h2>";
//echo "Name: " . $name . "<br>";
//echo "Email Address: " . $email . "<br>";
//echo "Phone Number: " . $phone . "<br>";
//echo "State of Residence: " . $state;
?>
</body>
</html>
