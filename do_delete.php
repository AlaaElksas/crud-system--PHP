<?php

$id = $_POST['id'];

$conn = mysqli_connect('localhost', 'root', '', 'notebook');

// check connection
if (!$conn) {
    echo 'connecton failed' . mysqli_connect_error();
}
// end connection check

$sql = 'delete from phones where id = '.$id.'';

$result = mysqli_query($conn, $sql);

header('location:index.php');


?>