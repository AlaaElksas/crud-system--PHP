<?php
$search_option ='';
$sql = '';
$search_key = '';

//check the name status
if(isset($_POST['search_btn'])){

    if(empty($_POST['name'])){
        echo 'name required to search';
    }
    else{
        $search_option = $_POST['name'];
    }
    if(empty($_POST['search-key'])){
        echo 'this field is required to search';
    }
    else{
        $search_key = $_POST['search-key'];
    }
}

$conn = mysqli_connect('localhost', 'root', '', 'notebook');

if(!$conn){
    echo 'connection is failed';
}

if($search_option == 'by_name'){
    $sql = "select name, phone from phones where name = '".$search_key."' ";
}
else if($search_option == 'by_phone'){
    $sql = "select name, phone from phones where phone = '".$search_key."' ";
}


$result = mysqli_query($conn, $sql);


$phones = mysqli_fetch_all($result, MYSQLI_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>your search</title>
</head>
<body>
<?php include('header.php'); ?>

<h4 class="center grey-text">your search result</h4>

<div class="container">
    <div class="row">
        <?php foreach ($phones as $phone) { ?>
            
            <table>
                <tr>
                    <td><?php echo htmlspecialchars($phone['name']); ?></td>
                    <td><?php echo htmlspecialchars($phone['phone']); ?></td>
                </tr>
            </table>
        <?php } ?>
    </div>
</div>







<?php include('footer.php'); ?>
</body>
</html>