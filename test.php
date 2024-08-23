<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warhouse Product</title>
</head>

<body>
    <?php
    // Check if 'id' is set in the URL
    $id=$_GET['id']
    ?>
    <p><?php echo $id?></p>
    <input type="text" value="<?php echo  $id?>">
</body>

</html>