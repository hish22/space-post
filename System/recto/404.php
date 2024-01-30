<?= $img_uri = $_SERVER["REQUEST_URI"] = "/System/external/icons/logo.svg" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404</title>
    <style>
        body{
            background-color: rgb(229, 229, 229);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 90vh;
        }
        h1{
            color: red;
            font-family: 'Courier New', Courier, monospace, Arial, Helvetica, sans-serif;
        }
        .container{
            display: flex;
        }
        .contents{
            margin: auto;
            text-align: center;
        }
        
        
    </style>
</head>
<body>

    <img src=<?= $img_uri ?> alt="logo">
    <!-- <hr /> -->
    <h1> | Page Not Found! 404</h1>

</body>
</html>