<?php

namespace Control;

use Core\Controller;
use Tools\CreateOp;
use Tools\MontHtml;
use Tools\ToolsAn;


class Controlmain extends Controller
{
    function indexPage(){
        echo $this->load('themaIndex');
    }
    function formQ(){
        echo $this->load('screenIni');
    }
    function formGenerete(){
        if(ToolsAn::post('todosAleatory'))
        {
            $vd = new ToolsAn;
            $vd2 = new ToolsAn;

            $ctnA =  $vd->validate('quantA','number','min:1');

            $ctnB =  $vd2->validate('quantB','number','min:2');

            $v3 = ToolsAn::filtArray(ToolsAn::post('quant'));

            $v4 = ToolsAn::filtArray(ToolsAn::post('operation'));

            $quest = new CreateOp();

            $quest->CreateOp($ctnA,$ctnB);

            if(count($v4) == 0):

                $resta = $quest->creatEverEqual($v3[0]);

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