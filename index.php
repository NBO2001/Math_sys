<?php
require_once "CreateOp.php";
require_once "MontHtml.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math</title>
    <link rel="stylesheet" href="style.css">
    <script src="vrQuests.js"></script>
</head>
<body>
    <main class="quests">
    <input id='contagem' type='text' value='0' readonly>
        <?php 
        $quest = new CreatOp;
        $resta = $quest->creatEverEqual(10);
        $htm = new MontHtml;
        echo $htm->mountHtml($resta); 
        ?>
    </main>
</body>
</html>