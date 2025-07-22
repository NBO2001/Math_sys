<?php
declare(strict_types=1);

namespace Tools;

class MontHtml
{
    /**
     * @param array $result
     */
    public function mountHtml(array $result): string
    {
        $html = '';
        $ct   = 0;
        foreach ($result as $values) {
            foreach ($values as $value) {
                $html .= "<div class='uniQ'>\n";
                $html .= "<p>{$value['ValueA']} {$value['Operation']} {$value['ValueB']}</p>\n";
                $html .= "<div class='btns'>\n";

                $fuc = "vrQ($ct,'First','{$value['Options']['Result']}')";
                $html .= "<button onclick=$fuc id='{$ct}First'>{$value['Options']['First']}</button>\n";

                $fuc = "vrQ($ct,'Second','{$value['Options']['Result']}')";
                $html .= "<button onclick=$fuc id='{$ct}Second'>{$value['Options']['Second']}</button>\n";

                $fuc = "vrQ($ct,'Third','{$value['Options']['Result']}')";
                $html .= "<button onclick=$fuc id='{$ct}Third'>{$value['Options']['Third']}</button>\n";

                $fuc = "vrQ($ct,'Fourth','{$value['Options']['Result']}')";
                $html .= "<button onclick=$fuc id='{$ct}Fourth'>{$value['Options']['Fourth']}</button>\n";

                $html .= "</div>\n";
                $html .= "</div>\n";
                $ct++;
            }
        }
        return $html;
    }
}