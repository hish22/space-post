<?php

use System\recto\show\Display;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if($_GET["msg"]) {echo $_GET["msg"];} ?>
    <h1>Hello world! from html as <?= $_SERVER['REQUEST_URI']?></h1>
    <form method="post">
        <input type="text" name="data">
        <button>Submit</button>
    </form>
    <h1>Data is there!</h1>
</body>
</html>