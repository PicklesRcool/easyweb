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


            <div class="input send-code-button">
                <button type="submit" onclick="send('#')">Complete</button>
            </div>


            <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ace.js" type="text/javascript" charset="utf-8"></script>
            <script>
                var editor = ace.edit("editor");
                var distance = 0;
                var countDownDate;

                window.onload = function() {
                    editor.setTheme("ace/theme/twilight");
                    editor.session.setMode("ace/mode/html");
                }

                function send(url) {
                    console.log(editor.getValue());
                    let xhr = new XMLHttpRequest();
                    let formData = new FormData();

                    xhr.open("POST", url);

                    formData.append("code", editor.getValue());
                    formData.append("startTime", countDownDate - 5 * 60 * 1000);
                    formData.append("time", 5 * 60 * 1000 - distance);

                    xhr.send(formData);
                }
            </script>
            <script src="timer.js"></script>
        </div>



    </div>
</body>

</html>