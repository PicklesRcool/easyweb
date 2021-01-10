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
            <span>Choose the task:</span>
        </div>

        <form method="POST" action="../solve-task/task-execution.php">
            <div class="form task-choise">
                <div class="input difficulty">
                    <label for="select-difficulty">Select difficulty</label>
                    <select id="select-difficulty" name="difficulty">
                    <?php
                        include '../db_utils/db_utils.php';
                        
                        $conn = Database::getConnection();
                        $difficulties = DbGetAllDifficulties($conn);
                        
                        foreach ($difficulties as $diff) {
                            printf('<option value="%d">%s</option>', $diff->id, $diff->name);
                        }
                    ?>
                </select>
                </div>

                <div class="input topic">
                    <label for="select-topic">Select topic</label>
                    <select id="select-topic" name="topic">
                    <?php
                        include '../db_utils/db_utils.php';
                        
                        $conn = Database::getConnection();
                        $sections = DbGetAllSections($conn);
                        
                        foreach ($sections as $sect) {
                            printf('<option value="%d">%s</option>', $sect->id, $sect->name);
                        }
                    ?>
                </select>
                </div>

                <div class="input start-task-button">
                    <button type="submit">Start</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>