<?php
declare(strict_types=1);

namespace Control;

use Core\Controller;
use Tools\CreateOp;
use Tools\MontHtml;
use Tools\ToolsAn;

class Controlmain extends Controller
{
    public function formGenerete(): void
    {
        if (ToolsAn::post('todosAleatory') !== false) {
            $vd  = new ToolsAn();
            $vd2 = new ToolsAn();

            $ctnA = $vd->validate('quantA', 'number', 'min:1');
            $ctnB = $vd2->validate('quantB', 'number', 'min:2');

            if ($ctnA === false) {
                $ctnA = 1;
            }
            if ($ctnB === false) {
                $ctnB = 900;
            }

            $v3 = ToolsAn::filtArray(ToolsAn::post('quant'));
            if (!$v3) {
                $v3 = [10];
            }


            $v4 = ToolsAn::filtArray(ToolsAn::post('operation'));

            $quest = new CreateOp((int)$ctnA, (int)$ctnB);

            if (!$v4) {
                if (isset($v3[0])) {
                    $v3 = $v3[0];
                }
                $resta = $quest->creatEverEqual((int)$v3);
            } elseif (count($v4) === 1 && count($v3) === 1) {
                $resta = $quest->createOperetionUnic((int)$v3[0], (string)$v4[0]);
            } else {
                $temp = [];
                for ($i = 0; $i < count($v4); $i++) {
                    $temp[$v4[$i]] = $v3[$i];
                }
                $resta = $quest->createdFromAnArray($temp);
            }
        }

        $htm  = new MontHtml();
        $html = $htm->mountHtml($resta ?? []);
        $env  = [
            'contets' => $html,
        ];

        echo $this->load('pgQuests', $env);
    }
}