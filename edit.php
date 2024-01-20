<?php
$id = $_GET['id'];

$conn = mysqli_connect('localhost', 'root', '', 'notebook');

// check connection
if (!$conn) {
    echo 'connecton failed' . mysqli_connect_error();
}
// end connection check

$sql = 'select name, phone, dep_id from phones where id = '.$id.'';

$result = mysqli_query($conn, $sql);

// fetch data
$people = mysqli_fetch_all($result, MYSQLI_ASSOC);


// fetch department table
$sql2 = "select * from department";
$result2 = mysqli_query($conn, $sql2);
$dep = mysqli_fetch_all($result2, MYSQLI_ASSOC);

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
        <h4 class="center grey-text">Edit contact information</h4>
        <form action="update.php" method="post">
            <label for="">name</label>
            <input type="text" name="name" value="<?php echo $people[0]['name']; ?>">
            <label for="">phone number</label>
            <input type="text" name="phone" value="<?php echo $people[0]['phone']; ?>">
            <!-- select id and save it in the value to be able to catch it in yhe update file -->
            <input type="hidden" name="id"  value="<?php echo $id; ?>">      

            <div class="input-field col s12">
                <select name="dep-id">
                    <?php foreach ($dep as $each) { ?>
                        <option value="<?php echo $each['dep_id'] ?>" <?php if($people[0]['name'] ==  $each['dep_id']){echo 'selected';} ?>>
                        <?php echo $each['dep_name'] ?>
                    </option>
                    <?php } ?>
                </select>
            </div>

            <input type="submit" class="submit btn" name="update" >
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