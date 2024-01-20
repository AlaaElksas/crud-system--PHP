<?php
$name = '';
$phone = '';
$dep_id = '';

// connect to database
$conn = mysqli_connect('localhost', 'root', '', 'notebook');

// check conection
if (!$conn) {
    echo 'the connection went wrong' . mysqli_connect_error();
}
// end connection check



$sql2 = "select * from department";
$result2 = mysqli_query($conn, $sql2);
$dep = mysqli_fetch_all($result2, MYSQLI_ASSOC);


if (isset($_POST['send'])) {

    // check name
    if (empty($_POST['name'])) {
        echo 'name is required';
    } else {
        $name = $_POST['name'];
    }

    // check phone number
    if (empty($_POST['number'])) {
        echo 'phone mumber is required';
    } else {
        $phone = $_POST['number'];
    }
    $dep_id = $_POST['dep-id'];

    $sql = "insert into phones ( name, phone, dep_id ) values ('" . $name . "' , '" . $phone . "' , '" . $dep_id . "')";



    $result = mysqli_query($conn, $sql);



    header('location:index.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add phone</title>
</head>

<body>
    <?php include('header.php'); ?>
    <div class="container">
        <h4 class="center grey-text">Add phone number</h4>
        <form action="addphone.php" method="post">
            <label for="">name</label>
            <input type="text" name="name">
            <label for="">phone number</label>
            <input type="text" name="number">


            <div class="input-field col s12">
                <select name="dep-id">
                    <option value="" disabled selected>Choose your option</option>
                    <?php foreach ($dep as $each) { ?>
                        <option value="<?php echo $each['dep_id'] ?>">
                            <?php echo $each['dep_name'] ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <input type="submit" class="submit" name="send" value="send">
        </form>
    </div>

    <?php include('footer.php'); ?>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        $(document).ready(function () {
            $('select').formSelect();
        });

    </script>
</body>

</html>