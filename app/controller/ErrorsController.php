<?php

namespace Control;

use Core\Controller;

class ErrorsController extends Controller
{
    function pgNotFound(){
        // echo "oii";
        echo $this->load('msgErro');
    }
}