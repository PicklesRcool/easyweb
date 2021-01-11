<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@600&display=swap" rel="stylesheet">
    <title>Task choise</title>
</head>

<body>
    <div class='container'>
        <div class="page-heading">
            <span>Your completed tasks:</span>
        </div>

        <div class="form results">
            <table class="input output-input">
                <thead>
                    <tr>
                        <th>Task name</th>
                        <th>Points</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Task 1</td>
                        <td>Mark 1</td>
                    </tr>
                    <tr>
                        <td>Task 2</td>
                        <td>Mark 2</td>
                    </tr>
                    <tr>
                        <td>Task 3</td>
                        <td>Mark 3</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php
            echo "<br>Received request:<br>";
            foreach ($_REQUEST as $key => $value) {
                echo "Key: $key; Value: $value<br>";
            }
        ?>
    </div>


</body>

</html>
