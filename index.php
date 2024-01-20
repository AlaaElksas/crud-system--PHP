<?php
// connect to database
$conn = mysqli_connect('localhost', 'root', '', 'notebook');

// check connection
if (!$conn) {
    echo 'connecton failed' . mysqli_connect_error();
}
// end connection check

$sql = 'select * from phones left JOIN department ON phones.dep_id = department.dep_id';

$result = mysqli_query($conn, $sql);

// fetch data
$people = mysqli_fetch_all($result, MYSQLI_ASSOC);



?>








<!DOCTYPE html>
<html lang="en">

<?php include('header.php'); ?>

<h4 class="center grey-text">people</h4>

<div class="container">
    <div class="row">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>phone</th>
                    <th>department id</th>
                    <th>department name</th>

                </tr>
            </thead>
            <?php foreach ($people as $phone) { ?>
                <tbody>
                    <tr>
                        <td>
                            <?php echo htmlspecialchars($phone['name']); ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($phone['phone']); ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($phone['dep_id']); ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($phone['dep_name']); ?>
                        </td>
                        <td>
                            <a href="edit.php?id=<?php echo $phone['id'] ?>"class="btn z-depth-0">edit</a>
                        </td>
                        <td>
                            <a href="delete.php?id=<?php echo $phone['id'] ?>" class="btn z-depth-0">delete</a>
                        </td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>
</div>




<?php include('footer.php'); ?>

</html>