<?php
    require_once "start.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php print($CONF["company"]); ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="img/favicon.png">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/viewer.css">
    </head>

    <body>
        <header>
            <div class="header_logo">
                <a href="./"><img src="img/favicon.png" width="75px" height="75px"></a>
            </div>

            <div class="header_link">
                <a href="./"><b><i><?php print($CONF["company"]); ?></i></b></a>
            </div>
        </header>

        <p class="toMainPage"><a href="./">На главную</a></p>

        <div class="noteHead">
            <form action="editor.php" method="post">
                <?php print("<input type='text' name='noteName' value='" . $_GET["name"] . "' hidden>"); ?>
                <input type="submit" value="Редактировать">
            </form>

            <p>Имя заметки: <b><?php print($_GET["name"]); ?></b></p>
            <p>Текст заметки:</p>
        </div>

        <textarea class="noteText" rows="15" readonly><?php print(file_get_contents($CONF["pathNotes"] . "/" . $_GET["name"] . ".txt")); ?></textarea>

        <footer>
            <p><i><?php print($CONF["copyright"]); ?></i></p>
        </footer>
    </body>
</html>
