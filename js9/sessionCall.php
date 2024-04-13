
<?php
    session_start();
?>

<html>
    <body>
        <?php
            echo "Favorite color: ".$_SESSION["favcolor"]."<br>";
            echo "Favorite animal: ".$_SESSION["favanimal"]."<br>";
        ?> 
    </body>
</html>
