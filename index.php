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

        <div class="notes">
            <?php
                for ($i = 2; $i < count($notesArray); $i++)
                {
                    print("<div class='note'>");
                    print("<div class='noteHead'>");
                    print("<p class='noteName'><b>" . basename($notesArray[$i], ".txt") . "</b></p>");
                    print("<a class='noteAction' href='#'>Удалить</a>");
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
    </body>
</html>
