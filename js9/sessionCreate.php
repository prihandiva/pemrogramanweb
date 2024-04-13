
<?php
    session_start();
?>

<html>
    <body>
        <?php
            $_SESSION["favcolor"] = "green";
            $_SESSION["favanimal"] = "set";
            echo "Session variables are set.";
        ?> 
    </body>
</html>
