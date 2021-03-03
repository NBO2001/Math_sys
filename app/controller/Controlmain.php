<?php

namespace Control;

use Core\Controller;
use Tools\CreateOp;
use Tools\MontHtml;
use Tools\ToolsAn;


class Controlmain extends Controller
{
    
    function formGenerete()
    {
        if(ToolsAn::post('todosAleatory'))
        {

            $vd = new ToolsAn;
            
            $vd2 = new ToolsAn;

            $ctnA =  $vd->validate('quantA','number','min:1');

            $ctnB =  $vd2->validate('quantB','number','min:2');

            if($ctnA == false): $ctnA = 1;endif;

            if($ctnB == false): $ctnB = 900;endif;
            
            $v3 = ToolsAn::filtArray(ToolsAn::post('quant'));
            
            if($v3 == false): $v3=10;endif;

            $v4 = ToolsAn::filtArray(ToolsAn::post('operation'));
            
            $quest = new CreateOp();

            $quest->CreateOp($ctnA,$ctnB);
            
            if(!$v4):

                if(isset($v3[0])): $v3 = $v3[0];endif;
               
                $resta = $quest->creatEverEqual($v3);

                // ToolsAn::dd($resta);
            elseif(count($v4) == 1 and count($v3) == 1):

                $resta = $quest->createOperetionUnic($v3[0],$v4[0]);

            else:

                $temp = array();

                for($i=0; $i < count($v4); $i++)
                {
                    array_push($temp[$v4[$i]]);

                    $temp[$v4[$i]] = $v3[$i];

                }

                $resta = $quest->createdFromAnArray($temp);

            endif;

        }

        $htm = new MontHtml;
        $html = $htm->mountHtml($resta);
        $env = array(
            "contets" => $html
        );

        echo $this->load('pgQuests',$env);
        
    }
}