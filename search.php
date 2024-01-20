<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search</title>
</head>

<body>
    <?php include('header.php'); ?>
    
        <h4 class="center grey-text">search in your contacts</h4>
        <form action="dosearch.php" method="post">
        <p>
                <label for="name">
                    <input id="name" class="with-gap" name="name" value="by_name" type="radio"/>
                    <span>name</span>
                </label>
            </p>
            <p>
                <label for="phone" >
                    <input id="phone" class="with-gap" name="name" value="by_phone" type="radio" />
                    <span>phone</span>
                </label>
            </p>
            <input type="text" name="search-key">
            <input type="submit" class="submit btn brand" name="search_btn" value="search">
        </form>
        
    




    <?php include('footer.php'); ?>
</body>

</html>