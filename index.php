<?php
require_once "CreateOp.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sys math</title>
</head>
<body>

    <?php

        $number_a = rand(0,900);
        $number_b = rand(0,900);
        $operation = rand(0,2);
        $n = new CreatOp($number_a, $number_b, $operation);
        $ns = $n->Show($operation);

       for($ct=0; $ct <= 10; $ct++)
       {
        $number_a = rand(0,900);
        $number_b = rand(0,900);
        $operation = rand(0,2);
        $n = new CreatOp($number_a, $number_b, $operation);
        $ns = $n->Show($operation);
       }       
    ?>
    <input type="text" name="" id="cta" value='0'>
</body>
<script>
    function addsum(a, b, c, opr){
        
        switch(opr){
            case 1:
                sumtotal = a + b;
            break;
            case 2:
                sumtotal = a - b;
            break;
            case 3:
                sumtotal = a * b;
            break;
        }
       if(sumtotal == c){
            document.getElementById(c).style.color = "green";
            var ac = document.getElementById('cta').value;
            document.getElementById('cta').value = "";
            ac = parseInt(ac);
            varl = ac+1;
            document.getElementById('cta').value = varl;
            
        }else{
            document.getElementById(sumtotal).style.color = "green";
            document.getElementById(c).style.color = "red";
        }
    }
</script>
</html>