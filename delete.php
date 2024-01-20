<?php

$id = $_GET['id'];

$conn = mysqli_connect('localhost', 'root', '', 'notebook');

// check connection
if (!$conn) {
    echo 'connecton failed' . mysqli_connect_error();
}
// end connection check

$sql = 'select name, phone from phones where id = '.$id.'';

$result = mysqli_query($conn, $sql);

// fetch data
$people = mysqli_fetch_all($result, MYSQLI_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
</head>

<body>

    <?php include('header.php'); ?>
    <div class="container">
        <h4 class="center grey-text">Delete contact information</h4>
        <form action="do_delete.php" method="post">
            <label for="">name</label>
            <input type="text" name="name" value="<?php echo $people[0]['name']; ?>">
            <label for="">phone number</label>
            <input type="text" name="phone" value="<?php echo $people[0]['phone']; ?>">
            <input type="hidden" name="id"  value="<?php echo $id; ?>">
            <input type="submit" class="submit btn" name="update" value="delete">
        </form>
    </div>
    <?php include('footer.php'); ?>

</body>

</html>