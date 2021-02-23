<?php
class CreatOp{
    private $n;
    private $number_a;
    private $number_b;
    
    function CreatOp($ao,$bo,$o){
        $this->number_a = $ao;
        $this->number_b = $bo;
        $cf = rand(1,10);
        switch($o)
        {
            case 0:
                $oet = 1;
                $res = $ao+$bo;
                $b = $ao+$bo-$cf;
                $c = $ao+$bo-$cf+2;
                $d = $ao+$bo+$cf;
              
                            
                break;
            case 1:
                $oet = 2;
                $res = $ao-$bo;
                $b = $ao-$bo-$cf;
                $c = $ao-$bo-$cf-1;
                $d = $ao-$bo+$cf+1;
                          
                break;
            case 2:
                $oet = 3;
                $res = $ao*$bo;
                $b = $ao*$bo-$cf;
                $c = $ao*$bo-$cf-1;
                $d = $ao*$bo+$cf+1;
                
                          
                break;
        }
        $n = array("<button id='$res' onclick='addsum($ao, $bo, $res, $oet)'>".number_format($res,0,",",".")."</button>",
        "<button id='$b' onclick='addsum($ao, $bo, $b,$oet)'>".number_format($b,0,",",".")."</button>",
        "<button id='$c' onclick='addsum($ao, $bo, $c,$oet)'>".number_format($c,0,",",".")."</button>",
        "<button id='$d' onclick='addsum($ao, $bo, $d,$oet)'>".number_format($d,0,",",".")."</button>");
        $this->n = $n;
    }
    function Show($op){
        switch($op){
            case 0:
                $opet = " + ";
            break;
            case 1:
                $opet = " - ";
            break;
            case 2:
                $opet = " x ";
            break;
        }
        $ts = array(0,1,2,3);
        shuffle($ts);
        
        echo "<p>$this->number_a $opet $this->number_b<p>";
        echo "<p>".$this->n[$ts[0]]."</p>";
        echo "<p>".$this->n[$ts[1]]."</p>";
        echo "<p>".$this->n[$ts[2]]."</p>";
        echo "<p>".$this->n[$ts[3]]."</p>";
    }
    
    
}