<?php
$dir = 'uploads/';
$files = scandir($dir);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4; /* Light background for the body */
            color: #000; /* Default text color */
        }

        header {
            background: #000; /* Black background for header */
            font-weight: bold; /* Makes the text bold */
            color: #fff; /* White text for header */
            padding: 10px 0;
            text-align: center;
        }

        section {
            margin: 20px;
            padding: 20px;
            background: #fff; /* White background for sections */
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Light shadow for contrast */
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        a {
            color: #000; /* Black link color */
            text-decoration: none; /* Remove underline */
        }

        a:hover {
            text-decoration: underline; /* Underline on hover */
        }
    </style>
</head>
<body>
    <header>
        <h1 style="color: #fff;">Admin Panel</h1>
    </header>

    <section>
        <h2>Uploaded Files</h2>
        <ul>
            <?php
            foreach ($files as $file) {
                if ($file !== '.' && $file !== '..') {
                    echo "<li><a href='$dir$file' target='_blank'>$file</a></li>";
                }
            }
            ?>
        </ul>
    </section>
</body>
</html>