<?php
require_once "CreateOp.php";
require_once "MontHtml.php";

if($_POST['todosAleatory']){
$ctn = preg_replace('/[^0-9]/','',$_POST['quant']);
$ctnA = preg_replace('/[^0-9]/', '', $_POST['quantA']);
$ctnB = preg_replace('/[^0-9]/', '', $_POST['quantB']);
$quest = new CreatOp($ctnA,$ctnB);
$resta = $quest->creatEverEqual($ctn);
}
        //
        //
        /*$conf = array(
            "+" => 5,
            "-" => 3,
            "*" => 2,
        );
        $quest = new CreatOp(1,100);

        $resta = $quest->createdFromAnArray($conf);*/

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
    <span id="result"></span>
        <?php
        $htm = new MontHtml;
        echo $htm->mountHtml($resta);
        ?>
        <!-- Button trigger modal -->
    <button onclick="ctnResu()">
    Finalizar
    </button>
    </main>
</body>
</html>