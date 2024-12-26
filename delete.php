<?php
    require_once "start.php";

    if ($_POST["delNoteName"] != "")
    {
        if (unlink($CONF["pathNotes"] . "/" . $_POST["delNoteName"] . ".txt"))
        {
            $isDeleteResult = "Заметка успешно удалена";
        }
        else
        {
            $isDeleteResult = "Заметка не была удалена";
        }
    }
    else
    {
        $isDeleteResult = "Не переданы данные";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php print($CONF["company"]); ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="img/favicon.png">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/delete.css">
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

        <div class="deleteNote">
            <p><?php print($isDeleteResult); ?></p>
            <p><a href="./">На главную</a></p>
        </div>

        <footer>
            <p><i><?php print($CONF["copyright"]); ?></i></p>
        </footer>
    </body>
</html>
