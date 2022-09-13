<?php 
session_start();
$db = mysqli_connect('localhost', 'root', '', 'curd');

// initialize variables
$name = "";
$address = "";
$id = 0;
$salary = "";
$age = 0;
$update = false;
if (isset($_POST['save'])) {
	$name = $_POST['name']; 
    $address = $_POST['address'];
	$salary = $_POST['salary'];
	$age = (int)$_POST['age'];
    mysqli_query($db, "INSERT INTO info (name, address, salary, age) VALUES ('$name', '$address', $salary, $age )"); 
    $_SESSION['message'] = "Address saved"; 
    header('location: index.php');
}
if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$address = $_POST['address']; 
	$salary = $_POST['salary'];
	$age = $_POST['age'];
	mysqli_query($db, "UPDATE info SET name='$name', address='$address', salary='$salary', age='$age' WHERE id=$id");
	$_SESSION['message'] = "Address updated!"; 
	header('location: index.php');
}
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM info WHERE id=$id");
	$_SESSION['message'] = "Address deleted!"; 
	header('location: index.php');
}
?>
