<?php

$id = $_POST['id'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$dep_id = $_POST['dep-id']; 

if (isset($_POST['update'])) {

    $conn = mysqli_connect('localhost', 'root', '', 'notebook');

    if (!$conn) {
        echo 'connection failed' . mysqli_connect_error();
    }

    $sql = "update phones set name ='$name' , phone = '$phone' , dep_id = '$dep_id' where id ='$id'";
    $result = mysqli_query($conn, $sql);


    if (!$result) {
        die('Query failed: ' . mysqli_error($conn));
    }


    header('location:index.php');

}
?>