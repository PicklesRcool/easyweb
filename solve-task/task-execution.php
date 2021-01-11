<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@600&display=swap" rel="stylesheet">
    <title>Complete the task</title>
</head>

<body>
    <div class='container'>
        <div class="page-heading execution">
            <span>Complete your task in</span>
            <p id="demo"></p>

            <div class="task-info">
                <?php
                    include_once '../db_utils/db_utils.php';

                    $sect_id = $_REQUEST['topic'];
                    $diff_id = $_REQUEST['difficulty'];

                    $conn = Database::getConnection();
                    $task = DbSelectTask($conn, $sect_id, $diff_id);

                    printf('<div class="task-name">%s</div>', $task->name);
                    printf('<div class="task-desc">%s</div>', $task->descr);
                ?>
            </div>
        </div>


        <div class="form task-editor" style="width: 40em; height: 40em;">
            <div id="editor"></div>


            <form id="solution_form" method="POST" action="../results/results.php">
                <input type="hidden" id="solution_input" name="solution" value="">
                <input type="hidden" id="starttime_input" name="start_time" value="">
                <input type="hidden" id="duration_input" name="duration" value="">
                <input type="hidden" id="task_input" name="task_id" value="<?php echo $task->id; ?>">
                <input type="hidden" id="diff_input" name="diff_id" value="<?php echo $diff_id; ?>">
                <input type="hidden" id="sect_input" name="sect_id" value="<?php echo $sect_id; ?>">

                <div class="input send-code-button">
                    <button type="submit" onclick="setEditorDataToForm()">Complete</button>
                </div>
            </form>


            <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ace.js" type="text/javascript" charset="utf-8"></script>
            <script>
                let editor = ace.edit("editor");
                let startTime = new Date();
                const start = startTime.getTime();

                window.onload = function() {
                    editor.setTheme("ace/theme/twilight");
                    editor.session.setMode("ace/mode/html");
                }

                function setEditorDataToForm() {
                    let solutionInput   = document.getElementById('solution_input');
                    let startTimeInput  = document.getElementById('starttime_input');
                    let durationInput   = document.getElementById('duration_input');

                    let startTimeStr = startTime.getFullYear()  + "-"
                                    + (startTime.getMonth()+1)  + "-" 
                                    +  startTime.getDate()      + " "  
                                    +  startTime.getHours()     + ":"  
                                    +  startTime.getMinutes()   + ":" 
                                    +  startTime.getSeconds();

                    const end = new Date().getTime();
                    const durationMs = end - start;

                    solutionInput.setAttribute ("value", editor.getValue());
                    startTimeInput.setAttribute("value", startTimeStr);
                    durationInput.setAttribute ("value", durationMs);
                }
            </script>
            <script src="timer.js"></script>
        </div>



    </div>
</body>

</html>