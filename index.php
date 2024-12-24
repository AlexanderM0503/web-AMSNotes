<?php
    require_once "start.php";

    $notesArray = scandir($CONF["pathNotes"]);
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php print($CONF["company"]); ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="img/favicon.png">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/index.css">
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

        <div class="panel">
            <input type="button" class="addNote" value="Добавить заметку" onclick="ShowCreateDialog()">
        </div>

        <dialog class="dialog" id="createDialog">
            <form action="createNote.php" method="post">
                <p>Имя заметки:</p>
                <input type="text" name="crtNoteName">
                <input type="submit" value="Создать">
            </form>

            <input type="button" value="Отмена" onclick="CloseCreateDialog()">
        </dialog>

        <dialog class="dialog" id="deleteDialog">
            <form action="deleteNote.php" method="post">
                <p>Вы действительно хотите удалить заметку?</p>
                <input type="text" id="delNoteName" name="delNoteName" readonly>
                <input type="submit" value="Удалить">
            </form>

            <input type="button" value="Отмена" onclick="CloseDeleteDialog()">
        </dialog>

        <div class="notes">
            <?php
                for ($i = 2; $i < count($notesArray); $i++)
                {
                    $noteName = basename($notesArray[$i], ".txt");
                    print("<div class='note'>");
                    print("<div class='noteHead'>");
                    print("<a class='noteName' href='viewer.php?name=" . $noteName . "'><b>" . $noteName . "</b></a>");
                    print("<input type='image' src='img/delete.png' width='25px' height='25px' onclick='ShowDeleteDialog(\"" . $noteName . "\")'>");
                    print("</div>");
                    print("<div class='noteText'>");

                    $openNote = fopen($CONF["pathNotes"] . "/" . $notesArray[$i], "r");
                    print("<p>" . fgets($openNote) . "</p>");

                    if (!feof($openNote))
                    {
                        print("<p>...</p>");
                    }
                    else
                    {
                        print("<br>");
                    }

                    fclose($openNote);

                    print("</div>");
                    print("</div>");
                }
            ?>
        </div>

        <footer>
            <p><i><?php print($CONF["copyright"]); ?></i></p>
        </footer>

        <script src="js/main.js"></script>
    </body>
</html>
