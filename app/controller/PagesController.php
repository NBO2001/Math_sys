<?php

namespace Control;

use Core\Controller;

class PagesController extends Controller
{
    function indexPage(){
        echo $this->load('themaIndex');
    }
    function formQ(){
        echo $this->load('screenIni');
    }
}