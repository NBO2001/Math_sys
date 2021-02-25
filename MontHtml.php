<?php

class MontHtml{

    function mountHtml($result){
        $html = "";
        $ct = 0;
        foreach($result as $values)
        {
            foreach($values as $value)
            {
                $html .= "<div class='uniQ'>";
                $html .= "<p>".$value['ValueA']." ".$value['Operation']." ".$value['ValueB']."</p>";
                $html .= "<div class='btns'>";
                $fuc = "vrQ($ct,'First','".$value['Options']['Result']."')";
                $html .= "<button onclick=$fuc id='".$ct."First'>".$value['Options']['First']."</button>";

                $fuc = "vrQ($ct,'Second','".$value['Options']['Result']."')";
                $html .= "<button onclick=$fuc id='".$ct."Second'>".$value['Options']['Second']."</button>";

                $fuc = "vrQ($ct,'Third','".$value['Options']['Result']."')";
                $html .= "<button onclick=$fuc id='".$ct."Third'>".$value['Options']['Third']."</button>";

                $fuc = "vrQ($ct,'Fourth','".$value['Options']['Result']."')";
                $html .= "<button onclick=$fuc id='".$ct."Fourth'>".$value['Options']['Fourth']."</button>";
                $html .="</div>";
                $html .= "</div>";
                $ct++;        
            }
        }
        return $html;
    }

}