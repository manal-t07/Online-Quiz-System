
<!-- inserting Sign up form details in the "user" table  -->

<?php
include_once 'dbConnection.php';
ob_start();
$name = $_POST['name'];
$name= ucwords(strtolower($name));
$gender = $_POST['gender'];
$email = $_POST['email'];
$college = $_POST['college'];
$mob = $_POST['mob'];
$password = $_POST['password'];
$name = stripslashes($name);
$name = addslashes($name);
$name = ucwords(strtolower($name));
$gender = stripslashes($gender);
$gender = addslashes($gender);
$email = stripslashes($email);
$email = addslashes($email);
$college = stripslashes($college);
$college = addslashes($college);
$mob = stripslashes($mob);
$mob = addslashes($mob);

$password = stripslashes($password);
$password = addslashes($password);
$password = md5($password);

$q3=mysqli_query($con,"INSERT INTO user VALUES  ('$name' , '$gender' , '$college','$email' ,'$mob', '$password')");
 if($q3)
  // if the query runs successfully take it to page account.php where there are quizes to take
{
session_start();
$_SESSION["email"] = $email;
$_SESSION["name"] = $name;

header("location:account.php?q=1");
}
else
{
//validates form in index.php
header("location:index.php?q7=Email Already Registered!!!");
}
// no new account with the same email
ob_end_flush();
?>
