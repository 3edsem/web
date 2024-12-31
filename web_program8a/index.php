<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Counter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 100px;
            background-color: #f4f4f4;
        }
        .counter {
            font-size: 2em;
            margin: 20px 0;
        }
    </style>
</head>
<body>

    <h1>Welcome to Our Website!</h1>
    <p class="counter">
        <?php
            $filename = "counter.txt";
            if (!file_exists($filename)) {
                $count = 0;
            } else {
                $count = (int) file_get_contents($filename);
            }

            $count++;
            file_put_contents($filename, $count);
            echo "You are visitor number: " . $count;
        ?>
    </p>

</body>
</html>
