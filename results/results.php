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
                        <?php
                            include '../db_utils/db_utils.php';

                            $solution   = $_REQUEST['solution'];
                            $start_time = $_REQUEST['start_time'];
                            $duration   = $_REQUEST['duration'];    

                            $stud_id = 1;
                            $task_id = $_REQUEST['task_id'];
                            $diff_id = $_REQUEST['diff_id'];
                            $sect_id = $_REQUEST['sect_id'];

                            $conn = Database::getConnection();

                            $student    = DbGetStudentById   ($conn, $stud_id);
                            $task       = DbGetTaskById      ($conn, $task_id);
                            $difficulty = DbGetDifficultyById($conn, $diff_id);
                            $section    = DbGetSectionById   ($conn, $sect_id);

                            $max_mark = $difficulty->id * 10;

                            $mark = EvaluateTask($solution, $task->answer, $duration, $max_mark);

                            printf("<td>%s</td>", $task->name);
                            printf("<td>%s</td>", $mark);
                        ?>
                    </tr>
                    <!--
                    <tr>
                        <td>Task 2</td>
                        <td>Mark 2</td>
                    </tr>
                    <tr>
                        <td>Task 3</td>
                        <td>Mark 3</td>
                    </tr>
                    -->
                </tbody>
            </table>
        </div>
    </div>


</body>

</html>
