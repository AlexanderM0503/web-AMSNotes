<?php
    require_once "start.php";

    if ($_POST["noteName"] != "" && $_POST["oldNoteName"] != "" && $_POST["noteText"] != "")
    {
        rename($CONF["pathNotes"] . "/" . $_POST["oldNoteName"] . ".txt", $CONF["pathNotes"] . "/" . $_POST["noteName"] . ".txt");

        $editNote = fopen($CONF["pathNotes"] . "/" . $_POST["noteName"] . ".txt", "w");
        fwrite($editNote, $_POST["noteText"]);
        fclose($editNote);

        $isEdit = true;
        $isEditResult = "Успешно изменено";
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
        <link rel="stylesheet" href="css/editor.css">
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

        <p class="links">
            <a href="./">На главную</a>
            <?php print("<a href='./viewer.php?name=" . $_POST["noteName"] . "'>Открыть просмотр</a>"); ?>
        </p>

        <div class="editor">
            <form action="editor.php" method="post">
                <?php
                    print("<input type='text' name='oldNoteName' value='" . $_POST["noteName"] . "' hidden>");
                    print("<p>Имя заметки:</p>");
                    print("<input type='text' name='noteName' value='" . $_POST["noteName"] . "'>");
                ?>
                <p>Текст заметки:</p>
                <textarea name="noteText" rows="15"><?php print(file_get_contents($CONF["pathNotes"] . "/" . $_POST["noteName"] . ".txt")); ?></textarea>

                <input type="submit" value="Сохранить">
                
                <?php
                    if ($isEdit == true)
                    {
                        print("<p>" . $isEditResult . "</p>");
                    }
                ?>
            </form>
        </div>

        <footer>
            <p><i><?php print($CONF["copyright"]); ?></i></p>
        </footer>
    </body>
</html>
